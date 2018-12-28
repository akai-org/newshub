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

//Posts
Route::get('/', "PostController@index")->name('index');
Route::get('/user/{username}', "PostController@user")->name('user_posts');
Route::get('/user/{username}/posts', "PostController@user");
Route::match(['get','post'], '/create', "PostController@create")->name('new_post')->middleware('auth');
Route::post('/store', "PostController@store")->name('store_post')->middleware("auth");
Route::post('/post/{post}/vote', "PostController@vote")->name('vote_post')->middleware("can:change,post");
Route::get('/post/{post}', "PostController@show")->name('post');
Route::put('/post/{post}', "PostController@update")->middleware("can:change,post");
Route::delete('/post/{post}', "PostController@destroy")->middleware("can:change,post");

//Comments
Route::get('/user/{username}/comments', "CommentController@user")->name('user_posts');
Route::get('/post/{post}/comments', "CommentController@show")->name('post_comments');
Route::post('/post/{post}/comment', "CommentController@store")->name("new_comment")->middleware("can:change,comment");
Route::put('/comment/{comment}', "CommentController@update")->middleware("can:change,comment");
Route::delete('/comment/{comment}', "CommentController@destroy")->middleware("can:change,comment");
Route::get('/users', "CommentController@users")->name('users');
Route::post('/comment/{comment}/vote', "CommentController@vote")->name("vote_comment")->middleware("can:change,comment");

Auth::routes();
