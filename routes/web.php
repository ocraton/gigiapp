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
Route::get('/events/edit', 'EventController@edit');
Route::get('/events/create', 'EventController@create');
Route::patch('/events', 'EventController@update');
Route::post('/events', 'EventController@store');

Route::get('/settings/edit', 'SettingsController@edit');
Route::patch('/events', 'SettingsController@update');

Route::post('/locandina-upload', 'UploadController@store');
