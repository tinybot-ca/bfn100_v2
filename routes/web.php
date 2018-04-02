<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $pushups = DB::table('pushups')->get();
    return view('welcome', compact('pushups'));
});

Route::get('/pushups', function () {
    $pushups = DB::table('pushups')->get();
    return view('pushups.index', compact('pushups'));
});

Route::get('/pushups/{pushup}', function ($id) {
    $pushup = DB::table('pushups')->find($id);
    // dd($pushup);
    return view('pushups.show', compact('pushup'));
});