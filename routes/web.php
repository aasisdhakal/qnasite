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


//This is the routes for HomePage

Route::get('/', 'PostController@index')->name('home');

Route::get('/add-post','PostController@create')->name('add_post');

Route::post('add-post/{id}','PostController@store')->name('store_post');

Route::get('show-post/{id}','PostController@show')->name('show_posts');

Route::post('tag-store/{id}','TagController@store')->name('store_tag');

Route::get('/','PostController@showAllPost')->name('showAll');

Route::get('show/tag','TagController@show')->name('showtag');


Route::get('liked/{post}','LikeController@like')->name('likes');
