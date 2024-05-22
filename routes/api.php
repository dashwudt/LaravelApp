<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VacationSpotController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishListController;

// Admin routes group
Route::middleware(['auth:api', 'can:admin'])->group(function () {
    // Vacation Spots
    Route::get('/vacation-spots', [VacationSpotController::class, 'index']);
    Route::post('/vacation-spots', [VacationSpotController::class, 'store']);

    // Users
    Route::get('/users', [UserController::class, 'index']);
    Route::post('/users', [UserController::class, 'store']);
    Route::get('/users/{user}', [UserController::class, 'show']);

    // Wish Lists
    Route::post('/users/{user}/wish-lists', [WishListController::class, 'store']);
    Route::get('/users/{user}/wish-lists', [WishListController::class, 'show']);

});
