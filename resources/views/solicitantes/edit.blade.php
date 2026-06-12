@extends('layouts.app')

@section('title', 'Editar Solicitante')

@section('content')
    <h1>Editar Solicitante</h1>

    <form action="{{ route('solicitantes.update', $solicitante) }}" method="POST">
        @csrf
        @method('PUT')
        @include('solicitantes._form')

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('solicitantes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection