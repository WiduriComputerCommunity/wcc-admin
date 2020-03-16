<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'users'], function () {
  Route::get('list', 'Api\CmsUserController@getUser');   
  Route::get('destroy/{id}', 'Api\CmsUserController@deleteUser');
});


// //User Management
// Route::group(['prefix' => 'users', 'middleware' => 'auth.basic'], function () {
//   Route::get('/{id}', 'Api\UserController@detail');
//   Route::put('/edit/{id}', 'Api\UserController@edit');
//   Route::post('register', 'Api\UserController@register');
//   Route::delete('/{id}', 'Api\UserController@destroy');
// });
