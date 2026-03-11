<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FarmerController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// Farmer CRUD Routes (Public)
Route::get('/farmers', [FarmerController::class, 'index']);
Route::post('/farmers', [FarmerController::class, 'store']);
Route::get('/farmers/{farmer}', [FarmerController::class, 'show']);
Route::put('/farmers/{farmer}', [FarmerController::class, 'update']);
Route::delete('/farmers/{farmer}', [FarmerController::class, 'destroy']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/program', [App\Http\Controllers\LogController::class, 'index']);
});

