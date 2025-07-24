<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('titulo', 'Panel de Administración')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />

    <style>
        body {
            background-color: #f0f8ff;
        }

        .menu-card {
            background-color: white;
            border-radius: 1rem;
            box-shadow: 0 4px 20px rgba(111, 66, 193, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
        }

        .menu-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(111, 66, 193, 0.2);
        }

        .menu-card i {
            font-size: 2.5rem;
            color: #6f42c1;
        }

        .card-body {
            text-align: center;
            padding: 2rem;
        }
    </style>
</head>

<body>

    {{-- Navbar superior --}}
    <!-- Navbar superior -->
    <nav class="navbar navbar-expand-lg" style="background-color: #6f42c1;">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold text-white" href="#">Administrador</a>
            <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#menuSuperior" aria-controls="menuSuperior" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="menuSuperior">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 gap-2">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('inicioAdmin') }}"><i class="bi bi-house-door"></i> Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('indexUsuarios') }}"><i class="bi bi-people"></i> Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#"><i class="bi bi-person-lines-fill"></i> Pacientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#"><i class="bi bi-calendar-check"></i> Citas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#"><i class="bi bi-file-earmark-bar-graph"></i> Reportes</a>
                    </li>
                </ul>

                <!-- Bienvenido y dropdown -->
                <div class="d-flex align-items-center gap-3">
                    <span class="fw-semibold text-white">Bienvenido, {{ session('nombre_p') }} {{ session('apellido_p') }}</span>

                    <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle"></i> Cuenta
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-person"></i> Perfil</a></li>
                            <li>
                                <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#confirmLogoutModal">
                                    <i class="bi bi-box-arrow-right"></i> Cerrar sesión
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>


    <!-- Modal Confirmar Cierre de Sesión -->
    <div class="modal fade" id="confirmLogoutModal" tabindex="-1" aria-labelledby="confirmLogoutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #6f42c1;">
                    <h5 class="modal-title text-white">Cerrar sesión</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    ¿Estás seguro de que deseas cerrar sesión?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <a href="{{ route('cerrarSesion') }}" class="btn btn-danger">Cerrar sesión</a>
                </div>
            </div>
        </div>
    </div>

    {{-- Contenido que cambia --}}
    <div class="container mt-5">
        @yield('contenido')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')
</body>

</html>