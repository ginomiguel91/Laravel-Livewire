<?php

use Illuminate\Support\Facades\Route;

// PUBLIC ROUTES

// API MODELO USER
Route::apiResource('users', \App\Http\Controllers\Api\UserController::class)
    ->only(['index']);

// API MODELO ROLE
Route::apiResource('roles', \App\Http\Controllers\Api\RoleController::class)
    ->only(['index']);
