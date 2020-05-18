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

// user
Route::post('/user/store', 'UserController@store')->name('client.user.store');

Route::group(['middleware' => ['customer']], function(){
    Route::get('/user/profile', 'UserController@profile')->name('client.user.profile');
    Route::get('/user/purchase', 'UserController@purchase')->name('client.user.purchase');
    Route::post('/user/{id}/update', 'UserController@update')->name('client.user.update');
    
    // cart
    Route::get('/cart', 'CartController@indexCart')->name('client.cart');
    Route::post('/ajax-add-to-cart', 'CartController@ajaxAddToCart')->name('client.ajaxAddToCart');
    Route::get('/ajax-get-cart', 'CartController@ajaxGetCart')->name('client.ajaxGetCart');
    Route::get('/ajax-remove-in-cart', 'CartController@ajaxRemoveInCart')->name('client.ajaxRemoveInCart');
    Route::get('/shipping-address', 'CartController@shippingAddress')->name('client.shippingAddress');
    Route::get('/payment', 'CartController@payment')->name('client.payment');
    Route::post('/order', 'CartController@order')->name('client.order');

});

// Auth
Route::post('/register', 'Auth\RegisterController@register')->name('client.register');
Route::get('/logout', 'Auth\LoginController@logout')->name('client.logout');
Route::post('/login', 'Auth\LoginController@login')->name('client.login');
Route::group(['middleware' => ['customerAuthenticated']], function(){
    Route::get('/auth/login', 'HomeController@loginView')->name('client.loginView');
});

// facebook
Route::get('/auth/redirect/{provider}', 'HomeController@redirect')->name('client.redirect');
Route::get('/callback/{provider}', 'HomeController@callback')->name('client.callback');

// Products
Route::get('/products', 'ProductController@index')->name('client.products');
Route::get('/products/search', 'ProductController@search')->name('client.products.search');
Route::get('/products/{id}/{name}', 'ProductController@detail')->name('client.products.detail');

// comments
Route::post('/comments/update-comment', 'ProductController@updateComment')->name('client.comments.update');

// promotion
Route::get('/ajax-check-promotion', 'CartController@ajaxCheckPromotion')->name('client.ajaxCheckPromotion');



