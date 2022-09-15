<?php

use App\Support\Route;

Route::get('/users', 'Api\UserController@index');
Route::get('/users/{id}', 'Api\UserController@show');
Route::delete('/users/{id}', 'Api\UserController@destroy');
Route::put('/users/{id}', 'Api\UserController@update');
Route::post('/user/add', 'Api\UserController@create');
Route::get('/transactions/today/{location}', 'Api\TransactionController@getTodayByLocation');
