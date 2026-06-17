@extends('layouts.app')

@section('title', 'Equipos')

@section('content')
    <div class="page-header">
        <h1><i class="bi bi-pc-display me-2 text-primary"></i>Equipos</h1>
        <a href="{{ route('equipos.create') }}" class="btn btn-primary rounded-pill px-4">
            <i class="bi bi-plus-lg me-1"></i> Nuevo Equipo
        </a>
    </div>

    <div class="card mb-4">
        <div class="card-body py-3">
            <form method="GET" action="{{ route('equipos.index') }}">
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0">
                        <i class="bi bi-search text-muted"></i>
                    </span>
                    <input type="text" name="buscar" class="form-control border-start-0 ps-0"
                        placeholder="Buscar por código, nombre, categoría o marca..."
                        value="{{ request('buscar') }}">
                    <button class="btn btn-primary px-4" type="submit">Buscar</button>
                    @if(request('buscar'))
                        <a href="{{ route('equipos.index') }}" class="btn btn-outline-secondary">Limpiar</a>
                    @endif
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-body p-0">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>Categoría</th>
                        <th>Marca</th>
                        <th>Estado</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($equipos as $equipo)
                        <tr>
                            <td><span class="fw-500 font-monospace">{{ $equipo->codigo }}</span></td>
                            <td class="fw-500">{{ $equipo->nombre }}</td>
                            <td>{{ $equipo->categoria }}</td>
                            <td>{{ $equipo->marca }}</td>
                            <td>
                                @if ($equipo->estado === 'Disponible')
                                    <span class="badge rounded-pill bg-success">
                                        <i class="bi bi-check-circle me-1"></i>Disponible
                                    </span>
                                @elseif ($equipo->estado === 'Prestado')
                                    <span class="badge rounded-pill bg-warning text-dark">
                                        <i class="bi bi-arrow-left-right me-1"></i>Prestado
                                    </span>
                                @else
                                    <span class="badge rounded-pill bg-secondary">
                                        <i class="bi bi-tools me-1"></i>Mantenimiento
                                    </span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-action-group justify-content-center">
                                    <a href="{{ route('equipos.edit', $equipo) }}"
                                       class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-pencil me-1"></i>Editar
                                    </a>
                                    <form action="{{ route('equipos.destroy', $equipo) }}" method="POST"
                                          onsubmit="return confirm('¿Eliminar este equipo?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            <i class="bi bi-trash me-1"></i>Eliminar
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">
                                <i class="bi bi-inbox me-2"></i>No hay equipos registrados.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($equipos->hasPages())
            <div class="card-footer bg-white border-0 py-3 px-4">
                {{ $equipos->links() }}
            </div>
        @endif
    </div>
@endsection