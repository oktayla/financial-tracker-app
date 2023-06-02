<?php

use App\Http\Controllers\TransactionCategoryController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('transactions', TransactionController::class);
    Route::get('filter-transactions', [TransactionController::class, 'filterByDate']);
    Route::get('transaction-categories', [TransactionCategoryController::class, 'index']);

    Route::get('/me', [AuthController::class, 'user']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
