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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/data/guilds', 'HomeController@guilds');
Route::get('/data/guild/{guild}/messages', 'HomeController@guildMessages');
Route::post('/data/guild/{guild}/send', 'HomeController@messageSend');
