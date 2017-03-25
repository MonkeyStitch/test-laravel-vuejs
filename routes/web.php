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
    return view('welcome');
});

Route::get('/add_friend', function () {
    return \App\User::find(1)->add_friend(3);
});

Route::get('/accept_friend', function () {
    return \App\User::find(4)->accept_friend(1);
});

Route::get('/pending_friends', function () {
    return \App\User::find(3)->pending_friend_requests();
});

Route::get('/ids', function () {
    return \App\User::find(4)->friends_ids();
});

Route::get('/is', function () {
    return \App\User::find(3)->is_friends_with(1);
});


Auth::routes();

Route::get('/home', 'HomeController@index');


Route::group(['middleware' => 'auth'], function (){

    Route::get('profile/{slug}', [
        'uses' => 'ProfilesController@index',
        'as' => 'profile'
    ]);


    Route::get('profile/edit/me', [
        'uses' => 'ProfilesController@edit',
        'as' => 'profile.edit'
    ]);

    Route::post('profile/update/me', [
        'uses' => 'ProfilesController@update',
        'as' => 'profile.update'
    ]);
});
