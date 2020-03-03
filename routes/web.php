<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'AuthController@index');
Route::get('register', 'AuthController@register');

//Auth
Route::get('login', 'AuthController@login');
Route::get('login', 'AuthController@attempt');
Route::get('logout', 'AuthController@logout');

//User
Route::group(['prefix' => 'api/v1/users', 'middleware' => 'auth.basic'], function () {
    Route::get('/', 'Api\UserController@index');
    Route::get('/{id}', 'Api\UserController@detail');
    Route::put('/edit/{id}', 'Api\UserController@edit');
    Route::post('/register', 'Api\UserController@register');
    Route::delete('/{id}', 'Api\UserController@destroy');
});




