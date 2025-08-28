<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Citas - {{ $hoy }}</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #333; padding: 6px; text-align: left; }
        th { background-color: #f2f2f2; }
        h2 { text-align: center; }
    </style>
</head>
<body>
    <h2>Reporte de Citas del Día - {{ $hoy }}</h2>
    <table>
        <thead>
            <tr>
                <th>Paciente</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Odontólogo</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($citas as $cita)
            <tr>
                <td>{{ $cita->nombre_completo }}</td>
                <td>{{ $cita->fecha }}</td>
                <td>{{ $cita->hora }}</td>
                <td>{{ $cita->odontologo }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="4" style="text-align: center;">No hay citas registradas hoy</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
