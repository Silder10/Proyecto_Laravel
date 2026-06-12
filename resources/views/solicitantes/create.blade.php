@extends('layouts.app')

@section('title', 'Nuevo Solicitante')

@section('content')
    <h1>Nuevo Solicitante</h1>

    <form action="{{ route('solicitantes.store') }}" method="POST">
        @csrf
        @include('solicitantes._form')

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('solicitantes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection