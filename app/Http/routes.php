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

Route::auth();

Route::get('/', ['uses' => 'HomeController@index', 'as' => 'home']);

Route::group(['prefix' => 'blog'], function () {
    Route::get('/view/{id}', ['uses' => 'BlogController@get', 'as' => 'blog_view']);
    Route::post('/create', ['uses' => 'BlogController@create', 'as' => 'blog_create']);
    Route::put('/update', ['uses' => 'BlogController@update', 'as' => 'blog_update']);
    Route::delete('delete', ['uses' => 'BlogController@delete', 'as' => 'blog_delete']);
    Route::get('/', ['uses' => 'BlogController@get', 'as' => 'blogs']);
});

