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
        return view('client.index');
    }

    // public function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|string|email|max:255|unique:users',
    //         'password' => 'required|string|min:6|confirmed',
    //         'phone_number' => 'required',
    //     ]);
    // }

    public function send($to)
    {
        $activeCode = Nexmo::generateSmsCode();
        $content = "Your activate code is: $activeCode";
        Nexmo::send($data['phone_number'], $content);

        // return User::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password']),
        //     'phone_number' => $data['phone_number'],
        //     'code' => $activeCode,
        // ]);
    }
}
