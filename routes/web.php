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

Route::get('/', 'ShortLinkController@index');
Route::post('/', 'ShortLinkController@store')->name('generate.shorten.link.post');
Route::post('/hit', 'ShortLinkController@hit')->name('shorten.link.hit.post');
   
Route::get('{code}', 'ShortLinkController@shortenLink')->name('shorten.link');

