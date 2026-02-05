<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\PeliculaController;
use App\Http\Controllers\Api\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('/posts', PostController::class);
Route::apiResource('/peliculas', PeliculaController::class);
Route::post('/login', [LoginController::class, 'login'])->name('login');