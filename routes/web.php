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

