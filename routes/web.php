<?php

Route::post('/rooms/create', 'RoomController@create');
Route::delete('/rooms/delete', 'RoomController@delete');
Route::get('/rooms/list', 'RoomController@list');

Route::post('/bookings/create', 'BookingController@create');
Route::delete('/bookings/delete', 'BookingController@delete');
Route::get('/bookings/list', 'BookingController@list');

