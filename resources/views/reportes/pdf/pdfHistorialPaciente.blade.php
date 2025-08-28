<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Historial Clínico - {{ $paciente->nombre_p }} {{ $paciente->apellido_p }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; margin: 30px; }
        header { text-align: center; border-bottom: 2px solid #333; padding-bottom: 10px; margin-bottom: 20px; }
        h2 { margin: 0; }
        .info { margin-bottom: 15px; }
        .info p { margin: 3px 0; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
        th { background-color: #f2f2f2; }
        footer { position: fixed; bottom: 10px; left: 0; right: 0; text-align: center; font-size: 10px; color: #777; }
    </style>
</head>
<body>
    <header>
        <h2>Consultorio Odontológico Perfect Smile</h2>
        <p><em>Reporte del Historial Clínico del Paciente</em></p>
    </header>

    <div class="info">
        <p><strong>Nombre:</strong> {{ $paciente->nombre_p }} {{ $paciente->nombre_s }} {{ $paciente->apellido_p }} {{ $paciente->apellido_s }}</p>
        <p><strong>Cédula:</strong> {{ $paciente->cedula }}</p>
        <p><strong>Género:</strong> {{ $paciente->genero }}</p>
        <p><strong>Teléfono:</strong> {{ $paciente->telefono }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Odontólogo</th>
                <th>Motivo</th>
                <th>Diagnóstico</th>
                <th>Tratamiento</th>
            </tr>
        </thead>
        <tbody>
            @forelse($historiales as $historial)
            <tr>
                <td>{{ $historial->fecha }}</td>
                <td>{{ $historial->odontologo }}</td>
                <td>{{ $historial->motivo_consulta }}</td>
                <td>{{ $historial->diagnostico }}</td>
                <td>{{ $historial->tipo_tratamiento }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="text-align: center;">No hay registros</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <footer>
        Generado automáticamente el {{ \Carbon\Carbon::now()->format('d/m/Y H:i') }}  
        | Sistema de Gestión Odontológica Perfect Smile
    </footer>
</body>
</html>
