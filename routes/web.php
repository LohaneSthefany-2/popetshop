<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;

// Quando acessar "/", vai para o dashboard
Route::get('/', function () {
    return redirect('/dashboard');
});

// Rotas protegidas
Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Pets
    Route::get('/pets', [PetController::class, 'index']);
    Route::get('/pets/criar', [PetController::class, 'create']);
    Route::post('/pets', [PetController::class, 'store']);
    Route::get('/pets/{id}/editar', [PetController::class, 'edit']);
    Route::put('/pets/{id}', [PetController::class, 'update']);
    Route::delete('/pets/{id}', [PetController::class, 'destroy']);

    // Consultas
    Route::get('/consultas', [ConsultaController::class, 'index']);
    Route::get('/consultas/criar', [ConsultaController::class, 'create']);
    Route::post('/consultas', [ConsultaController::class, 'store']);
    Route::get('/consultas/{id}/editar', [ConsultaController::class, 'edit']);
    Route::put('/consultas/{id}', [ConsultaController::class, 'update']);
    Route::delete('/consultas/{id}', [ConsultaController::class, 'destroy']);

    // Clientes
    Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');
    Route::get('/clientes/criar', [ClienteController::class, 'create'])->name('clientes.create');
    Route::post('/clientes', [ClienteController::class, 'store'])->name('clientes.store');
    Route::get('/clientes/{cliente}/editar', [ClienteController::class, 'edit'])->name('clientes.edit');
    Route::put('/clientes/{cliente}', [ClienteController::class, 'update'])->name('clientes.update');
    Route::delete('/clientes/{cliente}', [ClienteController::class, 'destroy'])->name('clientes.destroy');

    // Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

// Rotas de login, registro, logout do Breeze
require __DIR__.'/auth.php';