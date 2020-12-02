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
    'prefix' => 'khach-hang',
    'namespace' => 'Auth',
    'as' => 'customer.',
], function () {
    Route::get('dang-nhap', 'LoginController@showLoginForm')->name('formLogin');
    Route::post('dang-nhap', 'LoginController@login')->name('login');
    Route::post('dang-xuat', 'LoginController@logout')->name('logout');
    Route::get('quen-mat-khau', 'ForgotPasswordController@showLinkRequestForm')->name('password.reset.showForm');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('send.link.email');
    Route::get('mat-khau/dat-lai/{token}', 'ResetPasswordController@showResetForm')->name('password.showResetForm');
    Route::post('password/reset', 'ResetPasswordController@reset')->name('password.update');
    Route::get('dang-ky', 'RegisterController@showRegistrationForm')->name('formRegister');
    Route::post('dang-ky-tai-khoan', 'RegisterController@register')->name('register');
    Route::get('dang-ky-tai-khoan-moi', 'RegisterController@registerSuccess')->name('register.success');
});

Route::group([
    'prefix' => '',
    'as' => 'customer.',
], function () {
    Route::get('dang-ky/xac-nhan/{token}', 'RegisterController@showConfirmForm')->name('confirmForm');
    Route::post('dang-ky/xac-nhan', 'RegisterController@confirm')->name('confirm');
    Route::get('', 'HomeController@index')->name('home');
    Route::resource('lien-he', 'ContactController')->only('index', 'store');
    Route::get('ve-chung-toi', 'AboutController@index')->name('about');

    Route::get('tin-tuc', 'PostController@listPost')->name('post.list');
    Route::get('tin-tuc/{slug}', 'PostController@detailPost')->name('post.detail');
    // Route::get('chuyen-muc/{id}', 'PostController@categoryPost')->name('post.category');
    Route::post('binh-luan-bai-viet/{slug}', 'PostController@sendComment')->name('post.comment');

    Route::get('phong-cho-thue', 'BuildingController@listBuilding')->name('building.list');
    Route::get('thue-phong-tro/{slug}', 'BuildingController@detailBuilding')->name('building.detail');
    Route::get('thue-phong-tro/{slug}/{id}', 'BuildingController@roomBuilding')->name('building.room.detail');

    Route::get('thue-phong-tro-cac-quan-ha-noi', 'BuildingController@listBuildingDistrict')->name('building.list.district');
    Route::get('thue-phong-tro-quan-ha-noi/{slug}', 'BuildingController@detailBuildingDistrict')->name('building.detail.district');

    Route::get('thue-phong-tro-truong-dai-hoc-ha-noi', 'BuildingController@listBuildingSchool')->name('building.list.school');
    Route::get('thue-phong-tro-truong-dai-hoc/{id}', 'BuildingController@detailBuildingSchool')->name('building.detail.school');

    // đăng ký làm chủ nhà
    Route::get('dang-ky-chu-nha', 'HostRegisterController@hostRegisterForm')->name('host.registerForm');
    Route::get('dang-ky-chu-nha', 'HostRegisterController@hostRegister')->name('host.register');
    //

});
Route::group([
    'prefix' => 'khach-hang',
    'as' => 'customer.',
    'middleware' => [ 'Assign.guard:customer', 'customer.status'],
], function () {
    Route::get('tai-khoan', 'ProfileController@showProfile')->name('tai-khoan.show');
    Route::put('tai-khoan/{id}', 'ProfileController@updateProfile')->name('tai-khoan.update');
    Route::get('tai-khoan/doi-mat-khau', 'ProfileController@changePassword')->name('tai-khoan.forgotPassword');
    Route::post('tai-khoan/doi-mat-khau', 'ProfileController@updatePassword')->name('tai-khoan.updatePassword');

    Route::get('danh-sach-dat-lich-xem-phong', 'ProfileController@showOrderRoom')->name('tai-khoan.showOrderRoom');

    Route::get('tro-chuyen/{host_id}', 'MessageController@showMessage')->name('message');
    Route::post('tro-chuyen', 'MessageController@sendMessage')->name('message.send');
    // đặt lịch
    Route::post('dat-lich-xem-phong', 'OrderRoomController@orderRoom')->name('order.room');
    Route::get('dat-lich-xem-phong-thanh-cong', 'OrderRoomController@orderRoomSuccess')->name('order.room.success');
});
