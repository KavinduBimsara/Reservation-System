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

Route::get('users/{id}/delete', 'Backend\UsersController@destroy')->name('users.delete');
Route::get('amenities/{id}/delete', 'Backend\AmenitiesController@destroy')->name('amenities.delete');

// DATATABLE ROUTES
Route::get('users/datatable', 'Backend\UsersController@dataTable')->name('users.datatable');
Route::get('amenities/datatable', 'Backend\AmenitiesController@dataTable')->name('amenities.datatable');

Route::resources([
    'users'     => 'Backend\UsersController',
    'amenities' => 'Backend\AmenitiesController'
]);
