<?php


Route::get('/', function () {
    return view('front.home');
});
Route::get('/match/{slug}','Matches\MatchfrontController@match');
Route::middleware(['auth'])->group(function(){
	Route::resource('events','Events\EventController');
	Route::resource('teams','Teams\TeamController');	
	Route::get('admin/matches','Matches\MatchController@index');
	Route::get('admin/matches/create','Matches\MatchController@create');
	Route::post('admin/matches/save','Matches\MatchController@store');
});

Auth::routes();

Route::get('/admin/home', 'HomeController@index')->name('home'); 
Route::post('/user/signup','Users\UserController@save');
Route::post('/user/signin','Users\UserController@signin');
Route::get('/user/signout','Users\UserController@signout');
Route::post('/predict','Matches\MatchfrontController@predict');

Route::get('/test','Matches\MatchController@test');