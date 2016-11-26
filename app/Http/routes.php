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

Route::group(['middleware' => 'web'], function () {
    // Routes...
    Route::get('/','MainController@index');
    Route::get('logout','Auth\AuthController@logout');

    Route::post('sendmessage', 'chatController@sendMessage');
    Route::post('get-state', 'RoulleteController@getState');
    Route::post('game-start', 'RoulleteController@gameStart');
});

Route::group(['middleware' => 'auth'], function () {
    // Auth Routes...
    Route::get('deposit','MainController@deposit');
    Route::get('withdraw','MainController@withdraw');
    Route::get('support','MainController@support');
    Route::get('free-coins','MainController@freeCoins');
    Route::post('set-bet', 'RoulleteController@setBet');

});

// Admin panel routes

Route::group(['middleware' => 'web'], function () {
    //Login Routes...
    Route::get('/admin/login','AdminAuth\AuthController@showLoginForm');
    Route::post('/admin/login','AdminAuth\AuthController@login');
    Route::get('/admin/logout','AdminAuth\AuthController@logout');

    // Registration Routes...
    Route::get('/admin/register', 'AdminAuth\AuthController@showRegistrationForm');
    Route::post('/admin/register', 'AdminAuth\AuthController@register');



});

Route::group(['middleware' => 'web'], function(){
    Route::get('/admin/home', 'HomeController@index');
    Route::get('/admin', function () {
        return view('hhwelcome');
    });
});


Route::get('login', 'Auth\AuthController@login');