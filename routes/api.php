<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\GenreController;

// Menggunakan apiResource mencakup 5 route sekaligus: index, store, show, update, destroy
Route::apiResource('authors', AuthorController::class);
Route::apiResource('genres', GenreController::class);