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

Route::group(['prefix' => 'blogs'], function () {
    Route::get('/create', ['uses' => 'BlogController@create', 'as' => 'blog_create']);
    Route::post('/store', ['uses' => 'BlogController@store', 'as' => 'blog_store']);
    Route::get('/edit/{id}', ['uses' => 'BlogController@edit', 'as' => 'blog_edit']);
    Route::put('/update/{id}', ['uses' => 'BlogController@update', 'as' => 'blog_update']);
    Route::get('/destroy/{id}', ['uses' => 'BlogController@destroy', 'as' => 'blog_destroy']);
    Route::get('/{id}', ['uses' => 'BlogController@view', 'as' => 'blog_view']);
});

Route::group(['prefix' => 'blogs/{blog_id}/posts'], function () {
    Route::get('/create', ['uses' => 'PostController@create', 'as' => 'post_create']);
    Route::post('/store', ['uses' => 'PostController@store', 'as' => 'post_store']);
    Route::get('/edit/{id}', ['uses' => 'PostController@edit', 'as' => 'post_edit']);
    Route::put('/update/{id}', ['uses' => 'PostController@update', 'as' => 'post_update']);
    Route::get('/destroy/{id}', ['uses' => 'PostController@destroy', 'as' => 'post_destroy']);
    Route::get('/{id}', ['uses' => 'PostController@view', 'as' => 'post_view']);
});

Route::get('/blogs', ['uses' => 'BlogController@index', 'as' => 'blogs']);
Route::get('/posts', ['uses' => 'PostController@index', 'as' => 'posts']);

Route::post('/blogs/{blog_id}/posts/{post_id}/comments/store', ['uses' => 'CommentController@store', 'as' => 'comment_store']);
