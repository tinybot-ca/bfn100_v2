<?php

use App\Http\Controllers\PushupsController;

Route::get('/', 'PushupsController@index')->name('home');
Route::get('/home', 'PushupsController@index');
Route::get('/pushups', 'PushupsController@index');
Route::get('/pushups/create', 'PushupsController@create');
Route::post('/pushups', 'PushupsController@store');
Route::get('/pushups/{pushup}', 'PushupsController@show');
Route::get('/pushups/{pushup}/edit', 'PushupsController@edit');
Route::patch('/pushups/{pushup}', 'PushupsController@update');


Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');

Route::get('/users', 'RegistrationController@index');
Route::get('/users/{user}', 'RegistrationController@show');
Route::get('/users/{user}/edit', 'RegistrationController@edit');
Route::patch('/users/{user}', 'RegistrationController@update');

Route::get('/login', 'SessionsController@create')->name('login');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');