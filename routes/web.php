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
    return redirect('/login');
});
Route::get('/moderator', 'moderatorController@index');

Route::get('/moderator', 'moderatorController@index');

Route::get('/login', 'loginController@index');
Route::post('/login', 'loginController@verify');
Route::get('/logout', 'logoutController@index');

Route::get('/signup', function () {
    return view('signup.index');
});

Route::group(['middleware'=>['sess']], function(){
    Route::group(['middleware'=>['admin']], function(){
        Route::get('/admin', 'adminController@index')->name('admin.index');
    });
});
