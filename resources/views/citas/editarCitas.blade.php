<!-- Modal Editar Cita -->
<div class="modal fade" id="editarCitaModal" tabindex="-1" aria-labelledby="editarCitaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="formEditarCita" method="POST" action="{{ route('updateCitas') }}">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header text-white" style="background-color: #6f42c1;">
                    <h5 class="modal-title" id="editarCitaLabel">Editar Cita</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <!-- Hidden ID de cita -->
                    <input type="hidden" name="id_cita" id="editar_id_cita">

                    <!-- ID paciente -->
                    <input type="hidden" name="id_paciente" id="editar_id_paciente">

                    <!-- ID usuario -->
                    <input type="hidden" name="id_usuario" id="editar_id_usuario" value="{{ session('id') }}">

                    <div class="mb-3">
                        <label for="nombre_completo" class="form-label">Paciente</label>
                        <input type="text" class="form-control" id="nombre_completo" name="nombre_completo" disabled>
                    </div>

                    <!-- Odontólogo -->
                    <div class="mb-3">
                        <label>Odontólogo</label>
                        <select name="odontologo" id="editar_odontologo" class="form-select" required>
                            <option value="" disabled>Seleccione un odontólogo</option>
                            @foreach($odontologos as $odontologo)
                            <option value="{{ $odontologo->nombre_p }} {{ $odontologo->nombre_s }} {{ $odontologo->apellido_p }} {{ $odontologo->apellido_s }}">
                                Dr. {{ $odontologo->nombre_p }} {{ $odontologo->nombre_s }} {{ $odontologo->apellido_p }} {{ $odontologo->apellido_s }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Fecha y hora -->
                    <div class="mb-3 d-flex gap-3">
                        <div class="flex-fill">
                            <label>Fecha</label>
                            <input type="date" name="fecha" id="editar_fecha" class="form-control" required>
                        </div>
                        <div class="flex-fill">
                            <label>Hora</label>
                            <input type="time" name="hora" id="editar_hora" class="form-control" required>
                        </div>



                    </div>

                    <!-- Estado -->
                    <div class="mb-3">

                        <!-- Campo visible deshabilitado -->
                        <div class="mb-3">
                            <label>Estado</label>
                            <input type="text" class="form-control" value="Pendiente" disabled>
                        </div>

                        <!-- Campo oculto que sí se envía -->
                        <input type="hidden" name="estado" id="editar_estado" value="Pendiente">


                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn text-white" style="background-color: #6f42c1;">Guardar Cambios</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </form>
    </div>
</div>


<script>
    function mostrarModalEditarCita(elemento) {
        const cita = JSON.parse(elemento.getAttribute('data-cita'));

        document.getElementById('editar_id_cita').value = cita.id_cita;
        document.getElementById('editar_id_paciente').value = cita.id_paciente;
        document.getElementById('nombre_completo').value =
            cita.paciente.nombre_p + ' ' +
            (cita.paciente.nombre_s ?? '') + ' ' +
            cita.paciente.apellido_p + ' ' +
            (cita.paciente.apellido_s ?? '');
        document.getElementById('editar_id_usuario').value = cita.id_usuario;
        document.getElementById('editar_odontologo').value = cita.odontologo;
        document.getElementById('editar_fecha').value = cita.fecha;
        document.getElementById('editar_hora').value = cita.hora;
        document.getElementById('editar_estado').value = cita.estado;
    }
</script>