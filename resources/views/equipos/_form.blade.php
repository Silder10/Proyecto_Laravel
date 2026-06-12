@php
    $estados = ['Disponible', 'Prestado', 'Mantenimiento'];
@endphp

<div class="mb-3">
    <label class="form-label">Código</label>
    <input type="text" name="codigo" class="form-control @error('codigo') is-invalid @enderror" value="{{ old('codigo', $equipo->codigo ?? '') }}">
    @error('codigo')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Nombre</label>
    <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $equipo->nombre ?? '') }}">
    @error('nombre')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Categoría</label>
    <input type="text" name="categoria" class="form-control @error('categoria') is-invalid @enderror" value="{{ old('categoria', $equipo->categoria ?? '') }}">
    @error('categoria')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Marca</label>
    <input type="text" name="marca" class="form-control @error('marca') is-invalid @enderror" value="{{ old('marca', $equipo->marca ?? '') }}">
    @error('marca')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Estado</label>
    <select name="estado" class="form-select @error('estado') is-invalid @enderror">
        @foreach ($estados as $estado)
            <option value="{{ $estado }}" {{ (old('estado', $equipo->estado ?? '') === $estado) ? 'selected' : '' }}>
                {{ $estado }}
            </option>
        @endforeach
    </select>
    @error('estado')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>