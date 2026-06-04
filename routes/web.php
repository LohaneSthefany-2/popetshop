<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/', [LoginController::class, 'index']);

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'autenticar']);

Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/painel', function () {
    return view('painel');
});