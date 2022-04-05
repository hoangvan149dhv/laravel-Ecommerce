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
Route::namespace('Client')->group(function(){
    Route::get('/', 'HomeController@index')->name('home.index');
});
