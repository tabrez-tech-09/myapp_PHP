<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/hello', function () {
    return response()->json([
        'message' => 'Hello Tabrez',
    ]);
});

Route::get('/users', [UserController::class, 'index']);

Route::post('/users', [UserController::class, 'store']);

Route::get('/users/{id}', [UserController::class, 'show']);

Route::put('/users/{id}', [UserController::class, 'update']);

Route::delete('/users/{id}', [UserController::class, 'destroy']);


// Login API
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout']);
Route::put('/update-password', [UserController::class, 'updatePassword']);
Route::get('/generate-qr-code', [UserController::class, 'generate']);
Route::post('/payment/verify', [UserController::class, 'verifyPayment']);


