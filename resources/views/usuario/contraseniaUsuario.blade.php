<!-- Modal Resetear Contraseña -->
<div class="modal fade" id="resetearUsuarioModal" tabindex="-1" aria-labelledby="resetearUsuarioModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('resetearUsuario') }}" method="POST" id="formResetearUsuario">
            @csrf
            @method('PUT')
            <input type="hidden" id="reset_id" name="id_usuario"> <!-- ID oculto del usuario -->

            <div class="modal-content">
                <div class="modal-header bg-secondary text-white">
                    <h5 class="modal-title" id="resetearUsuarioModalLabel">Resetear Contraseña</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <p>Ingrese una nueva contraseña para <strong id="nombreReset"></strong>:</p>

                    <!-- Campo Nueva Contraseña -->
                    <div class="mb-3">
                        <label for="nueva_contrasenia" class="form-label">Nueva Contraseña</label>
                        <input type="password" id="nueva_contrasenia" name="contrasenia" class="form-control" value="12345678" required>
                    </div>

                    <!-- Campo Confirmar Contraseña -->
                    <div class="mb-3">
                        <label for="confirmar_contrasenia" class="form-label">Confirmar Contraseña</label>
                        <input type="password" id="confirmar_contrasenia" class="form-control" value="12345678" required>
                    </div>

                    <!-- Checkbox para ver contraseña -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="verClave">
                        <label class="form-check-label" for="verClave">Mostrar contraseña</label>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-secondary">Resetear</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    function mostrarModalReset(elemento) {
        const usuario = JSON.parse(elemento.getAttribute('data-usuario'));

        document.getElementById('reset_id').value = usuario.id_usuario;
        document.getElementById('nombreReset').textContent = usuario.nombre_p + ' ' + usuario.apellido_p;

        // Resetear campos por defecto
        document.getElementById('nueva_contrasenia').value = '12345678';
        document.getElementById('confirmar_contrasenia').value = '12345678';

        // Ocultar clave por defecto
        document.getElementById('verClave').checked = false;
        document.getElementById('nueva_contrasenia').type = 'password';
        document.getElementById('confirmar_contrasenia').type = 'password';

    }

    //Ver clave
    document.getElementById('verClave').addEventListener('change', function () {
        const pass1 = document.getElementById('nueva_contrasenia');
        const pass2 = document.getElementById('confirmar_contrasenia');
        const tipo = this.checked ? 'text' : 'password';
        pass1.type = tipo;
        pass2.type = tipo;
    });

    // Validar que ambas contraseñas coincidan
    document.getElementById('formResetearUsuario').addEventListener('submit', function(e) {
        const pass1 = document.getElementById('nueva_contrasenia').value;
        const pass2 = document.getElementById('confirmar_contrasenia').value;

        if (pass1 !== pass2) {
            e.preventDefault();
            alert('Las contraseñas no coinciden.');
        }
    });
</script>