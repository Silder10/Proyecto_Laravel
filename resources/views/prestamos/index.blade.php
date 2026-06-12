@extends('layouts.app')

@section('title', 'Préstamos')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Préstamos</h1>
        <a href="{{ route('prestamos.create') }}" class="btn btn-primary">Nuevo Préstamo</a>
    </div>

    <form method="GET" action="{{ route('prestamos.index') }}" class="mb-3">
        <div class="input-group">
            <input type="text" name="buscar" class="form-control" placeholder="Buscar por equipo o solicitante" value="{{ request('buscar') }}">
            <button class="btn btn-outline-secondary" type="submit">Buscar</button>
        </div>
    </form>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Equipo</th>
                <th>Solicitante</th>
                <th>Fecha Préstamo</th>
                <th>Fecha Devolución Esperada</th>
                <th>Fecha Devolución Real</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($prestamos as $prestamo)
                <tr>
                    <td>{{ $prestamo->equipo->nombre }} ({{ $prestamo->equipo->codigo }})</td>
                    <td>{{ $prestamo->solicitante->nombre }}</td>
                    <td>{{ $prestamo->fecha_prestamo->format('d/m/Y') }}</td>
                    <td>{{ $prestamo->fecha_devolucion_esperada->format('d/m/Y') }}</td>
                    <td>{{ $prestamo->fecha_devolucion_real ? $prestamo->fecha_devolucion_real->format('d/m/Y') : '-' }}</td>
                    <td>
                        @if ($prestamo->fecha_devolucion_real)
                            <span class="badge bg-success">Devuelto</span>
                        @else
                            <span class="badge bg-warning text-dark">Pendiente</span>
                        @endif
                    </td>
                    <td>
                        @if (!$prestamo->fecha_devolucion_real)
                            <a href="{{ route('prestamos.edit', $prestamo) }}" class="btn btn-sm btn-success">Registrar Devolución</a>
                        @endif
                        <a href="{{ route('prestamos.show', $prestamo) }}" class="btn btn-sm btn-info">Ver</a>
                        <form action="{{ route('prestamos.destroy', $prestamo) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de eliminar este préstamo?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">No hay préstamos registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $prestamos->links() }}
@endsection