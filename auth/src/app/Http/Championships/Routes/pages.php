<?php
use Illuminate\Support\Facades\Route;

Route::prefix('championship')->group(function(){
    Route::get('/', 'Championship\\ChampionShipPageController@page');
    Route::get('new', 'Championship\\ChampionShipPageController@new');
    Route::get('/{championship}/wizard/league', 'Championship\\ChampionShipPageController@leagueSelect');
    Route::get('{championship}/fixture/{fixture}', 'Championship\\ChampionShipPageController@fixture');

    Route::get('{championship}/bet-confirm', 'BetSlip\\BetSlipPageController@betConfirm');


    Route::get('edit/{championship}', 'Championship\\ChampionShipPageController@edit');
    Route::get('join/{championship}', 'Championship\\ChampionShipPageController@join');
    Route::get('play/{championship}', 'Championship\\ChampionShipPageController@play');

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

Route::prefix('season')->group(function(){
    Route::get('/', 'Season\\SeasonPageController@page');
    Route::get('new', 'Season\\SeasonPageController@new');
    Route::get('edit/{season}', 'Season\\SeasonPageController@edit');
});

Route::prefix('member')->group(function(){
    Route::get('/', 'Member\\MemberPageController@page');
    Route::get('new', 'Member\\MemberPageController@new');
    Route::get('edit/{member}', 'Member\\MemberPageController@edit');
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

Route::prefix('fixture-status')->group(function(){
    Route::get('/', 'FixtureStatus\\FixtureStatusPageController@page');
    Route::get('new', 'FixtureStatus\\FixtureStatusPageController@new');
    Route::get('edit/{fixture_status}', 'FixtureStatus\\FixtureStatusPageController@edit');
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


Route::prefix('bet')->group(function(){
    Route::get('/', 'Bet\\BetPageController@page');
    Route::get('new', 'Bet\\BetPageController@new');
    Route::get('edit/{bet}', 'Bet\\BetPageController@edit');
});
