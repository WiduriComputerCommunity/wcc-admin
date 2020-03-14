<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'AuthController@index');
Route::get('register', 'AuthController@register');
Route::post('registerUser', 'Api\UserController@register');

//Auth
Route::get('login', 'AuthController@login');
Route::post('login', 'AuthController@attempt');
Route::get('logout', 'AuthController@logout');

Route::middleware('authBasic')->group(function () {
    Route::get('dashboard', 'Web\DashboardController@index');
    Route::get('member', 'Web\MemberController@index');
    Route::get('dosen', 'Web\DosenController@index');
    Route::get('maintenance', 'Web\MaintenanceController@index');
});

Route::group(['prefix' => 'user', 'middleware' => 'auth.basic'], function () {
    Route::get('setting', 'Web\UserSettingController@index');

});

Route::group(['prefix' => 'mahasiswa', 'middleware' => 'auth.basic'], function () {
    Route::get('setting', 'Web\MahasiswaSettingController@index');
});



//API
Route::group(['prefix' => 'api/v1', 'middleware' => 'authBasic'], function () {
    //folder group
    $master_tools_folder = 'master-tools/';

    require_once($master_tools_folder.'master-tools.php');

});