<?php

use Illuminate\Support\Facades\Route;

Route::prefix('user')->group(function(){
    Route::get('/', 'User\\UserPageController@page');
    Route::get('/new', 'User\\UserPageController@new');
    Route::get('/edit/{user}', 'User\\UserPageController@edit');

    Route::get('/modal', 'User\\UserPageController@modal');
});

Route::prefix('table')->group(function(){
    Route::get('/', 'Table\\TablePageController@page');
    Route::get('/new', 'Table\\TablePageController@new');
    Route::get('/edit/{table}', 'Table\\TablePageController@edit');
});


Route::prefix('profile')->group(function(){
    Route::get('/', 'Profile\\ProfilePageController@page');
});

Route::prefix('fixture')->group(function(){
    Route::get('/', 'User\\FixturePageController@page');
});
