@extends('layouts.app')

@section('title', 'Editar Equipo')

@section('content')
    <h1>Editar Equipo</h1>

    <form action="{{ route('equipos.update', $equipo) }}" method="POST">
        @csrf
        @method('PUT')
        @include('equipos._form')

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('equipos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection