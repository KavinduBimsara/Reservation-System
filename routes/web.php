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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group([
    'namespace' => 'Backend',
    'prefix'    => 'admin'
], function () {

    // DATATABLE ROUTES
    Route::get('users/datatable', 'UsersController@dataTable')->name('users.datatable');
    Route::get('amenities/datatable', 'AmenitiesController@dataTable')->name('amenities.datatable');
    Route::get('rooms/datatable', 'RoomsController@dataTable')->name('rooms.datatable');
    Route::get('room-type/datatable', 'RoomTypeController@dataTable')->name('room-type.datatable');

    // Delete routes
    Route::get('users/{id}/delete', 'UsersController@destroy')->name('users.delete');
    Route::get('amenities/{id}/delete', 'AmenitiesController@destroy')->name('amenities.delete');
    Route::get('rooms/{slug}/delete', 'RoomsController@destroy')->name('rooms.delete');
    Route::get('rooms-type/{slug}/delete', 'RoomTypeController@destroy')->name('room-type.delete');

    Route::resources([
        'users'     => 'UsersController',
        'amenities' => 'AmenitiesController',
        'rooms'     => 'RoomsController',
        'room-type' => 'RoomTypeController'
    ]);
});
