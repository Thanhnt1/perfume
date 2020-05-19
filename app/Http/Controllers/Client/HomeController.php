<?php

namespace App\Http\Controllers\CLient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Nexmo;
use App\Models\Customer;
use App\Models\Cart;
use Socialite;
use Validator,Redirect,Response,File;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('client.index');
    }

    public function sendSms($phone)
    {
        try {
            $activeCode = Nexmo::generateRandomString();
            $content = "Your activate code is: $activeCode  .";
            Nexmo::send($phone, $content, 'NgocDepGai');
            return $this->response(true, trans('Send sms was successfully.'), $this->CODE_SUCCESSFUL, $activeCode);

        } catch (\Throwable $th) {
            return $this->response(false, trans('Phone number was error or Not register in Nexmo.'), $this->CODE_BAD_REQUEST);
        }
    }

    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $getInfo = Socialite::driver($provider)->user(); 
        $user = $this->createUser($getInfo,$provider); 
        \Auth::guard('customer')->login($user);
        return redirect()->route('client.index');
    }

    public function createUser($getInfo,$provider){
        $user = Customer::where('provider_id', $getInfo->id)->first();
        if (!$user) {
            $user = Customer::create([
                'name'     => $getInfo->name,
                'email'    => $getInfo->email,
                'provider' => $provider,
                'provider_id' => $getInfo->id,
                'avatar' => $getInfo->avatar,
                'token_provider' => $getInfo->token
            ]);
            $cart = Cart::create([
                'customer_id' => $user->id,
            ]);
        }
        return $user;
    }

    public function loginView()
    {
        return view('client.login');
    }
}
