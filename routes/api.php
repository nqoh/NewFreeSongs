<?php

use App\Http\Controllers\API\v1\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;


// public routes for authentication
Route::prefix('v1/auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class,'login']);
   
});

// private routes for authenticated users
Route::group(['prefix' => 'v1' , 'middleware' => 'auth:sanctum'], function () {
    Route::apiResource('tasks', TaskController::class);
    Route::post('/logout', [AuthController::class, 'logout']);
});


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
