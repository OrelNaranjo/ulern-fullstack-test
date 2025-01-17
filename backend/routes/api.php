<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;

define('AUTH_SANCTUM', 'auth:sanctum');

Route::post('register', [RegisteredUserController::class, 'store']);
Route::post('login', [AuthenticatedSessionController::class, 'store']);
Route::put('profile', [ProfileController::class, 'update'])->middleware(AUTH_SANCTUM);
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->middleware(AUTH_SANCTUM);

Route::middleware(AUTH_SANCTUM)->get('profile', [ProfileController::class, 'show']);
