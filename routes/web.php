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

Route::get('/', 'RoomController@index');
Route::get('rooms/{room}', 'RoomController@show');
Route::get('rooms/{room}/next-events', 'RoomController@nextEvents');
Route::post('rooms/{room}/create-event', 'RoomController@createEvent');
Route::post('rooms/{room}/end-event', 'RoomController@endEvent');