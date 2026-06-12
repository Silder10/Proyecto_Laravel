@extends('layouts.app')

@section('title', 'Detalle del Préstamo')

@section('content')
    <h1>Detalle del Préstamo</h1>

    <div class="card">
        <div class="card-body">
            <p><strong>Equipo:</strong> {{ $prestamo->equipo->nombre }} ({{ $prestamo->equipo->codigo }})</p>
            <p><strong>Categoría:</strong> {{ $prestamo->equipo->categoria }}</p>
            <p><strong>Marca:</strong> {{ $prestamo->equipo->marca }}</p>
            <hr>
            <p><strong>Solicitante:</strong> {{ $prestamo->solicitante->nombre }}</p>
            <p><strong>Documento:</strong> {{ $prestamo->solicitante->documento }}</p>
            <p><strong>Correo:</strong> {{ $prestamo->solicitante->correo }}</p>
            <p><strong>Tipo:</strong> {{ $prestamo->solicitante->tipo }}</p>
            <hr>
            <p><strong>Fecha de Préstamo:</strong> {{ $prestamo->fecha_prestamo->format('d/m/Y') }}</p>
            <p><strong>Fecha de Devolución Esperada:</strong> {{ $prestamo->fecha_devolucion_esperada->format('d/m/Y') }}</p>
            <p><strong>Fecha de Devolución Real:</strong> 
                {{ $prestamo->fecha_devolucion_real ? $prestamo->fecha_devolucion_real->format('d/m/Y') : 'Pendiente' }}
            </p>
            <p><strong>Estado:</strong>
                @if ($prestamo->fecha_devolucion_real)
                    <span class="badge bg-success">Devuelto</span>
                @else
                    <span class="badge bg-warning text-dark">Pendiente</span>
                @endif
            </p>
        </div>
    </div>

    <a href="{{ route('prestamos.index') }}" class="btn btn-secondary mt-3">Volver</a>
@endsection