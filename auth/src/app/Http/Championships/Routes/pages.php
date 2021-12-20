<?php
use Illuminate\Support\Facades\Route;

Route::prefix('championship')->group(function(){
    Route::get('/', 'Championship\\ChampionShipPageController@page');
    Route::get('new', 'Championship\\ChampionShipPageController@new');
    Route::get('edit/{championship}', 'Championship\\ChampionShipPageController@edit');
});
