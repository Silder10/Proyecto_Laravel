@extends('layouts.app')

@section('title', 'Equipos')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Equipos</h1>
        <a href="{{ route('equipos.create') }}" class="btn btn-primary">Nuevo Equipo</a>
    </div>

    <form method="GET" action="{{ route('equipos.index') }}" class="mb-3">
        <div class="input-group">
            <input type="text" name="buscar" class="form-control" placeholder="Buscar por código, nombre, categoría o marca" value="{{ request('buscar') }}">
            <button class="btn btn-outline-secondary" type="submit">Buscar</button>
        </div>
    </form>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Categoría</th>
                <th>Marca</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($equipos as $equipo)
                <tr>
                    <td>{{ $equipo->codigo }}</td>
                    <td>{{ $equipo->nombre }}</td>
                    <td>{{ $equipo->categoria }}</td>
                    <td>{{ $equipo->marca }}</td>
                    <td>
                        <span class="badge bg-{{ $equipo->estado === 'Disponible' ? 'success' : ($equipo->estado === 'Prestado' ? 'warning' : 'secondary') }}">
                            {{ $equipo->estado }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('equipos.edit', $equipo) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('equipos.destroy', $equipo) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de eliminar este equipo?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No hay equipos registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $equipos->links() }}
@endsection