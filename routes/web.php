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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('athletes', 'AthletesController');
Route::resource('gallery', 'GalleryController');
Route::resource('events', 'EventsController');
Route::resource('board', 'BoardMemberController');

Route::get('/coaches', 'PagesController@coaches');
Route::get('/guidelines', 'PagesController@guide');
Route::get('/registration', 'PagesController@register');