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



Route::group(array('prefix' => 'api'), function()
{
    Route::resource('book', 'RestBookController');
    Route::resource('user', 'RestUserController');
    Route::get('/user/{id}/books','RestUserController@showBooks');
    Route::get('/user/{uid}/book/{id}/get','RestUserController@getBook');
    Route::get('/user/{uid}/book/{id}/pass','RestUserController@passBook');
});

