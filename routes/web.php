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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

//admin routes
Route::middleware(['auth', 'suspended', 'admin'])->group(function () {
    Route::get('/dashboard', 'Admin\DashboardController@index')->name('dashboard');
    Route::resource('category', 'Admin\CategoryController');
    Route::resource('post', 'Admin\PostController');
    Route::resource('user', 'Admin\UserController');
    Route::resource('tag', 'Admin\TagController');

    Route::put('archive/{post}', 'Admin\PostController@archive')->name('archive-post');
    Route::put('restore/{post}', 'Admin\PostController@restore')->name('restore-post');
    Route::get('archived-posts', 'Admin\PostController@archivedPosts')->name('archived-posts');

    Route::put('update/{user}', 'Admin\UserController@update')->name('user.member-update');
});
