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

Auth::routes();

Route::get('/', 'TweetController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/users/{id}', 'UserController@index')->name('user.index');
    Route::get('/users/{id}/tweets/create', 'UserTweetController@create')->name('user.tweet.create');
    Route::post('/users/{id}/tweets/create', 'UserTweetController@store')->name('user.tweet.store');
});
