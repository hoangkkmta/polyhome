<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Auth Routes
|--------------------------------------------------------------------------
*/
Route::group([
    'prefix' => 'admin',
    'namespace' => 'Auth',
    'as' => 'admin.',
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
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => [ 'Assign.guard:admin', 'admin.status' ],
], function () {
    // page dashboard
    Route::get('/', 'DashboardController@index')->name('dashboard');
    // page account
    Route::resource('tai-khoan', 'AccountController');
    // page setting account
    Route::get('cap-nhat-tai-khoan', 'AccountController@formSettingAccount')->name('setting.account');
    Route::post('cap-nhat-tai-khoan', 'AccountController@settingAccount')->name('submit.setting.account');
    // page change password
    Route::get('doi-mat-khau', 'AccountController@formChangePassword')->name('change.password.account');
    Route::post('doi-mat-khau', 'AccountController@changePassword')->name('submit.change.password.account');
    // page curd customer
    Route::resource('khach-hang', 'CustomerController');
    // page curd host
    Route::resource('chu-nha', 'HostController');
    // page role and permission
    Route::resource('phan-quyen', 'PermissionController');
    Route::resource('vai-tro', 'RoleController');
    // page curd post
    Route::resource('bai-viet', 'PostController');
    Route::get('bai-viet-thung-rac', 'PostController@listSoftDelete')->name('bai-viet.listSoftDelete');
    Route::get('bai-viet/khoi-phuc/{id}', 'PostController@restore')->name('bai-viet.restore');
    // page curd category
    Route::resource('chuyen-muc', 'CategoryController');
    Route::get('chuyen-muc-thung-rac', 'CategoryController@listSoftDelete')->name('chuyen-muc.listSoftDelete');
    Route::get('chuyen-muc/khoi-phuc/{id}', 'CategoryController@restore')->name('chuyen-muc.restore');
    // page curd comment
    Route::resource('binh-luan', 'CommentController');
    Route::get('binh-luan-thung-rac', 'CommentController@listSoftDelete')->name('binh-luan.listSoftDelete');
    Route::get('binh-luan/khoi-phuc/{id}', 'CommentController@restore')->name('binh-luan.restore');
    // page curd district - quận/huyện
    Route::resource('quan', 'DistrictController');
    Route::get('quan-thung-rac', 'DistrictController@listSoftDelete')->name('quan.listSoftDelete');
    Route::get('quan/khoi-phuc/{id}', 'DistrictController@restore')->name('quan.restore');
    // page curd school - đia điểm trường đại học
    Route::resource('truong-dai-hoc', 'SchoolController');
    Route::get('truong-dai-hoc-thung-rac', 'SchoolController@listSoftDelete')->name('truong-dai-hoc.listSoftDelete');
    Route::get('truong-dai-hoc/khoi-phuc/{id}', 'SchoolController@restore')->name('truong-dai-hoc.restore');
    // page curd utility - tiện ích
    Route::resource('tien-ich', 'UtilityController');
    Route::get('tien-ich-thung-rac', 'UtilityController@listSoftDelete')->name('tien-ich.listSoftDelete');
    Route::get('tien-ich/khoi-phuc/{id}', 'UtilityController@restore')->name('tien-ich.restore');
    // page curd room category - loại phòng
    Route::resource('loai-phong', 'RoomCategoryController');
    Route::get('loai-phong-thung-rac', 'RoomCategoryController@listSoftDelete')->name('loai-phong.listSoftDelete');
    Route::get('loai-phong/khoi-phuc/{id}', 'RoomCategoryController@restore')->name('loai-phong.restore');
    // page curd room
    Route::resource('phong-cho-thue', 'RoomController');
    Route::get('phong-cho-thue-thung-rac', 'RoomController@listSoftDelete')->name('phong-cho-thue.listSoftDelete');
    Route::get('phong-cho-thue/khoi-phuc/{id}', 'RoomController@restore')->name('phong-cho-thue.restore');
    // page curd building
    Route::resource('nha-cho-thue', 'BuildingController');
    Route::get('phong-nha-cho-thue/{id}', 'BuildingController@listRoom')->name('nha-cho-thue.listRoom');
    Route::get('nha-cho-thue-thung-rac', 'BuildingController@listSoftDelete')->name('nha-cho-thue.listSoftDelete');
    Route::get('nha-cho-thue/khoi-phuc/{id}', 'BuildingController@restore')->name('nha-cho-thue.restore');
    // thống kế, biểu đồ
    Route::get('thong-ke-khach-hang', 'StatisticController@statisticCustomer')->name('thong-ke.khach-hang');
    Route::get('thong-ke-chu-nha', 'StatisticController@statisticHost')->name('thong-ke.chu-nha');
    Route::get('thong-ke-dat-lich', 'StatisticController@statisticOrder')->name('thong-ke.dat-lich');
    Route::get('thong-ke-bai-viet', 'StatisticController@statisticPost')->name('thong-ke.bai-viet');
    Route::get('thong-ke-binh-luan', 'StatisticController@statisticComment')->name('thong-ke.binh-luan');
    Route::get('thong-ke-tin-nhan', 'StatisticController@statisticMessage')->name('thong-ke.tin-nhan');
});


