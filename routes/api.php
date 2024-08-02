<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthController,
    TaskController,
    CategoryController
};

Route::prefix('v1')->group(function () {
    // Auth
    Route::prefix('auth')->middleware('throttle:auth')->group(function () {
        Route::post('register', [AuthController::class, 'register']);
        Route::post('login', [AuthController::class, 'login']);
        Route::post('logout', [AuthController::class, 'logout']);
        Route::post('refresh', [AuthController::class, 'refresh']);
        Route::get('profile', [AuthController::class, 'profile'])->middleware('auth:api');
        Route::post('profile', [AuthController::class, 'updateProfile'])->middleware('auth:api');
    });
    
    Route::middleware('auth:api')->group(function () {
        // Task
        Route::get('tasks', [TaskController::class, 'index']);
        Route::post('task', [TaskController::class, 'store']);
        Route::post('task/{id}', [TaskController::class, 'update']);
        Route::delete('task/{id}', [TaskController::class, 'destroy']);
    
        // Category
        Route::get('categories', [CategoryController::class, 'index']);
        Route::post('category', [CategoryController::class, 'store']);
        Route::post('category/{id}', [CategoryController::class, 'update']);
        Route::delete('category/{id}', [CategoryController::class, 'destroy']);
    });
});
