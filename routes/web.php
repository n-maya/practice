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

//facebook認証

Route::get('/login/{social}', 'Auth\LoginController@socialLogin')
->where('social', 'facebook|twitter');
Route::get('/login/{social}/callback', 'Auth\LoginController@handleProviderCallback')
->where('social', 'facebook|twitter');


//Memos 2019年5月8日
Route::get('/memos/home', 'MemosController@index')->name('top');
Route::resource('/memos', 'MemosController', ['only' => ['create', 'store', 'edit', 'update', 'destroy']]);

//Reminder 2019年5月10日
Route::get('/reminder/index', 'ReminderController@index')->name('reminder');
Route::resource('/reminder', 'ReminderController', ['only' => ['store', 'destroy']]);


//Garelly 2019年5月12日
Route::resource('/gallery', 'GalleryController', ['only' => ['index', 'create', 'store', 'show', 'destroy']]);

//Calendar 2019年5月13日
Route::get('events', 'EventController@index')->name('events.index');
Route::post('events', 'EventController@addEvent')->name('events.add');
