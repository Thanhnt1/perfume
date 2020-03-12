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

// Auth::routes();

Route::group(['middleware' => 'admin'], function(){
    // Dashboard
    Route::get('/dashboard', 'HomeController@index')->name('admin.dashboard');

    // Products
    Route::group(['prefix' => 'products'], function(){
        Route::get('/', 'ProductController@index')->name('admin.products.index');
        Route::get('/create', 'ProductController@create')->name('admin.products.create');
        Route::post('/store', 'ProductController@store')->name('admin.products.store');
        Route::get('/{id}/edit', 'ProductController@edit')->name('admin.products.edit');
        Route::put('/{id}/update', 'ProductController@update')->name('admin.products.update');
        Route::post('/delete-multiple', 'ProductController@deleteMultiple')->name('admin.products.deleteMultiple');
    });
    // Images
    Route::post('/images-product', 'HomeController@uploadImagesProduct')->name('admin.products.uploadImages');
    Route::post('/images-ckeditor-product', 'HomeController@uploadImagesCkEditor')->name('admin.products.uploadImagesCkEditor');

    // Bills
    Route::get('/bills', 'BillController@index')->name('admin.bills.index');

    // Users
    Route::group(['prefix' => 'users'], function(){
        Route::get('/', 'UserController@index')->name('admin.users.index');
    });
    // Order proccessing
    Route::get('/order-proccessing', 'BillController@orderProccessingIndex')->name('admin.order-proccessing');

    // Promotions
    Route::get('/promotions', 'PromotionController@index')->name('admin.promotions');

});

Route::get('/login-admin', 'HomeController@login')->name('loginView');
Route::get('/logout', 'Auth\LoginController@logout')->name('logoutView');
