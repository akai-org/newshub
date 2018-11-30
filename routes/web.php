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
Route::get('/user/{username}/posts', "HomeController@user");
Route::get('/create', "HomeController@create");
Route::get('/new_post', "HomeController@new_post")->name('new_post')->middleware("auth");
Route::post('/store_post', 'HomeController@store_post')->name('store_post')->middleware("auth");

// Route::resource('posts', 'PostController')->only(['store', 'update', 'destroy']);

// Posts
// Route::get('/', "PostController@index")->name('index');
// Route::get('/user/{username}', "PostControler@user")->name('profile');
// Route::get('/user/{username}/posts', "PostControler@user");
// Route::get('/create', "PostController@create");
// Route::post('/create', "PostController@store");
// Route::get('/post/{id}', "PostController@show");
// Route::put('/post/{id}', "PostController@update");
// Route::delete('/post/{id}', "PostController@destroy");

Auth::routes();
