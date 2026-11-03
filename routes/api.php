<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransactionController;

// 1. Public Routes (Auth)
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

// 2. Protected Routes (Harus Login / Punya Token Sanctum)
Route::middleware('auth:sanctum')->group(function () {
    
    // Logout
    Route::post('/logout', [AuthController::class, 'logout']);

    // --- FITUR TRANSAKSI ---

    // Akses Customer (Create, Update, Show)
    Route::post('/transactions', [TransactionController::class, 'store']);
    Route::put('/transactions/{id}', [TransactionController::class, 'update']);
    Route::get('/transactions/{id}', [TransactionController::class, 'show']);

    // Akses Admin (Read All & Destroy)
    Route::middleware('can:admin')->group(function () { 
        // Catatan: Jika menggunakan Gate/Middleware 'can:admin' atau 'role:admin'
        Route::get('/transactions', [TransactionController::class, 'index']);
        Route::delete('/transactions/{id}', [TransactionController::class, 'destroy']);
    });
});