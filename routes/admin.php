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

    // Category
    Route::group(['prefix' => 'categories'], function(){
        Route::get('/', 'CategoryController@index')->name('admin.categories.index');
        Route::post('/store', 'CategoryController@store')->name('admin.categories.store');
        Route::post('/delete-multiple', 'CategoryController@deleteMultiple')->name('admin.categories.deleteMultiple');
        Route::put('/update', 'CategoryController@update')->name('admin.categories.update');
    });

    // Property
    Route::group(['prefix' => 'properties'], function(){
        Route::get('/', 'PropertyController@index')->name('admin.properties.index');
        Route::post('/store', 'PropertyController@store')->name('admin.properties.store');
        Route::post('/delete-multiple', 'PropertyController@deleteMultiple')->name('admin.properties.deleteMultiple');
        Route::put('/update', 'PropertyController@update')->name('admin.properties.update');
    });

    // Unit
    Route::group(['prefix' => 'units'], function(){
        Route::get('/', 'UnitController@index')->name('admin.units.index');
        Route::post('/store', 'UnitController@store')->name('admin.units.store');
        Route::post('/delete-multiple', 'UnitController@deleteMultiple')->name('admin.units.deleteMultiple');
        Route::put('/update', 'UnitController@update')->name('admin.units.update');
    });

    // Supplier
    Route::group(['prefix' => 'suppliers'], function(){
        Route::get('/', 'SupplierController@index')->name('admin.suppliers.index');
        Route::post('/store', 'SupplierController@store')->name('admin.suppliers.store');
        Route::post('/delete-multiple', 'SupplierController@deleteMultiple')->name('admin.suppliers.deleteMultiple');
        Route::put('/update', 'SupplierController@update')->name('admin.suppliers.update');
    });

    // Bills
    Route::get('/bills', 'BillController@index')->name('admin.bills.index');

    // Users
    Route::group(['prefix' => 'users'], function(){
        Route::get('/', 'UserController@index')->name('admin.users.index');
    });
    
    // Order proccessing
    Route::group(['prefix' => 'order-processing'], function(){
        Route::get('/', 'BillController@orderProcessing')->name('admin.order-processing.index');
        // Route::post('/store', 'SaleController@store')->name('admin.promotions.store');
        // Route::post('/delete-multiple', 'SaleController@deleteMultiple')->name('admin.promotions.deleteMultiple');
        Route::post('/update', 'BillController@update')->name('admin.order-processing.update');
    });

    // Promotions
    Route::group(['prefix' => 'promotions'], function(){
        Route::get('/', 'SaleController@index')->name('admin.promotions.index');
        Route::post('/store', 'SaleController@store')->name('admin.promotions.store');
        Route::post('/delete-multiple', 'SaleController@deleteMultiple')->name('admin.promotions.deleteMultiple');
        Route::put('/update', 'SaleController@update')->name('admin.promotions.update');
    });

    // Shipping Department
    Route::group(['prefix' => 'shipping-department'], function(){
        Route::get('/', 'ShippingDepartmentController@index')->name('admin.shipping-department.index');
        Route::post('/store', 'ShippingDepartmentController@store')->name('admin.shipping-department.store');
        Route::post('/delete-multiple', 'ShippingDepartmentController@deleteMultiple')->name('admin.shipping-department.deleteMultiple');
        Route::put('/update', 'ShippingDepartmentController@update')->name('admin.shipping-department.update');

        // Type Shipping
        Route::get('/type-shipping', 'ShippingDepartmentController@typeShipping')->name('admin.shipping-department.typeShipping');
        Route::post('/add-type-shipping', 'ShippingDepartmentController@addTypeShipping')->name('admin.shipping-department.addTypeShipping');

    });

    // Topbar
    Route::get('/get-alert', 'HomeController@getAlert')->name('admin.getAlert');

});

Route::get('/login-admin', 'HomeController@login')->name('loginView');
Route::get('/logout', 'Auth\LoginController@logout')->name('logoutView');
