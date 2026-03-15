<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\ProfissionalController;

Route::resource('pacientes', PacienteController::class);
Route::resource('consultas', ConsultaController::class);
Route::resource('profissionais', ProfissionalController::class);
Route::get('/', function () {
    return redirect()->route('pacientes.index');
});
