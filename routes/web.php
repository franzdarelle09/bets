<?php


Route::get('/', 'Matches\MatchController@home');
Route::get('/match/{slug}','Matches\MatchfrontController@match');
Route::middleware(['auth'])->group(function(){
	Route::resource('events','Events\EventController');
	Route::resource('teams','Teams\TeamController');	
	Route::get('admin/matches','Matches\MatchController@index');
	Route::get('admin/matches/create','Matches\MatchController@create');
	Route::get('admin/match/{slug}','Matches\MatchController@matchDetails');
	Route::post('admin/matches/save','Matches\MatchController@store');
});

Auth::routes();

// Route::get('/truncate','Matches\MatchController@delete');
Route::get('/admin/home', 'HomeController@index')->name('home'); 
Route::post('/user/signup','Users\UserController@save');
Route::post('/user/signin','Users\UserController@signin');
Route::get('/user/signout','Users\UserController@signout');
Route::post('/predict','Matches\MatchfrontController@predict');\

Route::post('/add-time','Matches\MatchController@addTime');
Route::post('/manual-time','Matches\MatchController@manualTime');

Route::get('/populate-category','Categories\CategoryController@populateCategory');

Route::get('/test','Matches\MatchController@test');