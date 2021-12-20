<?php

use Illuminate\Support\Facades\Route;

Route::prefix('user')->group(function(){
    Route::get('/', 'User\\UserPageController@page');
    Route::get('/new', 'User\\UserPageController@new');
    Route::get('/edit/{user}', 'User\\UserPageController@edit');

    Route::get('/modal', 'User\\UserPageController@modal');
});


Route::prefix('fixture')->group(function(){
    Route::get('/', 'User\\FixturePageController@page');
});
