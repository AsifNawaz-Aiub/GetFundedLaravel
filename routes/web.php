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

Route::get('/signup', function () {
    return view('signup.index');
});

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
        Route::post('moderator/event/modify/{id}', 'moderatorController@modified')->name('event.modified');

        Route::get('/moderator/event/decline/{id}', 'moderatorController@decline')->name('event.decline');
        Route::post('/moderator/event/decline/{id}', 'moderatorController@declined')->name('event.declined');

        Route::get('/api/{id}', 'moderatorController@getMsg')->name('event.approve');
    });
});




    
// Route::get('/api/{id}', function ($id) {

   
//     $client = new \GuzzleHttp\Client();
//     $res = $client->request('GET', 'http://127.0.0.1:4000/moderator/msg/'.$id.'/'.$sid);
//     //echo $res->getStatusCode();
//     // "200"
//     //echo $res->getHeader('content-type')[0];
//     // 'application/json; charset=utf8'
//    //echo $res->getBody();
   
//   $d=$res->getBody();


// //echo $d;

// return response($d);

    
// });