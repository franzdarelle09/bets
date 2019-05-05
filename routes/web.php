<?php


Route::get('/', function () {
    return view('front.home');
});
Route::resource('events','Events\EventController');
Route::resource('teams','Teams\TeamController');

Auth::routes();

Route::get('/admin/home', 'HomeController@index')->name('home');