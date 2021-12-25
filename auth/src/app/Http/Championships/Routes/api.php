<?php

use Illuminate\Support\Facades\Route;

Route::resource('championship', 'ChampionshipController');
Route::resource('country', 'CountryController');
Route::resource('league', 'LeagueController');
Route::resource('team', 'TeamController');
Route::resource('fixture', 'FixtureController');
Route::resource('bookmaker', 'BookmakerController');
Route::resource('bet-category', 'BetCategoryController');
