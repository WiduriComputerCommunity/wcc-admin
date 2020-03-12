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

//User Management
Route::group(['prefix' => 'api/v1/users', 'middleware' => 'auth.basic'], function () {
    Route::get('/', 'Api\UserController@index');
    Route::get('/{id}', 'Api\UserController@detail');
    Route::put('/edit/{id}', 'Api\UserController@edit');
    Route::post('register', 'Api\UserController@register');
    Route::delete('/{id}', 'Api\UserController@destroy');
});
