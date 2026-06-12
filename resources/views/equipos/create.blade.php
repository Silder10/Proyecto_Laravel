@extends('layouts.app')

@section('title', 'Nuevo Equipo')

@section('content')
    <h1>Nuevo Equipo</h1>

    <form action="{{ route('equipos.store') }}" method="POST">
        @csrf
        @include('equipos._form')

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('equipos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection