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

    // /**
    //  * Show the application user.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function index(Request $request)
    // {
    //     return view('admin.users.index');
    // }

    /**
     * Store the application user.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $params = $request->all();
        dd($params);
        $customer = Customer::create([
            'name' => $params['name'],
            'password' => \Hash::make($params['password']),
            'phone' => $params['phone'],
        ]);
        
        return $this->response(true, trans('Create user was successfully.'), $this->CODE_SUCCESSFUL, $customer);

    }
}
