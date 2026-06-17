<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gestión de Equipos')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Segoe UI', sans-serif;
        }
        .navbar {
            background: #ffffff;
            border-bottom: 1px solid #e0e0e0;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
            padding: 0.75rem 1.5rem;
        }
        .navbar-brand {
            font-weight: 700;
            font-size: 1.1rem;
            color: #1a73e8 !important;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .navbar-brand i {
            font-size: 1.4rem;
        }
        .nav-link {
            color: #555 !important;
            font-weight: 500;
            padding: 0.5rem 0.9rem !important;
            border-radius: 6px;
            transition: background 0.2s, color 0.2s;
        }
        .nav-link:hover {
            background: #f0f4ff;
            color: #1a73e8 !important;
        }
        .nav-link.active {
            background: #e8f0fe;
            color: #1a73e8 !important;
        }
        .navbar-user {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .user-avatar {
            width: 34px;
            height: 34px;
            background: #1a73e8;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 0.85rem;
        }
        .user-name {
            font-size: 0.9rem;
            font-weight: 500;
            color: #333;
        }
        .btn-logout {
            font-size: 0.8rem;
            padding: 4px 12px;
            border-radius: 6px;
        }
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        .page-header h1 {
            font-size: 1.6rem;
            font-weight: 700;
            color: #1e293b;
            margin: 0;
        }
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.07);
        }
        .table {
            background: white;
            border-radius: 12px;
            overflow: hidden;
        }
        .table thead th {
            background: #1e293b;
            color: white;
            font-weight: 600;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border: none;
            padding: 12px 16px;
        }
        .table tbody td {
            padding: 12px 16px;
            vertical-align: middle;
            color: #374151;
            border-color: #f1f5f9;
        }
        .table tbody tr:hover {
            background: #f8faff;
        }
        .btn-action-group {
            display: flex;
            gap: 6px;
            align-items: center;
        }
        .btn-sm {
            font-size: 0.8rem;
            padding: 4px 10px;
            border-radius: 6px;
        }
        .form-control, .form-select {
            border-radius: 8px;
            border: 1px solid #d1d5db;
            padding: 0.5rem 0.9rem;
            font-size: 0.95rem;
        }
        .form-control:focus, .form-select:focus {
            border-color: #1a73e8;
            box-shadow: 0 0 0 3px rgba(26,115,232,0.1);
        }
        .form-label {
            font-weight: 500;
            font-size: 0.9rem;
            color: #374151;
            margin-bottom: 0.35rem;
        }
        .alert {
            border-radius: 10px;
            border: none;
        }
        .main-content {
            padding: 2rem 0;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid px-4">
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="bi bi-laptop"></i>
                Gestión de Equipos
            </a>

            <div class="navbar-nav d-flex flex-row gap-1 mx-auto">
                <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">
                    <i class="bi bi-speedometer2"></i> Dashboard
                </a>
                <a class="nav-link {{ request()->is('equipos*') ? 'active' : '' }}" href="{{ route('equipos.index') }}">
                    <i class="bi bi-pc-display"></i> Equipos
                </a>
                <a class="nav-link {{ request()->is('solicitantes*') ? 'active' : '' }}" href="{{ route('solicitantes.index') }}">
                    <i class="bi bi-people"></i> Solicitantes
                </a>
                <a class="nav-link {{ request()->is('prestamos*') ? 'active' : '' }}" href="{{ route('prestamos.index') }}">
                    <i class="bi bi-arrow-left-right"></i> Préstamos
                </a>
            </div>

            <div class="navbar-user">
                <div class="dropdown">
                    <button class="btn btn-link text-decoration-none d-flex align-items-center gap-2 p-0" 
                            data-bs-toggle="dropdown">
                        <div class="user-avatar">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                        <span class="user-name">{{ Auth::user()->name }}</span>
                        <i class="bi bi-chevron-down" style="font-size:0.75rem; color:#888;"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0" style="border-radius:10px; min-width:180px;">
                        <li>
                            <a class="dropdown-item" href="{{ route('reportes.equipos') }}">
                                <i class="bi bi-file-earmark-pdf text-danger me-2"></i> PDF Equipos
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('reportes.prestamos') }}">
                                <i class="bi bi-file-earmark-pdf text-danger me-2"></i> PDF Préstamos
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="bi bi-box-arrow-right me-2"></i> Cerrar sesión
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="container-fluid px-4 main-content">
        @if (session('success'))
            <div class="alert alert-success d-flex align-items-center gap-2 mb-3">
                <i class="bi bi-check-circle-fill"></i>
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>