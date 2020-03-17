<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\User\IUserService;
use App\Models\Customer;

class UserController extends Controller
{
    protected $userService;

    public function __construct(IUserService $IUserService)
    {
        $this->userService = $IUserService;
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
        return view('client.purchase');
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
    public function update(Request $request)
    {
        // $params = $request->all();
        // $customer = Customer::create([
        //     'name' => $params['name'],
        //     'password' => \Hash::make($params['password']),
        //     'phone' => $params['phone'],
        // ]);
        
        return $this->response(true, trans('Create user was successfully.'), $this->CODE_SUCCESSFUL, $customer);
    }
}
