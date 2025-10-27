<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Mi Aplicación')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <style>
        body {
            background-color: #f8f9fa;
        }
        footer {
            margin-top: 3rem;
            padding: 1rem 0;
            background-color: #343a40;
            color: white;
            text-align: center;
        }
    </style>
</head>
<body>

    @auth
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ url('/') }}">Inventario</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu"
                aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    {{-- 🔹 Solo visible para administradores --}}
                    @if(auth()->check() && auth()->user()->isAdmin())
                        <li class="nav-item">
                            <a href="{{ route('users.index') }}" class="nav-link">Usuarios</a>
                        </li>
                    @endif

                    <li class="nav-item">
                        <a href="{{ route('empleados.index') }}" class="nav-link">Empleados</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('equipos.index') }}" class="nav-link">Equipo de Cómputo</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('impresoras.index') }}" class="nav-link">Impresoras</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('dispositivos_red.index') }}" class="nav-link">Dispositivos de Red</a>
                    </li>
                </ul>

                <div class="d-flex align-items-center">
                    <span class="text-white me-3">{{ auth()->user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-outline-light btn-sm">Cerrar sesión</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
    @endauth

    <!-- Bootstrap JS (Popper y Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
