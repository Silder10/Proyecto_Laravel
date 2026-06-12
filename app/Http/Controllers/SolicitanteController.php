<?php

namespace App\Http\Controllers;

use App\Models\Solicitante;
use Illuminate\Http\Request;

class SolicitanteController extends Controller
{
    public function index(Request $request)
    {
        $query = Solicitante::query();

        if ($request->filled('buscar')) {
            $buscar = $request->buscar;
            $query->where(function ($q) use ($buscar) {
                $q->where('nombre', 'like', "%{$buscar}%")
                  ->orWhere('documento', 'like', "%{$buscar}%")
                  ->orWhere('correo', 'like', "%{$buscar}%");
            });
        }

        $solicitantes = $query->orderBy('id', 'desc')->paginate(10)->withQueryString();

        return view('solicitantes.index', compact('solicitantes'));
    }

    public function create()
    {
        return view('solicitantes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'documento' => 'required|string|max:50|unique:solicitantes,documento',
            'correo' => 'required|email|max:255|unique:solicitantes,correo',
            'tipo' => 'required|in:Estudiante,Docente',
        ]);

        Solicitante::create($validated);

        return redirect()->route('solicitantes.index')->with('success', 'Solicitante creado correctamente.');
    }

    public function edit(Solicitante $solicitante)
    {
        return view('solicitantes.edit', compact('solicitante'));
    }

    public function update(Request $request, Solicitante $solicitante)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'documento' => 'required|string|max:50|unique:solicitantes,documento,' . $solicitante->id,
            'correo' => 'required|email|max:255|unique:solicitantes,correo,' . $solicitante->id,
            'tipo' => 'required|in:Estudiante,Docente',
        ]);

        $solicitante->update($validated);

        return redirect()->route('solicitantes.index')->with('success', 'Solicitante actualizado correctamente.');
    }

    public function destroy(Solicitante $solicitante)
    {
        $solicitante->delete($solicitante->id);

        return redirect()->route('solicitantes.index')->with('success', 'Solicitante eliminado correctamente.');
    }
}