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

Route::get('/data/guilds', function(){
  return App\Guild::all()->where( 'user_id', Auth::user()->id )->toJson();
});
Route::get('/data/guild/{guild}/messages', function($guild){
  return App\Message::all()->where( 'guild_id', $guild )->toJson();
});
