<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Prestamo;
use Barryvdh\DomPDF\Facade\Pdf;

class ReporteController extends Controller
{
    public function equipos()
    {
        $equipos = Equipo::orderBy('nombre', 'asc')->get();
        $pdf = Pdf::loadView('reportes.equipos', compact('equipos'));
        return $pdf->download('reporte-equipos.pdf');
    }

    public function prestamos()
    {
        $prestamos = Prestamo::with(['equipo', 'solicitante'])
            ->orderBy('id', 'desc')
            ->get();
        $pdf = Pdf::loadView('reportes.prestamos', compact('prestamos'));
        return $pdf->download('reporte-prestamos.pdf');
    }
}