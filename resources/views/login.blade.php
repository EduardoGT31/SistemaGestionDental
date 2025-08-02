<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Login - Clínica Dental</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f8ff;
        }

        .login-card {
            background-color: white;
            border-radius: 1rem;
            box-shadow: 0 4px 20px rgba(111, 66, 193, 0.2);
            /* sombra morada */
            padding: 2rem;
        }

        .btn-dental {
            background-color: #6f42c1;
            /* morado principal */
            color: white;
        }

        .btn-dental:hover {
            background-color: #5931a9;
        }

        .text-purple {
            color: #6f42c1;
        }
    </style>
</head>

<body>

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="col-md-5 login-card">
            <h3 class="text-center mb-4 text-purple">Iniciar Sesión</h3>
            <form action="{{ route('loginExitoso') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="usuario" class="form-label">Usuario</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Ingrese su usuario">
                </div>

                <div class="mb-3">
                    <label for="contrasenia" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="contrasenia" name="contrasenia" placeholder="Ingrese su contraseña">
                </div>
                <button type="submit" class="btn btn-dental w-100">Iniciar Sesión</button>

                <div class="mt-3 text-center">
                    <a href="{{ route('recuperar.formulario') }}" class="text-purple">¿Olvidó su usuario o contraseña?</a>
                </div>

            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>