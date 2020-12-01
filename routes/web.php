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

Route::group(['prefix' => 'address', 'as' => 'address.'], function () {
    Route::get('province', 'AddressController@province')->name('province');
    Route::get('district', 'AddressController@district')->name('district');
    Route::get('ward', 'AddressController@ward')->name('ward');
});
