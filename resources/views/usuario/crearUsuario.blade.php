<!-- Modal Crear Usuario -->
<div class="modal fade" id="crearUsuarioModal" tabindex="-1" aria-labelledby="crearUsuarioModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('crearUsuario') }}" method="POST" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="crearUsuarioModalLabel">Crear Nuevo Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <!-- Cédula -->
                <div class="mb-3">
                    <label for="cedula" class="form-label">Cédula</label>
                    <input type="text" class="form-control" id="cedula" name="cedula" placeholder="Ingrese la cédula" required>
                </div>

                <!-- Nombres lado a lado -->
                <div class="row g-3 mb-3">
                    <div class="col">
                        <label for="nombre_p" class="form-label">Primer Nombre</label>
                        <input type="text" class="form-control" id="nombre_p" name="nombre_p" placeholder="Primer Nombre" required>
                    </div>
                    <div class="col">
                        <label for="nombre_s" class="form-label">Segundo Nombre</label>
                        <input type="text" class="form-control" id="nombre_s" name="nombre_s" placeholder="Segundo Nombre">
                    </div>
                </div>

                <!-- Apellidos lado a lado -->
                <div class="row g-3 mb-3">
                    <div class="col">
                        <label for="apellido_p" class="form-label">Primer Apellido</label>
                        <input type="text" class="form-control" id="apellido_p" name="apellido_p" placeholder="Primer Apellido" required>
                    </div>
                    <div class="col">
                        <label for="apellido_s" class="form-label">Segundo Apellido</label>
                        <input type="text" class="form-control" id="apellido_s" name="apellido_s" placeholder="Segundo Apellido">
                    </div>
                </div>

                <!-- Usuario -->
                <div class="mb-3">
                    <label for="usuario" class="form-label">Usuario</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Nombre de usuario" required>
                </div>

                <!-- Contraseña -->
                <div class="mb-3">
                    <label for="contrasenia" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="contrasenia" name="contrasenia" placeholder="Contraseña" required>
                </div>

                <!-- Teléfono -->
                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Número de teléfono" required>
                </div>

                <!-- Rol -->
                <div class="mb-3">
                    <label for="rol" class="form-label">Rol</label>
                    <select class="form-select" id="rol" name="rol" required>
                        <option value="" selected disabled>Seleccione un rol</option>
                        <option value="Secretaria">Secretaria</option>
                        <option value="Odontólogo">Odontólogo</option>
                        <option value="Administrador">Administrador</option>
                    </select>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary" style="background-color: #6f42c1; border-color: #6f42c1;">Guardar</button>
            </div>
        </form>
    </div>
</div>