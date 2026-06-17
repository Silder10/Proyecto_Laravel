@extends('layouts.app')

@section('title', 'Solicitantes')

@section('content')
    <div class="page-header">
        <h1><i class="bi bi-people me-2 text-primary"></i>Solicitantes</h1>
        <a href="{{ route('solicitantes.create') }}" class="btn btn-primary rounded-pill px-4">
            <i class="bi bi-plus-lg me-1"></i> Nuevo Solicitante
        </a>
    </div>

    <div class="card mb-4">
        <div class="card-body py-3">
            <form method="GET" action="{{ route('solicitantes.index') }}">
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0">
                        <i class="bi bi-search text-muted"></i>
                    </span>
                    <input type="text" name="buscar" class="form-control border-start-0 ps-0"
                        placeholder="Buscar por nombre, documento o correo..."
                        value="{{ request('buscar') }}">
                    <button class="btn btn-primary px-4" type="submit">Buscar</button>
                    @if(request('buscar'))
                        <a href="{{ route('solicitantes.index') }}" class="btn btn-outline-secondary">Limpiar</a>
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
                        <th>Nombre</th>
                        <th>Documento</th>
                        <th>Correo</th>
                        <th>Tipo</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($solicitantes as $solicitante)
                        <tr>
                            <td class="fw-500">{{ $solicitante->nombre }}</td>
                            <td class="font-monospace">{{ $solicitante->documento }}</td>
                            <td>{{ $solicitante->correo }}</td>
                            <td>
                                @if ($solicitante->tipo === 'Docente')
                                    <span class="badge rounded-pill bg-primary">
                                        <i class="bi bi-person-badge me-1"></i>Docente
                                    </span>
                                @else
                                    <span class="badge rounded-pill bg-info text-dark">
                                        <i class="bi bi-mortarboard me-1"></i>Estudiante
                                    </span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-action-group justify-content-center">
                                    <a href="{{ route('solicitantes.edit', $solicitante) }}"
                                       class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-pencil me-1"></i>Editar
                                    </a>
                                    <form action="{{ route('solicitantes.destroy', $solicitante) }}" method="POST"
                                          onsubmit="return confirm('¿Eliminar este solicitante?');">
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
                            <td colspan="5" class="text-center text-muted py-4">
                                <i class="bi bi-inbox me-2"></i>No hay solicitantes registrados.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($solicitantes->hasPages())
            <div class="card-footer bg-white border-0 py-3 px-4">
                {{ $solicitantes->links() }}
            </div>
        @endif
    </div>
@endsection