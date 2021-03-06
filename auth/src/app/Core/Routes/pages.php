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


Route::prefix('role')->group(function(){
    Route::get('/', 'Role\\RolePageController@page');
    Route::get('/new', 'Role\\RolePageController@new');
    Route::get('/edit/{role}', 'Role\\RolePageController@edit');
});

Route::prefix('policy')->group(function(){
    Route::get('/', 'Policy\\PolicyPageController@page');
    Route::get('/new', 'Policy\\PolicyPageController@new');
    Route::get('/edit/{policy}', 'Policy\\PolicyPageController@edit');
});

Route::prefix('permission')->group(function(){
    Route::get('/', 'Permission\\PermissionPageController@page');
    Route::get('/new', 'Permission\\PermissionPageController@new');
    Route::get('/edit/{permission}', 'Permission\\PermissionPageController@edit');
});

Route::prefix('profile')->group(function(){
    Route::get('/', 'Profile\\ProfilePageController@page');
});
