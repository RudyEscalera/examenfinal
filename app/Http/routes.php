<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
Route::resource('likes','LikesController');


Route::get('/photo', [
    'as' => 'choose_photo', 'uses' => 'ProfilesController@choosePhoto'
]);
Route::get('/edit', [
    'as' => 'edit', 'uses' => 'ProfilesController@edit'
]);

Route::post('/save', [
    'as' => 'save_photo', 'uses' => 'ProfilesController@savePhoto'
]);
Route::get('/index', [
    'as' => 'show_index', 'uses' => 'ProfilesController@showIndex'
]);
Route::post('user/search', array('as' => 'profile.search', 'uses' => 'ProfilesController@userSearch'));
Route::post('post/search', array('as' => 'post.search', 'uses' => 'PostsController@postSearch'));
Route::get('/{name}', [
    'as' => 'show_profile', 'uses' => 'ProfilesController@showProfile'
]);


Route::resource('posts','PostsController');

Route::resource('idols','IdolsController',
    ['only'=>['store']]);

Route::resource('comments','CommentsController',
    ['only'=>['store']]);


Route::get('/', function () {
    return view('welcome');
});


