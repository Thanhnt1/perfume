<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\User\IUserService;
use App\Models\Customer;
use App\Models\Bill;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Services\Bill\IBillService;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    protected $userService;
    protected $billService;

    public function __construct(IUserService $IUserService, IBillService $IBillService)
    {
        $this->userService = $IUserService;
        $this->billService = $IBillService;
    }

    /**
     * Show the application user.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile(Request $request)
    {
        $userCurrent = \Auth::guard('customer')->user();

        return view('client.profile', [
            'user' => $userCurrent
        ]);
    }

    /**
     * Show the application user.
     *
     * @return \Illuminate\Http\Response
     */
    public function purchase(Request $request)
    {
        if($request->showOrder) {
            $take = $request->showOrder;
            if($request->showOrder == 'all') {
                $take = PHP_INT_MAX;
            }
        }
        else {
            $take = 5;
        }

        if($request->showReturns) {
            $takeReturn = $request->showReturns;
            if($request->showReturns == 'all') {
                $takeReturn = PHP_INT_MAX;
            }
        }
        else {
            $takeReturn = 5;
        }

        if($request->showCancel) {
            $takeCancel = $request->showCancel;
            if($request->showCancel == 'all') {
                $takeCancel = PHP_INT_MAX;
            }
        }
        else {
            $takeCancel = 5;
        }
        
        $billProducts = Bill::where('customer_id', \Auth::guard('customer')->user()->id)->where('status','<', 4)->with(['billProducts'])->take($take)->get();
        
        $billProductsReturn = Bill::where('customer_id', \Auth::guard('customer')->user()->id)->where('status', 4)->with(['billProducts'])->latest()->get()->take($takeReturn);
        
        $billProductsCancel = Bill::onlyTrashed()->where('customer_id', \Auth::guard('customer')->user()->id)->with(['billProducts'])->latest()->get()->take($takeCancel);

        return view('client.purchase', [
            'billProducts' => $billProducts,
            'billProductsReturn' => $billProductsReturn,
            'billProductsCancel' => $billProductsCancel
        ]);
    }

    /**
     * Store the application user.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $params = $request->all();
        $customer = Customer::create([
            'name' => $params['name'],
            'password' => \Hash::make($params['password']),
            'phone' => $params['phone'],
        ]);
        
        return $this->response(true, trans('Create user was successfully.'), $this->CODE_SUCCESSFUL, $customer);
    }

    /**
     * Store the application user.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $user = $this->userService->findByUuid($id);
        $params = $request->all();
        if ($user instanceof Customer) {
            try {
                // Open transaction
                DB::beginTransaction();

                if($request->pre_password && !Hash::check($request->pre_password, $user->password)) {
                    return redirect()->back()->withErrors(['msg' => trans('Previous password not match')])->withInput();
                }
                else {
                    $params['password'] = Hash::make($request->new_password);
                }

                // Update user
                $user = $this->userService->updateData($params, $user->id);

                // Commit transaction
                DB::commit();
                //
                return redirect()->route('client.user.profile')->with('message', trans('Update user was successfully.'));
            } catch (\Exception $e) {
                // Rollback transaction
                DB::rollBack();
                return redirect()->back()->withErrors(['msg' => trans($e->getMessage())])->withInput();
            }
        } else {
            abort(404);
        }
    }
}
