<?php
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Http\Request;

Auth::routes();

Route::group(['middleware' => 'admin'], function(){
    // Dashboard
    Route::get('/dashboard', 'HomeController@index')->name('admin.dashboard');

    // Products
    Route::get('/products', 'ProductController@index')->name('admin.products');

    // Bills
    Route::get('/bills', 'BillController@index')->name('admin.bills');

    // Users
    Route::get('/users', 'UserController@index')->name('admin.users');

    // Order proccessing
    Route::get('/order-proccessing', 'BillController@orderProccessingIndex')->name('admin.order-proccessing');

    // Promotions
    Route::get('/promotions', 'PromotionController@index')->name('admin.promotions');

});

Route::get('/login-admin', 'HomeController@login')->name('loginView');
Route::get('/logout', 'Auth\LoginController@logout')->name('logoutView');
