@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="page-header">
        <h1><i class="bi bi-speedometer2 me-2 text-primary"></i>Dashboard</h1>
        <span class="text-muted" style="font-size:0.9rem;">
            <i class="bi bi-calendar3 me-1"></i>{{ now()->format('d/m/Y') }}
        </span>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-xl-4 col-md-6">
            <div class="card h-100" style="border-left: 4px solid #22c55e;">
                <div class="card-body d-flex align-items-center gap-3 p-4">
                    <div style="background:#dcfce7; border-radius:12px; width:54px; height:54px; display:flex; align-items:center; justify-content:center;">
                        <i class="bi bi-check-circle-fill text-success" style="font-size:1.6rem;"></i>
                    </div>
                    <div>
                        <div class="text-muted" style="font-size:0.82rem; text-transform:uppercase; letter-spacing:0.5px; font-weight:600;">Disponibles</div>
                        <div style="font-size:2rem; font-weight:700; color:#1e293b; line-height:1.1;">{{ $totalDisponibles }}</div>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-0 pt-0 pb-3 px-4">
                    <a href="{{ route('equipos.index') }}" class="text-success text-decoration-none" style="font-size:0.85rem; font-weight:500;">
                        Ver equipos <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6">
            <div class="card h-100" style="border-left: 4px solid #f59e0b;">
                <div class="card-body d-flex align-items-center gap-3 p-4">
                    <div style="background:#fef3c7; border-radius:12px; width:54px; height:54px; display:flex; align-items:center; justify-content:center;">
                        <i class="bi bi-arrow-left-right text-warning" style="font-size:1.6rem;"></i>
                    </div>
                    <div>
                        <div class="text-muted" style="font-size:0.82rem; text-transform:uppercase; letter-spacing:0.5px; font-weight:600;">Prestados</div>
                        <div style="font-size:2rem; font-weight:700; color:#1e293b; line-height:1.1;">{{ $totalPrestados }}</div>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-0 pt-0 pb-3 px-4">
                    <a href="{{ route('equipos.index') }}" class="text-warning text-decoration-none" style="font-size:0.85rem; font-weight:500;">
                        Ver equipos <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6">
            <div class="card h-100" style="border-left: 4px solid #94a3b8;">
                <div class="card-body d-flex align-items-center gap-3 p-4">
                    <div style="background:#f1f5f9; border-radius:12px; width:54px; height:54px; display:flex; align-items:center; justify-content:center;">
                        <i class="bi bi-tools text-secondary" style="font-size:1.6rem;"></i>
                    </div>
                    <div>
                        <div class="text-muted" style="font-size:0.82rem; text-transform:uppercase; letter-spacing:0.5px; font-weight:600;">Mantenimiento</div>
                        <div style="font-size:2rem; font-weight:700; color:#1e293b; line-height:1.1;">{{ $totalMantenimiento }}</div>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-0 pt-0 pb-3 px-4">
                    <a href="{{ route('equipos.index') }}" class="text-secondary text-decoration-none" style="font-size:0.85rem; font-weight:500;">
                        Ver equipos <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6">
            <div class="card h-100" style="border-left: 4px solid #1a73e8;">
                <div class="card-body d-flex align-items-center gap-3 p-4">
                    <div style="background:#e8f0fe; border-radius:12px; width:54px; height:54px; display:flex; align-items:center; justify-content:center;">
                        <i class="bi bi-clipboard-check text-primary" style="font-size:1.6rem;"></i>
                    </div>
                    <div>
                        <div class="text-muted" style="font-size:0.82rem; text-transform:uppercase; letter-spacing:0.5px; font-weight:600;">Total Préstamos</div>
                        <div style="font-size:2rem; font-weight:700; color:#1e293b; line-height:1.1;">{{ $totalPrestamos }}</div>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-0 pt-0 pb-3 px-4">
                    <a href="{{ route('prestamos.index') }}" class="text-primary text-decoration-none" style="font-size:0.85rem; font-weight:500;">
                        Ver préstamos <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6">
            <div class="card h-100" style="border-left: 4px solid #ef4444;">
                <div class="card-body d-flex align-items-center gap-3 p-4">
                    <div style="background:#fee2e2; border-radius:12px; width:54px; height:54px; display:flex; align-items:center; justify-content:center;">
                        <i class="bi bi-clock-history text-danger" style="font-size:1.6rem;"></i>
                    </div>
                    <div>
                        <div class="text-muted" style="font-size:0.82rem; text-transform:uppercase; letter-spacing:0.5px; font-weight:600;">Pendientes</div>
                        <div style="font-size:2rem; font-weight:700; color:#1e293b; line-height:1.1;">{{ $prestamosPendientes }}</div>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-0 pt-0 pb-3 px-4">
                    <a href="{{ route('prestamos.index') }}" class="text-danger text-decoration-none" style="font-size:0.85rem; font-weight:500;">
                        Ver préstamos <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6">
            <div class="card h-100" style="border-left: 4px solid #06b6d4;">
                <div class="card-body d-flex align-items-center gap-3 p-4">
                    <div style="background:#cffafe; border-radius:12px; width:54px; height:54px; display:flex; align-items:center; justify-content:center;">
                        <i class="bi bi-people-fill text-info" style="font-size:1.6rem;"></i>
                    </div>
                    <div>
                        <div class="text-muted" style="font-size:0.82rem; text-transform:uppercase; letter-spacing:0.5px; font-weight:600;">Solicitantes</div>
                        <div style="font-size:2rem; font-weight:700; color:#1e293b; line-height:1.1;">{{ $totalSolicitantes }}</div>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-0 pt-0 pb-3 px-4">
                    <a href="{{ route('solicitantes.index') }}" class="text-info text-decoration-none" style="font-size:0.85rem; font-weight:500;">
                        Ver solicitantes <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-white border-0 pt-4 px-4 pb-0">
            <h5 class="fw-700 mb-0" style="color:#1e293b;">
                <i class="bi bi-clock-history me-2 text-primary"></i>Préstamos Recientes
            </h5>
        </div>
        <div class="card-body p-0">
            <table class="table mb-0">
                <thead>
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
                                    <span class="badge rounded-pill bg-success">Devuelto</span>
                                @else
                                    <span class="badge rounded-pill bg-warning text-dark">Pendiente</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">
                                <i class="bi bi-inbox me-2"></i>No hay préstamos registrados.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection