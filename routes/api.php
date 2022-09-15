<?php

use App\Support\Route;

Route::get('/users', 'Api\UserControllerController@index');
Route::get('/users/{id}', 'Api\UserControllerController@show');
Route::post('/users/add', 'Api\UserControllerController@create');
