<?php

Route::resource('categories','Categories\CategoryController');
Route::get('events','Events\EventController@indexapi');
Route::get('teams','Teams\TeamController@indexapi');
Route::get('matches','Matches\MatchController@indexapi');