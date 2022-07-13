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

Route::namespace('Media')->group(function(){
    Route::post('media', 'MediaController@media')->name('media.store');
});

Route::namespace('Location')->group(function(){
    Route::post('get-location', 'LocationController@getLocation')->name('location.get');
});
Route::namespace('Client')->name('client.')->group(function() {
    Route::get('/', 'HomeController@index')->name('home.index');

    Route::name('cart.')->group(function() {
        Route::post('/add-to-cart', 'CartController@addToCart')->name('add_to_cart');
        Route::get('/cart', 'CartController@index')->name('index');
        Route::post('/update-cart', 'CartController@update')->name('update');
    });

    Route::middleware('cart')->group(function() {
        Route::name('checkout.')->group(function() {
            Route::get('/checkout', 'CheckoutController@index')->name('index');
            Route::post('/checkout', 'CheckoutController@checkout')->name('checkout');
        });

    });

    Route::resource('order', 'OrderController')->only(['show','index']);
});
