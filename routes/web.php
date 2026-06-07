<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\ConsultaController;

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'autenticar']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/', function () {
    return redirect('/login');
});

Route::middleware('auth')->group(function () {
    Route::get('/painel', function () {
        return view('painel');
    });

    Route::get('/pets', [PetController::class, 'index']);
    Route::get('/pets/criar', [PetController::class, 'create']);
    Route::post('/pets', [PetController::class, 'store']);
    Route::get('/pets/{id}/editar', [PetController::class, 'edit']);
    Route::put('/pets/{id}', [PetController::class, 'update']);
    Route::delete('/pets/{id}', [PetController::class, 'destroy']);

    Route::get('/consultas', [ConsultaController::class, 'index']);
    Route::get('/consultas/criar', [ConsultaController::class, 'create']);
    Route::post('/consultas', [ConsultaController::class, 'store']);
    Route::get('/consultas/{id}/editar', [ConsultaController::class, 'edit']);
    Route::put('/consultas/{id}', [ConsultaController::class, 'update']);
    Route::delete('/consultas/{id}', [ConsultaController::class, 'destroy']);
});