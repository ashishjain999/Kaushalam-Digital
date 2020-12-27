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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/create', 'CreateController@index');
Route::post('/create', 'CreateController@store');
Route::get('/edit/{id}/{sef_url}', 'CreateController@edit');
Route::put('/update/{id}', 'CreateController@update');
Route::delete('/delete/{id}', 'CreateController@delete');

