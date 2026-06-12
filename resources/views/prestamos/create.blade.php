@extends('layouts.app')

@section('title', 'Nuevo Préstamo')

@section('content')
    <h1>Nuevo Préstamo</h1>

    <form action="{{ route('prestamos.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Equipo</label>
            <select name="equipo_id" class="form-select @error('equipo_id') is-invalid @enderror">
                <option value="">-- Seleccione un equipo disponible --</option>
                @foreach ($equipos as $equipo)
                    <option value="{{ $equipo->id }}" {{ old('equipo_id') == $equipo->id ? 'selected' : '' }}>
                        {{ $equipo->codigo }} - {{ $equipo->nombre }}
                    </option>
                @endforeach
            </select>
            @error('equipo_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Solicitante</label>
            <select name="solicitante_id" class="form-select @error('solicitante_id') is-invalid @enderror">
                <option value="">-- Seleccione un solicitante --</option>
                @foreach ($solicitantes as $solicitante)
                    <option value="{{ $solicitante->id }}" {{ old('solicitante_id') == $solicitante->id ? 'selected' : '' }}>
                        {{ $solicitante->nombre }} - {{ $solicitante->documento }}
                    </option>
                @endforeach
            </select>
            @error('solicitante_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Fecha de Préstamo</label>
            <input type="date" name="fecha_prestamo" class="form-control @error('fecha_prestamo') is-invalid @enderror" value="{{ old('fecha_prestamo', date('Y-m-d')) }}">
            @error('fecha_prestamo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Fecha de Devolución Esperada</label>
            <input type="date" name="fecha_devolucion_esperada" class="form-control @error('fecha_devolucion_esperada') is-invalid @enderror" value="{{ old('fecha_devolucion_esperada') }}">
            @error('fecha_devolucion_esperada')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Registrar Préstamo</button>
        <a href="{{ route('prestamos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection