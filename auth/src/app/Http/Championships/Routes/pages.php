<?php
use Illuminate\Support\Facades\Route;

Route::prefix('championship')->group(function(){
    Route::get('/', 'Championship\\ChampionShipPageController@page');
    Route::get('new', 'Championship\\ChampionShipPageController@new');
    Route::get('edit/{championship}', 'Championship\\ChampionShipPageController@edit');
});

Route::prefix('country')->group(function(){
    Route::get('/', 'Country\\CountryPageController@page');
    Route::get('new', 'Country\\CountryPageController@new');
    Route::get('edit/{country}', 'Country\\CountryPageController@edit');
});

Route::prefix('league')->group(function(){
    Route::get('/', 'League\\LeaguePageController@page');
    Route::get('new', 'League\\LeaguePageController@new');
    Route::get('edit/{league}', 'League\\LeaguePageController@edit');
});

Route::prefix('team')->group(function(){
    Route::get('/', 'Team\\TeamPageController@page');
    Route::get('new', 'Team\\TeamPageController@new');
    Route::get('edit/{team}', 'Team\\TeamPageController@edit');
});

Route::prefix('fixture')->group(function(){
    Route::get('/', 'Fixture\\FixturePageController@page');
    Route::get('new', 'Fixture\\FixturePageController@new');
    Route::get('edit/{fixture}', 'Fixture\\FixturePageController@edit');
});

Route::prefix('bookmaker')->group(function(){
    Route::get('/', 'Bookmaker\\BookmakerPageController@page');
    Route::get('new', 'Bookmaker\\BookmakerPageController@new');
    Route::get('edit/{bookmaker}', 'Bookmaker\\BookmakerPageController@edit');
});

Route::prefix('bet-category')->group(function(){
    Route::get('/', 'BetCategory\\BetCategoryPageController@page');
    Route::get('new', 'BetCategory\\BetCategoryPageController@new');
    Route::get('edit/{bet_category}', 'BetCategory\\BetCategoryPageController@edit');
});

Route::prefix('odd')->group(function(){
    Route::get('/', 'Odd\\OddPageController@page');
    Route::get('new', 'Odd\\OddPageController@new');
    Route::get('edit/{odd}', 'Odd\\OddPageController@edit');
});
