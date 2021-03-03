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

Route::get('/', 'PostsController@index');
Route::get('/posts/{post}', 'PostsController@show')->where('post', '[0-9]+');
Route::get('/posts/create', 'PostsController@create')->middleware('auth');
Route::post('/posts', 'PostsController@store')->middleware('auth');
Route::get('/posts/{post}/edit', 'PostsController@edit')->middleware('auth');
Route::patch('/posts/{post}', 'PostsController@update')->middleware('auth');
Route::delete('/posts/{post}', 'PostsController@destroy')->middleware('auth');
Route::post('/posts/{post}/comments', 'CommentsController@store')->middleware('auth');
Route::delete('/posts/{post}/comments/{comment}', 'CommentsController@destroy')->middleware('auth');
Route::get('/uploaders', 'UploadersController@getIndex')->middleware('auth');
Route::post('/uploaders', 'UploadersController@upload')->middleware('auth');

Auth::routes([
  'reset'   =>  false,
  'verify'  =>  false
]);

Route::prefix('admin')->namespace('Admin')->name('admin.')->group(function () {
  Auth::routes([
    'reset'   =>  false,
    'verify'  =>  false
  ]);
});
Route::get('/admin/home', 'Admin\AdminHomeController@index')->name('admin_home');
