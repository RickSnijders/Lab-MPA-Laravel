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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'App\Http\Controllers\HomeController@index');

Route::get('/queue', 'App\Http\Controllers\HomeController@queue');

Route::post('/genre', 'App\Http\Controllers\HomeController@selectGenre');


Route::get('/song/{id}', 'App\Http\Controllers\SongController@view');


Route::get('/queue/add/{id}', 'App\Http\Controllers\QueueController@addSongToQueue');

Route::get('/queue/delete/{id}', 'App\Http\Controllers\QueueController@removeSongFromQueue');

Route::get('/queue/clear', 'App\Http\Controllers\QueueController@clearQueue');


Route::get('/login', 'App\Http\Controllers\LoginController@index')->name('login');

Route::post('/login/checklogin', 'App\Http\Controllers\LoginController@checklogin');

Route::get('/logout', 'App\Http\Controllers\LoginController@logout');

Route::get('/register', 'App\Http\Controllers\LoginController@register');

Route::post('/register/check', 'App\Http\Controllers\LoginController@registercheck');


Route::get('/playlist', 'App\Http\Controllers\PlaylistController@index');

Route::post('/playlist/create', 'App\Http\Controllers\PlaylistController@create')->middleware('auth');

Route::get('/playlist/save', 'App\Http\Controllers\PlaylistController@save')->middleware('auth');

Route::get('/playlist/playlistname/{id}', 'App\Http\Controllers\PlaylistController@playlistname')->middleware('auth');

Route::post('/playlist/newname', 'App\Http\Controllers\PlaylistController@newname')->middleware('auth');

Route::get('/playlist/delete/{id}', 'App\Http\Controllers\PlaylistController@delete')->middleware('auth');

Route::get('/playlist/deletesong/{id}', 'App\Http\Controllers\PlaylistController@deletesong')->middleware('auth');

Route::get('/playlist/addsong/{id}', 'App\Http\Controllers\PlaylistController@addsong')->middleware('auth');

Route::post('/playlist/addsongtop', 'App\Http\Controllers\PlaylistController@addsongtop')->middleware('auth');



