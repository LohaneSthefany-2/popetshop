<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;

// 1. Quando o usuário acessa o site, vai direto pro painel
Route::get('/', function () {
    return redirect('/dashboard');
});

// 2. rotas protegidas (Dashboard, Pets e Consultas)
Route::middleware('auth')->group(function () {
    
    // dashboard
    Route::get('/dashboard', function () {
        return view('dashboard'); 
    })->name('dashboard');

    // rotas de Pets
    Route::get('/pets', [PetController::class, 'index']);
    Route::get('/pets/criar', [PetController::class, 'create']);
    Route::post('/pets', [PetController::class, 'store']);
    Route::get('/pets/{id}/editar', [PetController::class, 'edit']);
    Route::put('/pets/{id}', [PetController::class, 'update']);
    Route::delete('/pets/{id}', [PetController::class, 'destroy']);

    // rotas de Consultas
    Route::get('/consultas', [ConsultaController::class, 'index']);
    Route::get('/consultas/criar', [ConsultaController::class, 'create']);
    Route::post('/consultas', [ConsultaController::class, 'store']);
    Route::get('/consultas/{id}/editar', [ConsultaController::class, 'edit']);
    Route::put('/consultas/{id}', [ConsultaController::class, 'update']);
    Route::delete('/consultas/{id}', [ConsultaController::class, 'destroy']);

    // Rotas de Perfil que o Breeze exige
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

     // Rotas de clientes
    Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');
    Route::get('/clientes/criar', [ClienteController::class, 'create'])->name('clientes.create');
    Route::post('/clientes', [ClienteController::class, 'store'])->name('clientes.store');
    Route::get('/clientes/{cliente}/editar', [ClienteController::class, 'edit'])->name('clientes.edit');
    Route::put('/clientes/{cliente}', [ClienteController::class, 'update'])->name('clientes.update');
    Route::delete('/clientes/{cliente}', [ClienteController::class, 'destroy'])->name('clientes.destroy');

// 3. Carrega as rotas automáticas de Login/Senha/Logout do Breeze
require __DIR__.'/auth.php';