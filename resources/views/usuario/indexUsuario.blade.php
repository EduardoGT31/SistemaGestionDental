@extends('layouts.admin')

@section('titulo', 'Gestión-Usuarios')

@section('contenido')
<!-- Título y botón de crear -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="text-purple fw-bold" style="color: #6f42c1;">Gestión de Usuarios</h3>
    <button type="button" class="btn btn-primary" style="background-color: #6f42c1; border-color: #6f42c1;" data-bs-toggle="modal" data-bs-target="#crearUsuarioModal">
        Crear Usuario
    </button>
</div>

<!-- Incluir el modal crear usuario -->
@include('usuario.crearUsuario')

<!-- Buscador -->
<form method="GET" action="{{ route('indexUsuarios') }}">
    <div class="input-group mb-3">
        <input type="text" name="buscar" id="campoBuscar" class="form-control" placeholder="Buscar por nombre, apellido, usuario, teléfono o cédula" value="{{ request('buscar') }}">
        <button class="btn btn-primary" type="submit">Buscar</button>
        <button class="btn btn-secondary" type="button" onclick="limpiarBuscador()">Limpiar</button>
    </div>
</form>


<!-- Tabla de usuarios -->
<table class="table table-hover table-bordered shadow-sm" style="background-color: #f8f1ff;">
    <thead style="background-color: #e5d4ff;">
        <tr>
            <th>Cédula</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Usuario</th>
            <th>Teléfono</th>
            <th>Rol</th>
            <th style="width: 20%;">Acciones</th>
        </tr>
    </thead>
    <tbody id="tablaUsuarios">
        @foreach ($usuarios as $usuario)
        <tr>
            <td>{{ $usuario->cedula }}</td>
            <td>{{ $usuario->nombre_p }} {{ $usuario->nombre_s }}</td>
            <td>{{ $usuario->apellido_p }} {{ $usuario->apellido_s }}</td>
            <td>{{ $usuario->usuario }}</td>
            <td>{{ $usuario->telefono }}</td>
            <td>{{ $usuario->rol }}</td>
            <td>
                <div class="d-flex justify-content-center align-items-center gap-2">

                    <a href="#" class="btn btn-sm btn-warning d-flex align-items-center"
                        data-bs-toggle="modal" data-bs-target="#editarUsuarioModal"
                        data-usuario='@json($usuario)'
                        onclick="mostrarModalEditar(this)">
                        <i class="bi bi-pencil-square me-1"></i> Editar
                    </a>

                    <a href="#" class="btn btn-sm btn-danger d-flex align-items-center"
                        data-bs-toggle="modal" data-bs-target="#eliminarUsuarioModal"
                        data-usuario='@json($usuario)'
                        onclick="mostrarModalEliminar(this)">
                        <i class="bi bi-trash me-1"></i> Eliminar
                    </a>

                    <a href="#" class="btn btn-sm btn-secondary d-flex align-items-center"
                        data-bs-toggle="modal" data-bs-target="#resetearUsuarioModal"
                        data-usuario='@json($usuario)'
                        onclick="mostrarModalReset(this)">
                        <i class="bi bi-key me-1"></i> Resetear
                    </a>


                </div>
            </td>

        </tr>
        @endforeach

    </tbody>

</table>

<!-- Controles de paginación -->
<div class="d-flex justify-content-center mt-3">
    {{ $usuarios->links() }}
</div>

@include('usuario.editarUsuario')
@include('usuario.eliminarUsuario')
@include('usuario.contraseniaUsuario')

<!-- Script para limpiar -->
<script>
    function limpiarBuscador() {
        document.getElementById('campoBuscar').value = '';
        window.location.href = "{{ route('indexUsuarios') }}"; // Redirecciona sin filtros
    }
</script>

@endsection