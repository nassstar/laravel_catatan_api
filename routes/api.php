<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CatatanController;

// USER
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::post('/users', [UserController::class, 'store']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);

// CATATAN
Route::get('/catatan', [CatatanController::class, 'index']);
Route::get('/catatan/{id}', [CatatanController::class, 'show']);
Route::post('/catatan', [CatatanController::class, 'store']);
Route::put('/catatan/{id}', [CatatanController::class, 'update']);
Route::delete('/catatan/{id}', [CatatanController::class, 'destroy']);
