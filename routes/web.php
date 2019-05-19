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
Route::get('/calendar/events', 'EventController@index')->name('events.index');
Route::post('/calendar/events', 'EventController@addEvent')->name('events.add');

//CalendarPro 2019年5月15日
Route::get('/calendarPro/calendar', 'CalendarController@index')->name('events.index');
Route::get('/calendarPro/create', 'CalendarController@create');

//Background-Switcher
Route::get('/background-switcher/home', 'BackgroundController@home');
Route::post('/background-switcher/home', 'BackgroundController@switch')->name('background.switch');

//approval 2019年5月18日
use App\Comment;
Route::get('/approval/front', function(){
  $comments = Comment::where('approve','1')->get();
  return view('/approval/front')->with('comments', $comments);
});

Route::post('/commentApproval', 'CommentsController@store');
Route::post('/toggle-approve', 'CommentsController@approval');

Route::get('/approval/dash', function(){
  $comments = Comment::orderBy('created_at','desc')->get();
  return view('/approval/dashboard')->with('comments', $comments);
});

//sendemail 2019年5月19日
Route::get('/mail/sendemail', 'SendEmailController@index');
Route::post('/sendemail/send', 'SendEmailController@send');
