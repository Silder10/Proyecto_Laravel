@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h1 class="mb-4">Dashboard</h1>

    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="card text-white bg-success h-100">
                <div class="card-body">
                    <h5 class="card-title">Equipos Disponibles</h5>
                    <p class="card-text display-4">{{ $totalDisponibles }}</p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('equipos.index') }}" class="text-white">Ver equipos →</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-warning h-100">
                <div class="card-body">
                    <h5 class="card-title">Equipos Prestados</h5>
                    <p class="card-text display-4">{{ $totalPrestados }}</p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('equipos.index') }}" class="text-dark">Ver equipos →</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-secondary h-100">
                <div class="card-body">
                    <h5 class="card-title">En Mantenimiento</h5>
                    <p class="card-text display-4">{{ $totalMantenimiento }}</p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('equipos.index') }}" class="text-white">Ver equipos →</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-primary h-100">
                <div class="card-body">
                    <h5 class="card-title">Total Préstamos</h5>
                    <p class="card-text display-4">{{ $totalPrestamos }}</p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('prestamos.index') }}" class="text-white">Ver préstamos →</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-danger h-100">
                <div class="card-body">
                    <h5 class="card-title">Préstamos Pendientes</h5>
                    <p class="card-text display-4">{{ $prestamosPendientes }}</p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('prestamos.index') }}" class="text-white">Ver préstamos →</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-info h-100">
                <div class="card-body">
                    <h5 class="card-title">Total Solicitantes</h5>
                    <p class="card-text display-4">{{ $totalSolicitantes }}</p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('solicitantes.index') }}" class="text-white">Ver solicitantes →</a>
                </div>
            </div>
        </div>
    </div>

    <h4 class="mb-3">Préstamos Recientes</h4>
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Equipo</th>
                <th>Solicitante</th>
                <th>Fecha Préstamo</th>
                <th>Devolución Esperada</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($prestamosRecientes as $prestamo)
                <tr>
                    <td>{{ $prestamo->equipo->nombre }}</td>
                    <td>{{ $prestamo->solicitante->nombre }}</td>
                    <td>{{ $prestamo->fecha_prestamo->format('d/m/Y') }}</td>
                    <td>{{ $prestamo->fecha_devolucion_esperada->format('d/m/Y') }}</td>
                    <td>
                        @if ($prestamo->fecha_devolucion_real)
                            <span class="badge bg-success">Devuelto</span>
                        @else
                            <span class="badge bg-warning text-dark">Pendiente</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No hay préstamos registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection