<?php

use Illuminate\Support\Facades\Route;

Route::post('championship/{championship}/league', 'ChampionshipController@addLeague');
Route::delete('championship/{championship}/league/{league}/', 'ChampionshipController@removeLeague');
Route::get('championship/{championship}/fixtures', 'ChampionshipController@fixtures');
Route::post('championship/{championship}/bet-slip', 'ChampionshipController@syncBetSlip');
Route::get('championship/{championship}/bet-slip', 'ChampionshipController@betSlips');
Route::patch('championship/{championship}/bet-slip/{bet_slip_item}', 'ChampionshipController@updateBetSlip');
Route::delete('championship/{championship}/bet-slip/{bet_slip_item}', 'ChampionshipController@deleteBetSlip');
Route::get('championship/{championship}/bet-slip-ids/', 'ChampionshipController@betSlipIds');


Route::get('championship/{championship}/bet-slip/points', 'BetSlipController@points');
Route::post('championship/{championship}/bet-slip/finalize', 'BetSlipController@finalize');


Route::post('championship/{championship}/join', 'ChampionshipController@join');
Route::resource('championship', 'ChampionshipController');

Route::resource('country', 'CountryController');
Route::resource('league', 'LeagueController');
Route::resource('team', 'TeamController');
Route::resource('fixture', 'FixtureController');
Route::resource('bookmaker', 'BookmakerController');
Route::resource('bet-category', 'BetCategoryController');
Route::resource('odd', 'OddController');
