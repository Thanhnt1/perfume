<?php

namespace App\Http\Controllers\CLient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Nexmo;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd(\Auth::guard('customer'));
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
}
