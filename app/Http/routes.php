<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('guest', 'GuestController',
    ['except' => ['create', 'edit']]
);

Route::resource('roomType', 'RoomTypeController',
    ['except' => ['create', 'edit']]
);

//room
Route::get('room', 'RoomController@getAll');

Route::get('room/{id}', 'RoomController@index');

Route::post('room', 'RoomController@store');

//reservation

Route::get('reservation/{startDate}/{endDate}', 'ReservationController@index');
