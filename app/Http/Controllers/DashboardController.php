<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Prestamo;
use App\Models\Solicitante;

class DashboardController extends Controller
{
    public function index()
    {
        $totalDisponibles = Equipo::where('estado', 'Disponible')->count();
        $totalPrestados = Equipo::where('estado', 'Prestado')->count();
        $totalMantenimiento = Equipo::where('estado', 'Mantenimiento')->count();
        $totalPrestamos = Prestamo::count();
        $totalSolicitantes = Solicitante::count();
        $prestamosPendientes = Prestamo::whereNull('fecha_devolucion_real')->count();
        $prestamosRecientes = Prestamo::with(['equipo', 'solicitante'])
            ->orderBy('id', 'desc')
            ->limit(5)
            ->get();

        return view('dashboard', compact(
            'totalDisponibles',
            'totalPrestados',
            'totalMantenimiento',
            'totalPrestamos',
            'totalSolicitantes',
            'prestamosPendientes',
            'prestamosRecientes'
        ));
    }
}