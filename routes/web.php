<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SolicitanteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReporteController;

Route::middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('equipos', EquipoController::class);
    Route::resource('solicitantes', SolicitanteController::class);
    Route::resource('prestamos', PrestamoController::class);
    Route::get('/reportes/equipos', [ReporteController::class, 'equipos'])->name('reportes.equipos');
    Route::get('/reportes/prestamos', [ReporteController::class, 'prestamos'])->name('reportes.prestamos');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';