<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/', 'MainController@main')->name('home');


Route::get('/signup', 'AuthController@getSignup')->middleware('guest')->name('auth.signup');
Route::post('/signup', 'AuthController@postSignup')->middleware('guest');

Route::get('/signin', 'AuthController@getSignin')->middleware('guest')->name('auth.signin');
Route::post('/signin', 'AuthController@postSignin')->middleware('guest');

Route::get('/signout', 'AuthController@getSignout')->name('auth.signout');

Route::get('profile/{firstname}', 'ProfileController@getProfile')->name('profile');


Route::get('prodile/edit', 'ProfileController@getEdit')->middleware('auth')->name('profileget.edit');
Route::post('prodile/edit', 'ProfileController@postEdit')->middleware('auth')->name('profilepost.edit');
Route::post('prodile/edit/upload_avatar', 'ProfileController@postUploadAvatar')->middleware('auth')->name('upload_avatar');


Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/admin', 'AdminController@allUser')->name('admin');
    Route::get('user/{id}', 'AdminController@makeUser')->name('user');
    Route::get('makeadmin/{id}', 'AdminController@makeAdmin')->name('make_admin');
    Route::get('ban/{id}', 'AdminController@addBan')->name('add_ban');
    Route::get('unban/{id}', 'AdminController@unban')->name('unban');


});
