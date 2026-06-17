@extends('layouts.app')

@section('title', 'Préstamos')

@section('content')
    <div class="page-header">
        <h1><i class="bi bi-arrow-left-right me-2 text-primary"></i>Préstamos</h1>
        <a href="{{ route('prestamos.create') }}" class="btn btn-primary rounded-pill px-4">
            <i class="bi bi-plus-lg me-1"></i> Nuevo Préstamo
        </a>
    </div>

    <div class="card mb-4">
        <div class="card-body py-3">
            <form method="GET" action="{{ route('prestamos.index') }}">
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0">
                        <i class="bi bi-search text-muted"></i>
                    </span>
                    <input type="text" name="buscar" class="form-control border-start-0 ps-0"
                        placeholder="Buscar por equipo o solicitante..."
                        value="{{ request('buscar') }}">
                    <button class="btn btn-primary px-4" type="submit">Buscar</button>
                    @if(request('buscar'))
                        <a href="{{ route('prestamos.index') }}" class="btn btn-outline-secondary">Limpiar</a>
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
                        <th>Equipo</th>
                        <th>Solicitante</th>
                        <th>Fecha Préstamo</th>
                        <th>Devolución Esperada</th>
                        <th>Devolución Real</th>
                        <th>Estado</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($prestamos as $prestamo)
                        <tr>
                            <td>
                                <div class="fw-500">{{ $prestamo->equipo->nombre }}</div>
                                <small class="text-muted font-monospace">{{ $prestamo->equipo->codigo }}</small>
                            </td>
                            <td>{{ $prestamo->solicitante->nombre }}</td>
                            <td>{{ $prestamo->fecha_prestamo->format('d/m/Y') }}</td>
                            <td>{{ $prestamo->fecha_devolucion_esperada->format('d/m/Y') }}</td>
                            <td>{{ $prestamo->fecha_devolucion_real ? $prestamo->fecha_devolucion_real->format('d/m/Y') : '-' }}</td>
                            <td>
                                @if ($prestamo->fecha_devolucion_real)
                                    <span class="badge rounded-pill bg-success">
                                        <i class="bi bi-check-circle me-1"></i>Devuelto
                                    </span>
                                @else
                                    <span class="badge rounded-pill bg-warning text-dark">
                                        <i class="bi bi-clock me-1"></i>Pendiente
                                    </span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-action-group justify-content-center">
                                    @if (!$prestamo->fecha_devolucion_real)
                                        <a href="{{ route('prestamos.edit', $prestamo) }}"
                                           class="btn btn-sm btn-outline-success">
                                            <i class="bi bi-check2 me-1"></i>Devolver
                                        </a>
                                    @endif
                                    <a href="{{ route('prestamos.show', $prestamo) }}"
                                       class="btn btn-sm btn-outline-secondary">
                                        <i class="bi bi-eye me-1"></i>Ver
                                    </a>
                                    <form action="{{ route('prestamos.destroy', $prestamo) }}" method="POST"
                                          onsubmit="return confirm('¿Eliminar este préstamo?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            <i class="bi bi-trash me-1"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">
                                <i class="bi bi-inbox me-2"></i>No hay préstamos registrados.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($prestamos->hasPages())
            <div class="card-footer bg-white border-0 py-3 px-4">
                {{ $prestamos->links() }}
            </div>
        @endif
    </div>
@endsection