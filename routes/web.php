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

// Route::get('/', "HomeController@index")->name('index');
// Route::get('/user', "HomeController@user")->name('user');
// Route::get('/user/{username}', "HomeController@user");
// Route::get('/user/{username}/posts', "HomeController@user");
// Route::get('/create', "HomeController@create");
// Route::get('/new_post', "HomeController@new_post")->name('new_post')->middleware("auth");
// Route::post('/store_post', 'HomeController@store_post')->name('store_post')->middleware("auth");
// Route::get('/post/{slug}', "HomeController@post")->name('post');

//Posts
Route::get('/', "PostController@index")->name('index');
Route::get('/user/{username}', "PostController@user")->name('user_posts');
Route::get('/user/{username}/posts', "PostController@user");
Route::get('/create', "PostController@create")->name('new_post');
Route::post('/create', "PostController@store")->name('store_post')->middleware("auth");
Route::get('/post/{slug}', "PostController@show")->name('post');
Route::get('/post/{slug}#{comment}', "PostController@show")->name('post_comment');
Route::put('/post/{slug}', "PostController@update")->middleware("admin");
Route::delete('/post/{slug}', "PostController@destroy")->middleware("admin");

//Comments
Route::get('/user/{username}/comments', "CommentController@user")->name('user_posts');
Route::post('/post/{slug}/comment', "CommentController@store")->middleware('auth');
Route::put('/post/{slug}/comment/{id}', "CommentController@update")->middleware('auth');
Route::delete('/post/{slug}/comment/{id}', "CommentController@destroy")->middleware('auth');

Auth::routes();
