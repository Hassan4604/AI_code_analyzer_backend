<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CodeAnalysesController;

Route::post('/register', [AuthController::class, 'register'])
    ->name('register');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login');

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth:sanctum')
    ->name('logout');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function(){
    Route::post('analysis' , [CodeAnalysesController::class, 'show'])
        ->name('analysis');
});

