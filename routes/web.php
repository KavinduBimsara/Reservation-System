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

    // Delete routes
    Route::get('users/{id}/delete', 'Backend\UsersController@destroy')->name('users.delete');
    Route::get('amenities/{id}/delete', 'Backend\AmenitiesController@destroy')->name('amenities.delete');

    Route::resources([
        'users'     => 'UsersController',
        'amenities' => 'AmenitiesController'
    ]);

});
