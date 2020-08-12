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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);

//public routes
Route::get('/', 'HomeController@index')->name('/');
Route::get('blog', 'HomeController@blog')->name('blog');
Route::get('about', 'AboutController@index')->name('about');
Route::get('article/{title}', 'HomeController@blogPost')->name('blog-post');
Route::get('postcategory/{category}', 'HomeController@categoryPost')->name('post-category');
Route::get('postauthor/{user}', 'HomeController@authorPost')->name('post-author');
Route::get('posttag/{tag}', 'HomeController@tagPost')->name('post-tag');
Route::get('privacypolicy', 'PrivacyController@index')->name('privacy');
Route::get('cookiespolicy', 'PrivacyController@cookies')->name('cookies');
Route::get('disclaimerpolicy', 'PrivacyController@disclaimer')->name('disclaimer');
Route::get('gallery', 'GalleryController@index')->name('gallery');
Route::get('gallery/{gallery}/show', 'GalleryController@show')->name('gallery.show');

//autheniticated routes
Route::middleware(['auth', 'suspended'])->group(function () {
    Route::post('postcomment/{post}', 'PostCommentController@postComment')->name('post-comment');
    Route::put('updatecomment/{post}', 'PostCommentController@updateComment')->name('update-comment');

    Route::post('postreply/{post}', 'PostCommentController@postReply')->name('post-reply');
});

Route::middleware(['verified', 'auth', 'suspended'])->group(function () {
    Route::get('usersettings/{user}', 'UserSettingsController@index')->name('user-settings');
    Route::get('userpassword/{user}', 'UserSettingsController@editPassword')->name('user-password');

    Route::put('updatepassword/{user}', 'UserSettingsController@updatePassword')->name('update-password');
    Route::put('updateuser/{user}', 'UserSettingsController@update')->name('update-user');
});

//admin routes
Route::middleware(['auth', 'suspended', 'admin'])->group(function () {
    Route::get('/dashboard', 'Admin\DashboardController@index')->name('dashboard');
    Route::resource('category', 'Admin\CategoryController');
    Route::resource('post', 'Admin\PostController');
    Route::resource('user', 'Admin\UserController');
    Route::resource('tag', 'Admin\TagController');
    Route::resource('galleryadmin', 'Admin\GalleryAdminController');

    Route::get('galleryimageadmin/index/{gallery}', 'Admin\GalleryImageAdminController@index')->name('galleryimage.index');
    Route::get('galleryimageadmin/create/{gallery}', 'Admin\GalleryImageAdminController@create')->name('galleryimage.create');
    Route::post('galleryimageadmin/store', 'Admin\GalleryImageAdminController@store')->name('galleryimage.store');
    Route::get('galleryimageadmin/{galleryimage}/edit', 'Admin\GalleryImageAdminController@edit')->name('galleryimage.edit');
    Route::put('galleryimageadmin/{galleryimage}/update', 'Admin\GalleryImageAdminController@update')->name('galleryimage.update');
    Route::delete('galleryimageadmin/{galleryimage}', 'Admin\GalleryImageAdminController@destroy')->name('galleryimage.destroy');

    Route::put('archive/{post}', 'Admin\PostController@archive')->name('archive-post');
    Route::put('restore/{post}', 'Admin\PostController@restore')->name('restore-post');
    Route::get('archived-posts', 'Admin\PostController@archivedPosts')->name('archived-posts');

    Route::put('update/{user}', 'Admin\UserController@update')->name('user.member-update');

    Route::get('comments', 'Admin\CommentController@index')->name('post-comments');
    Route::get('comments/{comment}', 'Admin\CommentController@manage')->name('manage-comment');
    Route::delete('comments/{comment}', 'Admin\CommentController@delete')->name('delete-comment');

    Route::get('admin/timelines', 'Admin\TimelineController@index')->name('admin-timelines');
    Route::get('admin/timelines/create', 'Admin\TimelineController@create')->name('admin-timelines-create');
    Route::post('admin/timelines/store', 'Admin\TimelineController@store')->name('admin-timelines-store');
    Route::get('admin/timelines/edit', 'Admin\TimelineController@edit')->name('admin-timelines-edit');
    Route::put('admin/timelines/update', 'Admin\TimelineController@update')->name('admin-timelines-update');
    Route::delete('admin/timelines/destroy', 'Admin\TimelineController@destroy')->name('admin-timelines-destroy');
});
