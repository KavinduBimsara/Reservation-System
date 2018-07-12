<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group([
    'namespace'  => 'Backend',
    'prefix'     => 'admin',
    'middleware' => 'auth',
], function () {

    // DATATABLE ROUTES
    Route::get('users/datatable', 'UsersController@dataTable')->name('users.datatable');
    Route::get('amenities/datatable', 'AmenitiesController@dataTable')->name('amenities.datatable');
    Route::get('rooms/datatable', 'RoomsController@dataTable')->name('rooms.datatable');
    Route::get('room-type/datatable', 'RoomTypeController@dataTable')->name('room-type.datatable');
    Route::get('currencies/datatable', 'CurrenciesController@dataTable')->name('currencies.datatable');
    Route::get('customers/datatable', 'CustomersController@dataTable')->name('customers.datatable');
    Route::get('reservations/datatable', 'ReservationsController@dataTable')->name('reservations.datatable');
    Route::get('rates/datatable', 'RatesController@dataTable')->name('rates.datatable');

    // Delete routes
    Route::get('users/{id}/delete', 'UsersController@destroy')->name('users.delete');
    Route::get('amenities/{id}/delete', 'AmenitiesController@destroy')->name('amenities.delete');
    Route::get('rooms/{slug}/delete', 'RoomsController@destroy')->name('rooms.delete');
    Route::get('rooms-type/{slug}/delete', 'RoomTypeController@destroy')->name('room-type.delete');
    Route::get('currencies/{id}/delete', 'CurrenciesController@destroy')->name('currencies.delete');
    Route::get('customers/{id}/delete', 'CustomersController@destroy')->name('customers.delete');
    Route::get('reservations/{id}/delete', 'ReservationsController@destroy')->name('reservations.delete');

    // SoftDelete
    Route::get('reservatioms/{id}/cancel', 'ReservationsController@cancelReservation')->name('reservations.cancel');

    Route::resources([
        'users'        => 'UsersController',
        'amenities'    => 'AmenitiesController',
        'rooms'        => 'RoomsController',
        'room-type'    => 'RoomTypeController',
        'customers'    => 'CustomersController',
        'reservations' => 'ReservationsController',
        'currencies'   => 'CurrenciesController',
        'rates'        => 'RatesController',
    ]);
});
