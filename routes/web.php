<?php

use App\Http\Controllers\FilmController;
use App\Http\Controllers\GenreController;
use Illuminate\Support\Facades\Route;

Route::prefix('films')->group(function () {
    Route::get('/index', [FilmController::class, 'index']);
    Route::post('/store', [FilmController::class, 'store']);
    Route::get('/show/{id}', [FilmController::class, 'show']);
    Route::put('/update/{id}', [FilmController::class, 'update']);
    Route::patch('/{id}/publish', [FilmController::class, 'publish']);
    Route::delete('/destroy/{id}', [FilmController::class, 'destroy']);
});


Route::prefix('genres')->group(function () {
    Route::get('/index', [GenreController::class, 'index']);
    Route::post('/store', [GenreController::class, 'store']);
    Route::get('/show/{id}', [GenreController::class, 'show']);
    Route::put('/update/{id}', [GenreController::class, 'update']);
    Route::delete('/destroy/{id}', [GenreController::class, 'destroy']);
});
