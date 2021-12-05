<?php

use Illuminate\Support\Facades\Route;

Route::post('login', 'AuthController@login');
Route::post('logout', 'AuthController@logout');
Route::post('refresh', 'AuthController@refresh');
Route::resource('user', 'UserController');

Route::middleware('auth')->group(function () {
    Route::get('menu/tree', 'MenuController@tree');
    Route::resource('menu', 'MenuController');

    Route::resource('language', 'LanguageController');
    Route::resource('table', 'TableController');
    Route::resource('policy', 'PolicyController');
    Route::resource('role', 'RoleController');
});
