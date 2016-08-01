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

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'home', 'namespace' => 'Home'], function() {

    Route::group(['prefix' => 'register'], function () {
        Route::get('/create', 'RegisterController@create');
        Route::post('/store', 'RegisterController@store');
        Route::get('/sms', 'RegisterController@sms');
        Route::get('/success', 'RegisterController@success');
        Route::get('/error', 'RegisterController@error');
    });

    Route::group(['prefix' => 'replenish'], function () {
        Route::get('/create', 'ReplenishController@create');
        Route::post('/store', 'ReplenishController@store');
        Route::post('/success', 'ReplenishController@success');
        Route::post('/error', 'ReplenishController@error');
    });

    Route::get('/login', 'LoginController@showLoginForm');
    Route::post('/login', 'LoginController@login');

});


Route::group(['prefix' => 'thyroid-class', 'namespace' => 'ThyroidClass'], function() {

    Route::get('/index', 'ThyroidClassController@index');
    Route::get('/phases', 'ThyroidClassController@phases');
    Route::get('/teachers', 'ThyroidClassController@teachers');
    Route::get('/questions', 'ThyroidClassController@questions');

    Route::group(['prefix' => 'sign-up'], function () {
        Route::get('/create', 'SignUpController@create');
        Route::post('/store', 'SignUpController@store');
    });

    Route::group(['prefix' => 'course'], function() {
        Route::get('/view', 'CourseController@view');
        Route::post('/timer', 'CourseController@timer');
    });

});
