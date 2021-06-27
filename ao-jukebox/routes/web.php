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

Route::get('/song/{id}', 'App\Http\Controllers\SongController@view');

Route::get('/queue/add/{id}', 'App\Http\Controllers\QueueController@addSongToQueue');

