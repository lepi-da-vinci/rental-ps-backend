<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\GameController;

Route::get('/health', function () {
    return response()->json(['status' => 'online', 'timestamp' => now()]);
});

Route::post('/login', [AuthController::class, 'login']);

Route::get('/units', [UnitController::class, 'index']);
Route::get('/units/status', [UnitController::class, 'status']);

Route::get('/bookings', [BookingController::class, 'index']);
Route::post('/bookings', [BookingController::class, 'store']);
Route::post('/bookings/walk-in', [BookingController::class, 'storeWalkIn']);
Route::delete('/bookings/{id}', [BookingController::class, 'destroy']);

Route::get('/games', [GameController::class, 'index']);
