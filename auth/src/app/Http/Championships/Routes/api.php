<?php

use Illuminate\Support\Facades\Route;

Route::post('championship/{championship}/league', 'ChampionshipController@addLeague');
Route::delete('championship/{championship}/league/{league}/', 'ChampionshipController@removeLeague');
Route::get('championship/{championship}/fixtures', 'ChampionshipController@fixtures');


Route::post('championship/{championship}/join', 'ChampionshipController@join');
Route::resource('championship', 'ChampionshipController');

Route::resource('country', 'CountryController');
Route::resource('league', 'LeagueController');
Route::resource('team', 'TeamController');
Route::resource('fixture', 'FixtureController');
Route::resource('bookmaker', 'BookmakerController');
Route::resource('bet-category', 'BetCategoryController');
Route::resource('odd', 'OddController');
