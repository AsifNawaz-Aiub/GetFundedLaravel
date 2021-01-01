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
    return view('moderator.index');
});

Route::get('/login', 'loginController@index');
Route::post('/login', 'loginController@verify');

Route::get('/signup', function () {
    return view('signup.index');
});

Route::get('/admin', function () {
    return view('admin.index');
});