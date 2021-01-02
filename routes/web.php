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
    
});
Route::get('/moderator', 'moderatorController@index');

Route::get('/approve/{id}', 'moderatorController@approve')->name('event.approve');
Route::post('/approve/{id}', 'moderatorController@approved')->name('event.approved');

Route::get('/modify/{id}', 'moderatorController@modify')->name('event.modify');
Route::post('/modify/{id}', 'moderatorController@modified')->name('event.modified');;

Route::get('/decline/{id}', 'moderatorController@decline')->name('event.decline');;
Route::post('/decline/{id}', 'moderatorController@declined')->name('event.declined');;


Route::get('/login', 'loginController@index');
Route::post('/login', 'loginController@verify');

Route::get('/signup', function () {
    return view('signup.index');
});

Route::get('/admin', function () {
    return view('admin.index');
});