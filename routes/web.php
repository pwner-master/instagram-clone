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

Route::get('/', 'PostsController@index');

Auth::routes();

Route::post('/follow/{user}', 'FollowsController@store');

Route::get('/p/create', 'PostsController@create');
Route::post('/p', 'PostsController@store');
Route::get('/p/{post}', 'PostsController@show');


Route::get('/home', 'HomeController@index')->name('home.show');

Route::post('/search', 'HomeController@search')->name('search');

Route::get('/profile/index', 'ProfilesController@index')->name('profile.index');
Route::get('/profile/show/{user}', 'ProfilesController@show')->name('profile.show');
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::post('/profile/update/{user}', 'ProfilesController@update')->name('profile.update');

