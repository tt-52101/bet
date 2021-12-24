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

