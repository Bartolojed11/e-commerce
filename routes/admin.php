<?php

use Illuminate\Support\Facades\Route;

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

Route::prefix('admin')->name('admin.')->namespace('App\Http\Controllers\Admin')->group(function() {
    Route::namespace('Auth')->group(function() {
        Route::get('login', 'LoginController@showLoginForm')->name('login');
        Route::post('login', 'LoginController@login')->name('login');
        Route::post('logout', 'LoginController@logout')->name('logout');
        Route::get('password/confirm', 'ConfirmPasswordController@showConfirmForm')->name('password.confirm');
        Route::post('password/confirm', 'ConfirmPasswordController@confirm')->name('password.confirm');
        Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    
        Route::post('password/reset', 'ResetPasswordController@reset')->name('password.update');
        Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');

        
        Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
        Route::post('register', 'RegisterController@register')->name('register');
        
    });

    Route::get('/dashboard', 'HomeController@index')->name('dashboard')->middleware('auth:admin');
    Route::get('/', function() {
        return "<a href='/admin/login'>Login</a>";
    });
});

Route::prefix('admin')->name('admin.')->namespace('App\Http\Controllers\Admin')->group(function() {
    Route::resource('product', 'Product\ProductController');
    Route::get('product/list/get', 'Product\ProductController@getList')->name('getlist');
    Route::resource('order', 'Order\OrderController');
    Route::resource('admin', 'Admin\AdminController');
    Route::resource('user', 'User\UserController');
    Route::resource('shipping', 'Shipping\ShippingController');

    // Product Inventory
    Route::delete('product/{product}/inventory/{inventory}', 'Product\ProductInventoryController@destroy')->name('product.inventory.destroy');
    Route::put('product/{product}/inventory/{inventory}', 'Product\ProductInventoryController@update')->name('product.inventory.update');
    Route::POST('product/{product}/inventory', 'Product\ProductInventoryController@store')->name('product.inventory.store');
});