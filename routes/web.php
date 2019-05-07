<?php


Route::get('/', function () {
    return view('front.home');
});

Route::middleware(['auth'])->group(function(){
	Route::resource('events','Events\EventController');
	Route::resource('teams','Teams\TeamController');	
	Route::get('admin/matches','Matches\MatchController@index');
	Route::get('admin/matches/create','Matches\MatchController@create');
});

Auth::routes();

Route::get('/admin/home', 'HomeController@index')->name('home');