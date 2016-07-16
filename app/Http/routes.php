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

Route::group(['prefix' => 'blog'], function () {
    Route::get('/view/{id}', ['uses' => 'BlogController@get']);
    Route::post('/create', ['uses' => 'BlogController@create']);
    Route::put('/update', ['uses' => 'BlogController@update']);
    Route::delete('delete', ['uses' => 'BlogController@delete']);
    Route::get('/', ['uses' => 'BlogController@get']);
});

Route::auth();

Route::get('/home', 'HomeController@index');
