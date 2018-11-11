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
    return view('socket');
});

Route::get('/graph', function(){
    return view('graph');
});

Route::get('/controlpanel', function(){
    return view('cp');
});

Route::get('/layout', function(){
    return view('layout');
});

Route::get('/form/name/{name?}', function($name = null){
    return 'Hello Mr: ' . $name;
});
Route::get('/Maps','MapController@index');