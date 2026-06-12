@php
    $tipos = ['Estudiante', 'Docente'];
@endphp

<div class="mb-3">
    <label class="form-label">Nombre</label>
    <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $solicitante->nombre ?? '') }}">
    @error('nombre')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Documento</label>
    <input type="text" name="documento" class="form-control @error('documento') is-invalid @enderror" value="{{ old('documento', $solicitante->documento ?? '') }}">
    @error('documento')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Correo</label>
    <input type="email" name="correo" class="form-control @error('correo') is-invalid @enderror" value="{{ old('correo', $solicitante->correo ?? '') }}">
    @error('correo')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Tipo</label>
    <select name="tipo" class="form-select @error('tipo') is-invalid @enderror">
        @foreach ($tipos as $tipo)
            <option value="{{ $tipo }}" {{ (old('tipo', $solicitante->tipo ?? '') === $tipo) ? 'selected' : '' }}>
                {{ $tipo }}
            </option>
        @endforeach
    </select>
    @error('tipo')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>