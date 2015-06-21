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
/****************************************
    Laravel Authentication
****************************************/
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
Route::get('logout', 'Auth\AuthController@getlogout');

Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index');


/****************************************
    User
****************************************/
Route::get('users', 'UserController@viewAll');
Route::get('users/create', 'UserController@create');
Route::post('users/create', 'UserController@postCreate');
Route::get('users/{id}', 'UserController@view');
Route::get('users/{id}/update', 'UserController@update');
Route::post('users/{id}/update', 'UserController@postUpdate');
Route::delete('users/{id}/delete', 'UserController@delete');
Route::get('users/{id}/comments', 'UserController@usercomments');
Route::get('logout', 'UserController@logout');

/****************************************
   Messaging routes
****************************************/
Route::get('comments', 'messageController@viewAll');
Route::get('message/create', 'messageController@create');
Route::post('message/create', 'messageController@postCreate');
Route::get('message/{id}', 'messageController@view');
Route::get('message/{id}/by_match', 'messageController@viewAllByMatch');
Route::get('message/{id}/by_user', 'messageController@viewAllByUser');
Route::get('message/{id}/update', 'messageController@update');
Route::post('message/{id}/update', 'messageController@postUpdate');
Route::get('message/{id}/delete', 'messageController@delete');

/****************************************
   Match routes
****************************************/

Route::get('matches', 'MatchController@viewAll');
Route::get('match/create', 'MatchController@create');
Route::post('match/create', 'MatchController@postCreate');
Route::get('match/{id}', 'MatchController@view');
Route::get('match/{id}/by_user', 'MatchController@viewAllByUser');
Route::get('json/match/{id}/by_user', 'MatchController@jsonViewAllByUser');
Route::get('match/{id}/findmatchesfor', 'MatchController@matchByMatch');
Route::get('match/{id}/update', 'MatchController@update');
Route::post('match/{id}/update', 'MatchController@postUpdate');
Route::get('match/{id}/delete', 'MatchController@delete');
Route::get('ajax/match/{id}/delete', 'MatchController@ajaxdelete');

/****************************************
   location routes
****************************************/

Route::get('locations', 'LocationController@viewAll');
Route::get('location/create', 'LocationController@create');
Route::post('location/create', 'LocationController@postCreate');
Route::get('location/user', 'LocationController@viewAllByUser');
Route::get('location/{id}', 'LocationController@view');
Route::get('location/{id}/by_Match', 'LocationController@viewAllByMatch');
Route::get('location/{id}/update', 'LocationController@update');
Route::post('location/{id}/update', 'LocationController@postUpdate');
Route::get('location/{id}/delete', 'LocationController@delete');