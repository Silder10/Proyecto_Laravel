<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Prestamo;
use App\Models\Solicitante;
use Illuminate\Http\Request;

class PrestamoController extends Controller
{
    public function index(Request $request)
    {
        $query = Prestamo::with(['equipo', 'solicitante']);

        if ($request->filled('buscar')) {
            $buscar = $request->buscar;
            $query->whereHas('equipo', function ($q) use ($buscar) {
                $q->where('nombre', 'like', "%{$buscar}%")
                  ->orWhere('codigo', 'like', "%{$buscar}%");
            })->orWhereHas('solicitante', function ($q) use ($buscar) {
                $q->where('nombre', 'like', "%{$buscar}%")
                  ->orWhere('documento', 'like', "%{$buscar}%");
            });
        }

        $prestamos = $query->orderBy('id', 'desc')->paginate(10)->withQueryString();

        return view('prestamos.index', compact('prestamos'));
    }

    public function create()
    {
        $equipos = Equipo::where('estado', 'Disponible')->get();
        $solicitantes = Solicitante::orderBy('nombre')->get();

        return view('prestamos.create', compact('equipos', 'solicitantes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'equipo_id' => 'required|exists:equipos,id',
            'solicitante_id' => 'required|exists:solicitantes,id',
            'fecha_prestamo' => 'required|date',
            'fecha_devolucion_esperada' => 'required|date|after_or_equal:fecha_prestamo',
        ]);

        // Cambiar estado del equipo a Prestado
        $equipo = Equipo::findOrFail($validated['equipo_id']);
        $equipo->update(['estado' => 'Prestado']);

        Prestamo::create($validated);

        return redirect()->route('prestamos.index')->with('success', 'Préstamo registrado correctamente.');
    }

    public function show(Prestamo $prestamo)
    {
        return view('prestamos.show', compact('prestamo'));
    }

    public function edit(Prestamo $prestamo)
    {
        // Solo se edita para registrar devolución
        return view('prestamos.edit', compact('prestamo'));
    }

    public function update(Request $request, Prestamo $prestamo)
    {
        $validated = $request->validate([
            'fecha_devolucion_real' => 'required|date|after_or_equal:' . $prestamo->fecha_prestamo->format('Y-m-d'),
        ]);

        $prestamo->update($validated);

        // Cambiar estado del equipo a Disponible
        $prestamo->equipo->update(['estado' => 'Disponible']);

        return redirect()->route('prestamos.index')->with('success', 'Devolución registrada correctamente.');
    }

    public function destroy(Prestamo $prestamo)
    {
        // Si el préstamo no tiene devolución, liberar el equipo
        if (is_null($prestamo->fecha_devolucion_real)) {
            $prestamo->equipo->update(['estado' => 'Disponible']);
        }

        $prestamo->delete();

        return redirect()->route('prestamos.index')->with('success', 'Préstamo eliminado correctamente.');
    }
}