<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\GenreController;

// Route Read (GET)
Route::get('/authors', [AuthorController::class, 'index']);
Route::get('/genres', [GenreController::class, 'index']);

// Route Create (POST)
Route::post('/authors', [AuthorController::class, 'store']);
Route::post('/genres', [GenreController::class, 'store']);