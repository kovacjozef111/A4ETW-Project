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

Route::get('/', function () {
    return view('forum');
});

Route::get('/forum', function () {
    return view('forum');
});


Route::resource('/threads', 'ThreadController');
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/users', 'UserController');

