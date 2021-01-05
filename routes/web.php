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

Route::get('/time', function () {
    return date('h:i:s');  
});

//ADMIN ROUTES
Route::group(['middleware'=>['sess']], function(){
    Route::group(['middleware'=>['admin']], function(){
        Route::get('/admin', 'adminController@index')->name('admin.index');

        Route::get('/admin/moderators', 'adminController@moderators')->name('admin.moderators');
        Route::get('/admin/moderators/add', 'adminController@moderatorsAdd')->name('admin.moderatorsAdd');
        Route::post('/admin/moderators/add', 'adminController@createModerator')->name('admin.createModerator');
        Route::get('/admin/moderators/edit/{id}', 'adminController@moderatorsEdit')->name('admin.moderatorsEdit');
        Route::post('/admin/moderators/edit/{id}', 'adminController@updateModerator')->name('admin.updateModerator');
        Route::get('/admin/moderators/delete/{id}', 'adminController@deleteModerator')->name('admin.deleteModerator');

        Route::get('/admin/userSupports', 'adminController@userSupports')->name('admin.userSupports');
        Route::get('/admin/userSupports/add', 'adminController@userSupportsAdd')->name('admin.userSupportsAdd');
        Route::post('/admin/userSupports/add', 'adminController@createUserSupport')->name('admin.createUserSupport');
        Route::get('/admin/userSupports/edit/{id}', 'adminController@userSupportsEdit')->name('admin.userSupportsEdit');
        Route::post('/admin/userSupports/edit/{id}', 'adminController@updateUserSupport')->name('admin.updateUserSupport');
        Route::get('/admin/userSupports/delete/{id}', 'adminController@deleteUserSupport')->name('admin.deleteUserSupport');

        Route::get('/admin/users', 'adminController@users')->name('admin.users');
        Route::get('/admin/users/add', 'adminController@usersAdd')->name('admin.usersAdd');
        Route::post('/admin/users/add', 'adminController@createUser')->name('admin.createUser');
        Route::get('/admin/users/edit/{id}', 'adminController@usersEdit')->name('admin.usersEdit');
        Route::post('/admin/users/edit/{id}', 'adminController@updateUser')->name('admin.updateUser');
        Route::get('/admin/users/delete/{id}', 'adminController@deleteUser')->name('admin.deleteUser');

        Route::get('/admin/events', 'adminController@events')->name('admin.events');
        Route::get('/admin/events/view/{id}', 'adminController@viewEvent')->name('admin.viewEvent');
        Route::get('/admin/events/approve/{id}', 'adminController@approveEvent')->name('admin.approveEvent');
        Route::get('/admin/events/decline/{id}', 'adminController@declineEvent')->name('admin.declineEvent');
        Route::get('/admin/events/edit/{id}', 'adminController@eventsEdit')->name('admin.eventsEdit');
        Route::post('/admin/events/edit', 'adminController@updateEvent')->name('admin.updateEvent');
        Route::get('/admin/events/delete/{id}', 'adminController@deleteEvent')->name('admin.deleteEvent');
        Route::get('/admin/events/donate/{id}', 'adminController@donateEvent')->name('admin.donateEvent');
        Route::post('/admin/events/donate/{id}', 'adminController@donateToEvent')->name('admin.donateToEvent');

        Route::get('/admin/messages', 'adminController@messages')->name('admin.messages');
        Route::post('/admin/messages/send', 'adminController@sendMessage')->name('admin.sendMessage');
        Route::get('/admin/messages/{id}', 'adminController@convoMessages')->name('admin.convoMessages');

        Route::get('/admin/reports', 'adminController@reports')->name('admin.reports');
        Route::post('/admin/reports/donations/download', 'adminController@donationsReportDownload')->name('admin.donationsReportDownload');
    });
});

Route::group(['middleware'=>['sess']], function(){
    Route::group(['middleware'=>['moderator']], function(){
        Route::get('/moderator', 'moderatorController@index');
        
        Route::get('/moderator/event/approve/{id}', 'moderatorController@approve')->name('event.approve');
        Route::post('/moderator/event/approve/{id}', 'moderatorController@approved')->name('event.approved');

        Route::get('/moderator/event/modify/{id}', 'moderatorController@modify')->name('event.modify');
        Route::post('moderator/event/modify/{id}', 'moderatorController@modified')->name('event.modified');

        Route::get('/moderator/event/decline/{id}', 'moderatorController@decline')->name('event.decline');
        Route::post('/moderator/event/decline/{id}', 'moderatorController@declined')->name('event.declined');

        Route::get('/api/{id}', 'moderatorController@getMsg')->name('event.approve');
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

        Route::get('/addManager/{id},{eventId}', 'userController@addManager')->name('user.addManager');

        Route::get('/message',  'userController@message')->name('user.message');
        Route::get('/messageToUserSupport/{id}', 'userController@messagetoUsersupport')->name('user.messageToUserSupport');
        Route::post('/messageToUserSupport/{id}' , 'userController@messagetousersupport');
        
        Route::get('/user/view', 'userController@messageWithU');

        Route::get('/user/viewMessage/{id}', 'userController@viewMessage');

        


    });
});

//SOCIAL LOGINS

Route::get('/login/google', 'loginController@google');
Route::get('/login/google/redirect', 'loginController@googleRedirect');
