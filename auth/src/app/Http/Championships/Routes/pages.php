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
