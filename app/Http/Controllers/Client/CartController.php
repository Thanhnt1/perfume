<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Product\IProductService;
use App\Services\Cart\ICartService;
use App\Services\Bill\IBillService;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Property;
use App\Models\Sale;
use App\Models\TypeShipping;
use App\Models\Bill;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    protected $productService, $cartService, $billService;

    public function __construct(IProductService $IProductService, ICartService $ICartService, IBillService $IBillService)
    {
        $this->productService = $IProductService;
        $this->cartService = $ICartService;
        $this->billService = $IBillService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajaxAddToCart(Request $request)
    {
        $cart = \Auth::guard('customer')->user()->cart;
        // dd($cart);
        $params = $request->all();
        if ($cart instanceof Cart) {
            try {
                // Open transaction
                DB::beginTransaction();
                //

                $productInCart = DB::table('cart_product')->select('*')
                ->where('cart_id', $cart->id)
                ->where('product_id', $params['product_id'])
                ->where('value', $params['value']);
                // dd($productInCart->quantity);
                if($productInCart->first()) {
                    // update data cart
                    $productInCart->update(['quantity' => $productInCart->first()->quantity + $params['quantity']]);
                }
                else {
                    // insert data cart
                    $cart->cartProducts()->attach([
                        $params['product_id'] => ['value' => $params['value'], 'quantity' => $params['quantity']],
                    ]);
                }

                // Commit transaction
                DB::commit();
                //
                return $this->responseJSON(true, trans('product.addToCartSuccessfull'), 200);
            } catch (\Exception $e) {
                // Rollback transaction
                DB::rollBack();
                return $this->responseJSON(false, trans($e->getMessage()));
            }
        } else {
            return $this->responseJSON(false, trans('product.notFound'));
        }
    }

    public function ajaxGetCart(Request $request)
    {
        $cart = \Auth::guard('customer')->check() ? json_encode(\Auth::guard('customer')->user()->cart->cartProducts) : 'empty';
        return $this->responseJSON(true, trans('Success'), 200, $cart);
    }

    public function indexCart(){
        $cart = \Auth::guard('customer')->check() ? \Auth::guard('customer')->user()->cart->cartProducts : null;
        // dd($cart);
        $totalPrice = 0;
        $properties = Property::all();
        foreach ($cart as $key => $value) {
            $totalPrice += $value->selling_price * $value->pivot->quantity;
        }
        return view('client.cart', [
            'cart' => $cart,
            'totalPrice' => $totalPrice
        ]);
    }

    public function ajaxRemoveInCart(Request $request)
    {
        $productInCart = DB::table('cart_product')->where('id', $request->id)->delete();
        return $this->responseJSON(true, trans('Success'), 200);
    }

    public function ajaxCheckPromotion(Request $request)
    {
        $promotion = Sale::where('code', $request->voucher)->first();
        if($promotion)
            return $this->responseJSON(true, trans('Success'), 200, $promotion);
        return $this->responseJSON(false, trans('sale.notFoundCheck'));
    }

    public function shippingAddress(Request $request){
        $totalPrice = 0;
        if(\Auth::guard('customer')->check()) {
            $cart = \Auth::guard('customer')->user()->cart->cartProducts;
            foreach ($cart as $key => $value) {
                $totalPrice += $value->selling_price * $value->pivot->quantity;
            }
        }

        $promotion = null;
        if($request->voucher) {
            $promotion = Sale::where('code', $request->voucher)->first();
            if($promotion) {
                $totalPrice -= $promotion->price;
            }
        }
        if($totalPrice < 0) {
            $totalPrice = 0;
        }

        $typeShipping = TypeShipping::with(['shipping_department'])->get();

        return view('client.check-address', [
            'totalPrice' => $totalPrice,
            'voucher' => $promotion ? $promotion->price : $promotion,
            'typeShipping' => $typeShipping
        ]);
    }

    public function payment(Request $request){
        $totalPrice = 0;
        if(\Auth::guard('customer')->check()) {
            $cart = \Auth::guard('customer')->user()->cart->cartProducts;
            foreach ($cart as $key => $value) {
                $totalPrice += $value->selling_price * $value->pivot->quantity;
            }
        }

        $promotion = null;
        if($request->voucher) {
            $promotion = Sale::where('code', $request->voucher)->first();
            if($promotion) {
                $totalPrice -= $promotion->price;
            }
        }
        if($totalPrice < 0) {
            $totalPrice = 0;
        }

        $typeShipping = TypeShipping::find($request->shipping_type);

        return view('client.check-payment', [
            'totalPrice' => $totalPrice,
            'voucher' => $promotion ? $promotion->price : $promotion,
            'typeShipping' => $typeShipping
        ]);
    }

    public function order(Request $request){
        try {
            $params = $request->all();
            // dd($params);
            // Open transaction
            DB::beginTransaction();
            //

            // add bill
            $bill = $this->billService->createData($params);

            // add bill product
            $cart = \Auth::guard('customer')->user()->cart->cartProducts;

            foreach ($cart as $key => $value) {
                $bill->billProducts()->attach([
                    $value->id => ['quantity' => $value->pivot->quantity],
                ]);

            }

            // remove cart
            \Auth::guard('customer')->user()->cart->cartProducts()->detach();
            
            // Commit transaction
            DB::commit();
            //
            return view('client.order', [
                'bill' => $bill,
            ]);
        } catch (\Exception $e) {
            // Rollback transaction
            DB::rollBack();
            return redirect()->back()->withErrors(['msg' => trans($e->getMessage())])->withInput();
        }
    }

        /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function deleteBill(Request $request)
    {
        $bill = $this->billService->findByUuid($request->uuid);
        if ($bill instanceof Bill) {
            $bill->delete();

            return redirect()->route('client.user.purchase')->with('message', trans('bill.removedSuccessfull'));
        } else {
            return redirect()->back()->withErrors(['msg' => trans('Not found bill')])->withInput();
        }
    }
}
