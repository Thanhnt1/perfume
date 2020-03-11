<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'HomeController@index')->name('client.index');

Route::get('/sms/send/{to}', function(\Nexmo\Client $nexmo, $to){
    $message = $nexmo->message()->send([
        'to' => $to,
        'from' => '0123456789',
        'text' => 'Sending SMS from Laravel. Woohoo!'
    ]);
    
    Log::info('sent message: ' . $message['message-id']);
});