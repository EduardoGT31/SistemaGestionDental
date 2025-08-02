<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Recuperar Usuario o Contraseña</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #f0f8ff, #f0f8ff);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }
        .btn-morado {
            background-color: #6f42c1;
            color: white;
        }
        .btn-morado:hover {
            background-color: #5a379f;
        }
        .btn-regresar {
            background-color: #6c757d;
            color: white;
        }
        .btn-regresar:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <div class="card p-4" style="width: 100%; max-width: 400px;">
        <h4 class="text-center mb-3 text-dark">Recuperar Usuario o Contraseña</h4>

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ route('recuperar.verificar') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="correo" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" name="correo" id="correo" required autocomplete="off">
            </div>

            <div class="mb-3">
                <label class="form-label">¿Qué desea recuperar?</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="opcion" id="usuario" value="usuario" required>
                    <label class="form-check-label" for="usuario">
                        Usuario
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="opcion" id="contrasenia" value="contrasenia">
                    <label class="form-check-label" for="contrasenia">
                        Contraseña
                    </label>
                </div>
            </div>

            <button type="submit" class="btn btn-morado w-100 mb-3">Verificar</button>
        </form>

        <a href="{{ route('login') }}" class="btn btn-regresar w-100">Regresar al Login</a>
    </div>
</body>
</html>
