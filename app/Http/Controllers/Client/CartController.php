<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Product\IProductService;
use App\Services\Cart\ICartService;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    protected $productService, $cartService;

    public function __construct(IProductService $IProductService, ICartService $ICartService)
    {
        $this->productService = $IProductService;
        $this->cartService = $ICartService;
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

    public function index(){
        return \View::make('client.cart');
    }
}
