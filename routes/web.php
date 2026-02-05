<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


//Inici
Route::get('/', function () {
    return view('inicio');
})->name('inicio');


//Autenticació
Route::get('/login', [LoginController::class, 'loginForm'])->name('login')->middleware(['guest']);
Route::post('/login', [LoginController::class, 'login'])->middleware(['guest']);
Route::get('/logout',[LoginController::class, 'logout'])->name('logout')->middleware(['auth']);


//Posts
Route::get('/posts/nuevoPrueba', [PostController::class, 'nuevoPrueba']);
Route::get('/posts/editPrueba/{id}', [PostController::class, 'editPrueba']);
Route::resource('posts', PostController::class);
