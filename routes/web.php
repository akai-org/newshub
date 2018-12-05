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
Route::get('/post/{post}', "PostController@show")->name('post');
Route::get('/post/{post}#{comment}', "PostController@show")->name('post_comment');
Route::put('/post/{post}', "PostController@update")->middleware("admin");
Route::delete('/post/{post}', "PostController@destroy")->middleware("admin");

//Comments
Route::get('/user/{username}/comments', "CommentController@user")->name('user_posts');
Route::get('/post/{post}/comments', "CommentController@show")->name('post_comments');
Route::post('/post/{post}/comment', "CommentController@store")->name("new_comment")->middleware('auth');
Route::put('/post/{post}/comment/{id}', "CommentController@update")->middleware('auth');
Route::delete('/post/{post}/comment/{id}', "CommentController@destroy")->middleware('auth');
Route::get('/users', "CommentController@users")->name('users');

Auth::routes();
