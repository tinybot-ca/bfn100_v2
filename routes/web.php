<?php

Route::get('/', 'PushupsController@index');
Route::get('/pushups', 'PushupsController@index');
Route::get('/pushups/create', 'PushupsController@create');
Route::post('/pushups', 'PushupsController@store');
Route::get('/pushups/{pushup}', 'PushupsController@show');