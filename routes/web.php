<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\SolicitanteController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('equipos', EquipoController::class);
Route::resource('solicitantes', SolicitanteController::class);