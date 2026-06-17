<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gestión de Equipos')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Gestión de Préstamo de Equipos</a>
            <div class="navbar-nav">
                <a class="nav-link" href="{{ route('equipos.index') }}">Equipos</a>
                <a class="nav-link" href="{{ route('solicitantes.index') }}">Solicitantes</a>
                <a class="nav-link" href="{{ route('prestamos.index') }}">Préstamos</a>
                <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
            </div>
            <div class="navbar-nav ms-auto">
                <span class="nav-link text-light">{{ Auth::user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-light btn-sm">Cerrar sesión</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>