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
        Route::post('/createEvent', 'userController@store');

       
        Route::get('/myEvent', ['uses'=> 'userController@eventlistById', 'as'=> 'user.myEvent']);
        Route::get('/eventEdit/{id}', 'userController@eventEdit')->name('user.eventEdit'); 
        Route::post('/eventEdit/{id}', 'userController@eventUpdated'); 

        Route::get('/eventDelete/{id}', 'userController@eventDelete')->name('user.eventDelete');
        Route::post('/eventDelete/{id}', 'userController@eventDestroyed');

        Route::get('/eventDonate/{id}', ['uses'=> 'userController@eventdonate', 'as'=> 'user.eventDonate']);

        Route::get('/approveDonation/{id}','userController@approve')->name('user.approveDonation');

        Route::get('/acceptpage/{id}','userController@acceptdonate')->name('user.acceptpage');
        Route::post('/acceptpage/{id}','userController@approved');

        Route::get('/donateToEvent/{id}', ['uses'=> 'userController@donateToEvent', 'as'=> 'user.donateToEvent']);
        Route::post('/donateToEvent/{id}', 'userController@donatedToEvent');
        
        Route::get('/voteToEvent/{id}', ['uses'=> 'userController@voteToEvent', 'as'=> 'user.voteToEvent']);
        Route::post('/voteToEvent/{id}', 'userController@insertVote');

        Route::get('/commentToEvent/{id}', ['uses'=> 'userController@commentToEvent', 'as'=> 'user.commentToEvent']);
        Route::post('/commentToEvent/{id}', 'userController@commentedToEvent');
        
        Route::get('/reportToEvent/{id}', ['uses'=> 'userController@reportToEvent', 'as'=> 'user.reportToEvent']);
        Route::post('/reportToEvent/{id}',  'userController@reportedToEvent');
    
        Route::get('/eventManager', ['uses'=> 'userController@eventManagers', 'as'=> 'user.eventManager']);
       //Route::post('/reportToEvent/{id}',  'userController@reportedToEvent');

        Route::get('/addEventManager/{id}', ['uses'=> 'userController@addEventManager', 'as'=> 'user.addEventManager']);
        Route::post('/addEventManager/{id}', 'userController@updateEventManager');

        Route::get('/message',  'userController@message')->name('user.message');
        Route::post('/messageToUserSupport' , 'userController@messagetousersupp');
        
        Route::get('/user/view', 'userController@messageWithU');

        Route::get('/messageToUserSupport/{id}', 'userController@messagetoUsersupport')->name('user.messageToUserSupport');
        Route::get('/user/viewMessage', 'userController@viewMessage');

        Route::get('/addManager/{id},{eventId}', 'userController@addManager')->name('user.addManager');


    });
});
