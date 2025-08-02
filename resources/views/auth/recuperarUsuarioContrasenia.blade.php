<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Actualizar Usuario o Contraseña</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .btn-cancelar {
            background-color: #6c757d;
            color: white;
        }

        .btn-cancelar:hover {
            background-color: #5a6268;
        }
    </style>
</head>

<body class="bg-light d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="card p-4 shadow" style="width: 100%; max-width: 400px;">
        <h4 class="text-center mb-3">Actualizar Datos</h4>

        <form action="{{ route('recuperar.actualizar') }}" method="POST">
            @csrf
            <input type="hidden" name="id_usuario" value="{{ $usuario->id_usuario }}">

            @if($opcion == 'usuario')
                <div class="mb-3">
                    <label for="nuevo_usuario" class="form-label">Nuevo Usuario</label>
                    <input type="text" class="form-control" name="nuevo_usuario" id="nuevo_usuario" required>
                </div>
            @elseif($opcion == 'contrasenia')
                <div class="mb-3">
                    <label for="nueva_contrasenia" class="form-label">Nueva Contraseña</label>
                    <input type="password" class="form-control" name="nueva_contrasenia" id="nueva_contrasenia" required>
                </div>
                <div class="mb-3">
                    <label for="confirmar_contrasenia" class="form-label">Confirmar Contraseña</label>
                    <input type="password" class="form-control" name="confirmar_contrasenia" id="confirmar_contrasenia" required>
                </div>
            @endif

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-success">Guardar Cambios</button>
                <a href="{{ route('recuperar.formulario') }}" class="btn btn-cancelar">Cancelar</a>
            </div>
        </form>
    </div>
</body>

</html>
