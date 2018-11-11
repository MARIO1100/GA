<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('contact', 'Apis\ContactController');
Route::resource('person', 'Apis\PersonController');
Route::resource('user', 'Apis\UserController');
Route::resource('incident', 'Apis\IncidentController');
Route::resource('location', 'Apis\LocationController');

Route::post('socket', 'Apis\IncidentControllerSocket@saveAccident');

Route::get('dashPerHour', 'Apis\DashboardController@getIncidentsPerHour');
Route::get('dashPerDay', 'Apis\DashboardController@getIncidentsPerDay');
Route::get('dash', 'Apis\DashboardController@getAll');
