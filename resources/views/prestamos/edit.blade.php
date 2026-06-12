@extends('layouts.app')

@section('title', 'Registrar Devolución')

@section('content')
    <h1>Registrar Devolución</h1>

    <div class="card mb-4">
        <div class="card-body">
            <p><strong>Equipo:</strong> {{ $prestamo->equipo->nombre }} ({{ $prestamo->equipo->codigo }})</p>
            <p><strong>Solicitante:</strong> {{ $prestamo->solicitante->nombre }}</p>
            <p><strong>Fecha de Préstamo:</strong> {{ $prestamo->fecha_prestamo->format('d/m/Y') }}</p>
            <p><strong>Fecha de Devolución Esperada:</strong> {{ $prestamo->fecha_devolucion_esperada->format('d/m/Y') }}</p>
        </div>
    </div>

    <form action="{{ route('prestamos.update', $prestamo) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Fecha de Devolución Real</label>
            <input type="date" name="fecha_devolucion_real" class="form-control @error('fecha_devolucion_real') is-invalid @enderror" value="{{ old('fecha_devolucion_real', date('Y-m-d')) }}">
            @error('fecha_devolucion_real')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Confirmar Devolución</button>
        <a href="{{ route('prestamos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection