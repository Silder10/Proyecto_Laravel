<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\SolicitanteController;
use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('dashboard');
});

Route::resource('equipos', EquipoController::class);
Route::resource('solicitantes', SolicitanteController::class);
Route::resource('prestamos', PrestamoController::class);
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');