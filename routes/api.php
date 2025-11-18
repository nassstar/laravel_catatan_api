<?php
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\CatatanController;
use Illuminate\Support\Facades\Route;

Route::apiResource('users', UserController::class);
Route::apiResource('catatan', CatatanController::class);
