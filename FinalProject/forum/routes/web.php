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

Auth::routes();

Route::get('/', 'ThreadController@index');
Route::get('/forum', 'ThreadController@index');

Route::resource('/users', 'UserController');
Route::resource('/threads', 'ThreadController');
Route::resource('/replies', 'ReplyController');

Route::get('/replies/delete/{id}/','ReplyController@destroy');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

//safe in controller constructor
Route::get('/users/delete/{id}','UserController@destroy');

