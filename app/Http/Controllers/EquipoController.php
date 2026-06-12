<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use Illuminate\Http\Request;

class EquipoController extends Controller
{
    public function index(Request $request)
    {
        $query = Equipo::query();

        if ($request->filled('buscar')) {
            $buscar = $request->buscar;
            $query->where(function ($q) use ($buscar) {
                $q->where('codigo', 'like', "%{$buscar}%")
                  ->orWhere('nombre', 'like', "%{$buscar}%")
                  ->orWhere('categoria', 'like', "%{$buscar}%")
                  ->orWhere('marca', 'like', "%{$buscar}%");
            });
        }

        $equipos = $query->orderBy('id', 'desc')->paginate(10)->withQueryString();

        return view('equipos.index', compact('equipos'));
    }

    public function create()
    {
        return view('equipos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'codigo' => 'required|string|max:50|unique:equipos,codigo',
            'nombre' => 'required|string|max:255',
            'categoria' => 'required|string|max:100',
            'marca' => 'required|string|max:100',
            'estado' => 'required|in:Disponible,Prestado,Mantenimiento',
        ]);

        Equipo::create($validated);

        return redirect()->route('equipos.index')->with('success', 'Equipo creado correctamente.');
    }

    public function edit(Equipo $equipo)
    {
        return view('equipos.edit', compact('equipo'));
    }

    public function update(Request $request, Equipo $equipo)
    {
        $validated = $request->validate([
            'codigo' => 'required|string|max:50|unique:equipos,codigo,' . $equipo->id,
            'nombre' => 'required|string|max:255',
            'categoria' => 'required|string|max:100',
            'marca' => 'required|string|max:100',
            'estado' => 'required|in:Disponible,Prestado,Mantenimiento',
        ]);

        $equipo->update($validated);

        return redirect()->route('equipos.index')->with('success', 'Equipo actualizado correctamente.');
    }

    public function destroy(Equipo $equipo)
    {
        Equipo::destroy($equipo->id);

        return redirect()->route('equipos.index')->with('success', 'Equipo eliminado correctamente.');
    }
}