<!-- Modal Crear Cita -->
<div class="modal fade" id="crearCitaModal" tabindex="-1" aria-labelledby="crearCitaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('storeCitas') }}" method="POST">
            @csrf
            <div class="modal-content">
                <!-- Cabecera morada -->
                <div class="modal-header text-white" style="background-color: #6f42c1;">
                    <h5 class="modal-title" id="crearCitaLabel">Agendar Nueva Cita</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">

                    <!-- Campo cédula paciente -->
                    <div class="mb-3">
                        <label for="cedulaPaciente">Cédula del Paciente</label>
                        <input type="text" id="cedulaPaciente" name="cedulaPaciente" class="form-control" placeholder="Ingrese cédula" required>
                    </div>

                    <!-- Mostrar paciente encontrado o no encontrado -->
                    <div class="mb-3" id="pacienteEncontrado" style="display:none;">
                        <label>Paciente seleccionado</label>
                        <p id="nombrePaciente" class="fw-bold"></p>
                    </div>

                    <div class="mb-3" id="pacienteNoExiste" style="display:none;">
                        <p class="text-danger fw-bold">No existe</p>
                    </div>

                    <!-- Campo oculto id_paciente -->
                    <input type="hidden" name="id_paciente" id="idPaciente">

                    <!-- Usuario (id sesión personalizada) -->
                    <input type="hidden" name="id_usuario" value="{{ session('id') }}">

                    <!-- Select Odontólogos -->
                    <div class="mb-3">
                        <label>Odontólogo</label>
                        <select name="odontologo" class="form-select" required>
                            <option value="" disabled selected>Seleccione un odontólogo</option>
                            @foreach($odontologos as $odontologo)
                            <option value="{{ $odontologo->nombre_p }} {{ $odontologo->nombre_s }} {{ $odontologo->apellido_p }} {{ $odontologo->apellido_s }}">
                                Dr. {{ $odontologo->nombre_p }} {{ $odontologo->nombre_s }} {{ $odontologo->apellido_p }} {{ $odontologo->apellido_s }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Fecha y Hora juntos -->
                    <div class="mb-3 d-flex gap-3">
                        <div class="flex-fill">
                            <label>Fecha</label>
                            <input type="date" name="fecha" class="form-control" required>
                        </div>
                        <div class="flex-fill">
                            <label>Hora</label>
                            <input type="time" name="hora" class="form-control" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label>Estado</label>
                        <input type="text" class="form-control" value="Pendiente" disabled>
                    </div>

                </div>

                <!-- Botones -->
                <div class="modal-footer">
                    <button type="submit" class="btn text-white" style="background-color: #6f42c1;">Guardar Cita</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </form>
    </div>
</div>


<!-- Script para buscar paciente por cédula -->
<script>
    document.getElementById('cedulaPaciente').addEventListener('blur', function() {
        const cedula = this.value.trim();

        const pacienteEncontradoDiv = document.getElementById('pacienteEncontrado');
        const pacienteNoExisteDiv = document.getElementById('pacienteNoExiste');
        const nombrePacienteP = document.getElementById('nombrePaciente');
        const idPacienteInput = document.getElementById('idPaciente');

        if (cedula === '') {
            pacienteEncontradoDiv.style.display = 'none';
            pacienteNoExisteDiv.style.display = 'none';
            idPacienteInput.value = '';
            return;
        }

        fetch(`/buscar-paciente?cedula=${cedula}`)
            .then(response => response.json())
            .then(data => {
                if (data.existe) {
                    pacienteEncontradoDiv.style.display = 'block';
                    pacienteNoExisteDiv.style.display = 'none';
                    nombrePacienteP.textContent = data.paciente.nombre_p + ' ' + data.paciente.nombre_s + ' ' + data.paciente.apellido_p + ' ' + data.paciente.apellido_s;
                    idPacienteInput.value = data.paciente.id_paciente;
                } else {
                    pacienteEncontradoDiv.style.display = 'none';
                    pacienteNoExisteDiv.style.display = 'block';
                    idPacienteInput.value = '';
                }
            })
            .catch(error => {
                console.error('Error al buscar paciente:', error);
            });
    });
</script>