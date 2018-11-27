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

Route::get('/', "HomeController@index")->name('index');
Route::get('/user', "HomeController@user")->name('user');
Route::get('/user/{username}', "HomeController@user");
Route::get('/create', "HomeController@create");

Route::post('/posts', "HomeController@new_post")->name("posts");

Auth::routes();
