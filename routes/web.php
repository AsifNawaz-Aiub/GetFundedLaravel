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
    Route::group(['middleware'=>['user']], function(){
        Route::get('/user', 'userController@index')->name('user.index');

        Route::get('/viewEvents', ['uses'=> 'userController@eventlist', 'as'=> 'user.viewEvents']);
        Route::get('/createEvent', 'userController@createEvent')->name('user.createEvent');
        Route::get('/approveDonation/{id}','userController@donationlist')->name('user.approveDonation');
        Route::get('/myEvent', ['uses'=> 'userController@eventlistById', 'as'=> 'user.myEvent']);
        Route::get('/eventEdit/{id}', 'userController@eventEdit')->name('user.eventEdit'); 
        Route::get('/eventDelete/{id}', 'userController@eventDelete')->name('user.eventDelete');
        Route::get('/eventDonate/{id}', ['uses'=> 'userController@eventdonatelist', 'as'=> 'user.eventDonate']);
        Route::get('/donateToEvent/{id}', ['uses'=> 'userController@donateToEvent', 'as'=> 'user.donateToEvent']);
        Route::get('/voteToEvent/{id}', ['uses'=> 'userController@voteToEvent', 'as'=> 'user.voteToEvent']);
        Route::get('/commentToEvent/{id}', ['uses'=> 'userController@commentToEvent', 'as'=> 'user.commentToEvent']);
        Route::get('/reportToEvent/{id}', ['uses'=> 'userController@reportToEvent', 'as'=> 'user.reportToEvent']);
    

    });
});
