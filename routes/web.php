<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', 'AuthController@index');
Route::get('register', 'AuthController@register');
