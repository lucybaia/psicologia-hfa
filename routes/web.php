<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\ProfissionalController;
use App\Http\Controllers\DashboardController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('pacientes', PacienteController::class);
Route::resource('consultas', ConsultaController::class);
Route::resource('profissionais', ProfissionalController::class);
