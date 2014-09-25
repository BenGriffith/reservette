<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'RoomsController@index');

Route::get('login', 'HomeController@showLogin');

Route::post('login', 'HomeController@doLogin');

Route::get('logout', 'HomeController@logout');

Route::get('reservations/create/{room_id}', 'ReservationsController@create');

Route::get('rooms/options', 'RoomsController@options');

Route::post('reservations/approve/{id}', 'ReservationsController@approveReservation');

Route::resource('reservations', 'ReservationsController');

Route::resource('rooms', 'RoomsController');

Route::resource('users', 'UsersController');

Route::get('admin/{filter?}', 'AdminController@index');

Route::resource('signup', 'SignupController');

Route::get('admin/{room_id?}', 'AdminController@index');

Route::resource('admin', 'AdminController');

Route::controller('password', 'RemindersController');
