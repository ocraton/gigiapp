<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
  return redirect('/events/create');
});

Route::get('/events', 'EventController@index');
Route::get('/events/{id}/edit', 'EventController@edit');
Route::get('/events/create', 'EventController@create');
Route::post('/events/{id}', 'EventController@update');
Route::post('/events', 'EventController@store');
Route::delete('events/{id}', 'EventController@destroy');

Route::get('/settings/edit', 'SettingsController@edit');
Route::put('/settings', 'SettingsController@update');

Route::post('/locandina-upload', 'UploadController@store');
