<?php

use Illuminate\Support\Facades\Route;

Route::namespace('Api')->group(function () {
    Route::post('login', 'AuthController@login');
});

Route::namespace('Api')
    ->middleware('auth:sanctum')
    ->group(function () {
        Route::get('fruits', 'FruitController@getFruits');
    });
