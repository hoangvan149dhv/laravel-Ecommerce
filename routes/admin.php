<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::name('admin.')->group(function () {
    // Authentication Routes...
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login.showForm');
    Route::post('login', 'Auth\LoginController@login')->name('login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

    // Registration Routes...
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register.showForm');
    Route::post('register', 'Auth\RegisterController@register')->name('register');
});

Route::namespace('Admin')->name('admin.')->middleware(['middleware' => 'auth'])->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('categories', 'CategoriesController');
});

