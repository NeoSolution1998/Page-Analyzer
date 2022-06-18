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

Route::get('/', 'App\Http\Controllers\MainController@home')->name('/.home');

Route::get('/urls', 'App\Http\Controllers\MainController@index')->name('urls.index');

Route::post('/urls', 'App\Http\Controllers\MainController@store')->name('urls.store');

Route::get('/urls/{id}', 'App\Http\Controllers\MainController@show')->name('urls.show');

//Route::post('/urls/{id}/checks', 'App\Http\Controllers\MainController@urls_id_post')->name('post-urlsId');

