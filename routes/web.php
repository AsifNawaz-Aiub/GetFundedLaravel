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

Route::get('/login', 'loginController@index');
Route::post('/login', 'loginController@verify');
Route::get('/logout', 'logoutController@index');

Route::get('/signup', 'signupController@index');
Route::post('/signup', 'signupController@register');

Route::group(['middleware'=>['sess']], function(){
    Route::group(['middleware'=>['admin']], function(){
        Route::get('/admin', 'adminController@index')->name('admin.index');
    });
});

Route::group(['middleware'=>['sess']], function(){
    Route::group(['middleware'=>['moderator']], function(){
        Route::get('/moderator', 'moderatorController@index');
        
        Route::get('/moderator/event/approve/{id}', 'moderatorController@approve')->name('event.approve');
        Route::post('/moderator/event/approve/{id}', 'moderatorController@approved')->name('event.approved');

        Route::get('/moderator/event/modify/{id}', 'moderatorController@modify')->name('event.modify');
        Route::post('moderator/event/modify/{id}', 'moderatorController@modified')->name('event.modified');;

        Route::get('/moderator/event/decline/{id}', 'moderatorController@decline')->name('event.decline');;
        Route::post('/moderator/event/decline/{id}', 'moderatorController@declined')->name('event.declined');;
    });
});

Route::group(['middleware'=>['sess']], function(){
    Route::group(['middleware'=>['userSupport']], function(){
        Route::get('/userSupport', 'userSupportController@index')->name('userSupport.index');
        Route::get('/allUser', ['uses'=> 'userSupportController@userlist', 'as'=> 'userSupport.allUser']);
        Route::get('/userSupportProfile', 'userSupportController@profile')->name('userSupport.userSupportProfile');
        Route::get('/userEvents/{id}', ['uses'=> 'userSupportController@userEventlist', 'as'=> 'userSupport.userEvents']);
        Route::get('/userDetails/{id}', 'userSupportController@userEventDetails')->name('userSupport.userDetails');
        Route::get('/viewEvents', ['uses'=> 'userSupportController@eventlist', 'as'=> 'userSupport.viewEvents']);
        Route::get('/myProfile', 'userSupportController@profile')->name('userSupport.myProfile');
        Route::get('/editProfile', 'userSupportController@editProfileShow')->name('userSupport.editProfile');
    });
    
});