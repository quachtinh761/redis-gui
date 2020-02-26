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

use Illuminate\Support\Facades\Route;

Route::get('/', 'ConnectionController@index')->name('connection.get');


Route::group([
    'prefix' => 'connect',
], function () {
    Route::get('/', 'RedisController@index')->name('redis.get');
    Route::post('/add', 'RedisController@add')->name('redis.add');
    Route::post('/delete', 'RedisController@delete')->name('redis.delete');
});

