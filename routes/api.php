<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthController,
    TaskController
};

Route::prefix('v1')->group(function () {
    // Auth
    Route::prefix('auth')->group(function () {
        Route::post('register', [AuthController::class, 'register']);
        Route::post('login', [AuthController::class, 'login']);
        Route::post('logout', [AuthController::class, 'logout']);
        Route::post('refresh', [AuthController::class, 'refresh']);
        Route::get('profile', [AuthController::class, 'profile'])->middleware('auth:api');
    });
    
    // Task
    Route::middleware('auth:api')->group(function () {
        Route::get('tasks', [TaskController::class, 'index']);
        Route::post('task', [TaskController::class, 'store']);
        Route::post('task/{id}', [TaskController::class, 'update']);
        Route::delete('task/{id}', [TaskController::class, 'destroy']);
    });
});
