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

Route::get('/sms/send/{phone}', 'HomeController@sendSms')->name('client.sendSms');

Route::post('/user/store', 'UserController@store')->name('client.user.store');

// Auth
Route::post('/register', 'Auth\RegisterController@register')->name('client.register');
Route::get('/logout', 'Auth\LoginController@logout')->name('client.logout');
Route::post('/login', 'Auth\LoginController@login')->name('client.login');

// facebook
Route::get('/auth/redirect/{provider}', 'HomeController@redirect')->name('client.redirect');
Route::get('/callback/{provider}', 'HomeController@callback');