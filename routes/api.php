<?php

use App\Http\Controllers\API\v1\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('tasks', TaskController::class);
});

Route::prefix('v1/auth')->group(function () {
    Route::post('/register', [\App\Http\Controllers\Auth\AuthController::class, 'register']);
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
