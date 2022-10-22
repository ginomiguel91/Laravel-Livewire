<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

//PROTECTED ROUTES
Route::middleware('auth:sanctum')->group(function () {

    // API MODELO USER
    Route::apiResource('users', \App\Http\Controllers\Api\UserController::class)
        ->except(['index']);

    // API MODELO ROLE
    Route::apiResource('roles', \App\Http\Controllers\Api\RoleController::class)
        ->except(['index']);

    Route::controller(\App\Http\Controllers\AuthController::class)->group(function () {

        Route::post('logout', 'logout');

        Route::get('me', 'me');
    });
});

Route::controller(\App\Http\Controllers\AuthController::class)->group(function () {

    Route::post('login', 'login');

    Route::post('register', 'register');
});
