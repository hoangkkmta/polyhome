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

Route::group([
    'prefix' => 'chu-nha',
    'namespace' => 'Auth',
    'as' => 'host.',
], function () {
    Route::get('dang-nhap', 'LoginController@showLoginForm')->name('formLogin');
    Route::post('login', 'LoginController@login')->name('login');
    Route::post('logout', 'LoginController@logout')->name('logout');
    Route::get('quen-mat-khau', 'ForgotPasswordController@showLinkRequestForm')->name('password.reset.showForm');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('send.link.email');
    Route::get('mat-khau/dat-lai/{token}', 'ResetPasswordController@showResetForm')->name('password.showResetForm');
    Route::post('password/reset', 'ResetPasswordController@reset')->name('password.update');

});

Route::group([
    'prefix' => 'chu-nha',
    'as' => 'host.',
    'middleware' => [ 'Assign.guard:host', 'host.status' ],
], function () {
    // page dashboard
    Route::get('/', 'DashboardController@index')->name('dashboard');
    // page setting account
    Route::get('cap-nhat-tai-khoan', 'AccountHostController@formSettingAccount')->name('setting.account');
    Route::post('cap-nhat-tai-khoan', 'AccountHostController@settingAccount')->name('submit.setting.account');
    // page change password
    Route::get('doi-mat-khau', 'AccountHostController@formChangePassword')->name('change.password.account');
    Route::post('doi-mat-khau', 'AccountHostController@changePassword')->name('submit.change.password.account');
    // page curd room
    Route::resource('phong-cho-thue', 'RoomController');
    Route::get('phong-cho-thue-thung-rac', 'RoomController@listSoftDelete')->name('phong-cho-thue.listSoftDelete');
    Route::get('phong-cho-thue/khoi-phuc/{id}', 'RoomController@restore')->name('phong-cho-thue.restore');
    // page curd building
    Route::resource('nha-cho-thue', 'BuildingController');
    Route::get('nha-cho-thue-thung-rac', 'BuildingController@listSoftDelete')->name('nha-cho-thue.listSoftDelete');
    Route::get('nha-cho-thue/khoi-phuc/{id}', 'BuildingController@restore')->name('nha-cho-thue.restore');
    // page show order and order detail
    Route::resource('dat-lich-xem-phong', 'OrderController');
    Route::get('dat-lich-xem-phong-thung-rac', 'OrderController@listSoftDelete')->name('dat-lich-xem-phong.listSoftDelete');
    Route::get('dat-lich-xem-phong/khoi-phuc/{id}', 'OrderController@restore')->name('dat-lich-xem-phong.restore');
    // page message
    Route::resource('tro-chuyen', 'MessageController');
    Route::get('tro-chuyen-thung-rac', 'MessageController@listSoftDelete')->name('tro-chuyen.listSoftDelete');
    Route::get('tro-chuyen-phong/khoi-phuc/{id}', 'MessageController@restore')->name('tro-chuyen.restore');

});
