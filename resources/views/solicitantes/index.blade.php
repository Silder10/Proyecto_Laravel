@extends('layouts.app')

@section('title', 'Solicitantes')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Solicitantes</h1>
        <a href="{{ route('solicitantes.create') }}" class="btn btn-primary">Nuevo Solicitante</a>
    </div>

    <form method="GET" action="{{ route('solicitantes.index') }}" class="mb-3">
        <div class="input-group">
            <input type="text" name="buscar" class="form-control" placeholder="Buscar por nombre, documento o correo" value="{{ request('buscar') }}">
            <button class="btn btn-outline-secondary" type="submit">Buscar</button>
        </div>
    </form>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Nombre</th>
                <th>Documento</th>
                <th>Correo</th>
                <th>Tipo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($solicitantes as $solicitante)
                <tr>
                    <td>{{ $solicitante->nombre }}</td>
                    <td>{{ $solicitante->documento }}</td>
                    <td>{{ $solicitante->correo }}</td>
                    <td>{{ $solicitante->tipo }}</td>
                    <td>
                        <a href="{{ route('solicitantes.edit', $solicitante) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('solicitantes.destroy', $solicitante) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de eliminar este solicitante?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No hay solicitantes registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $solicitantes->links() }}
@endsection