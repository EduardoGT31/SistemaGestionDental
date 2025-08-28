<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reporte de Pacientes</title>
    <style>
        body { 
            font-family: DejaVu Sans, sans-serif; 
            font-size: 12px; 
            margin: 40px;
        }
        header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
        }
        header h1 {
            margin: 0;
            font-size: 20px;
            text-transform: uppercase;
        }
        header p {
            margin: 2px 0;
            font-size: 13px;
            color: #555;
        }
        h2 {
            text-align: center; 
            margin: 10px 0 20px 0;
        }
        table { 
            width: 100%; 
            border-collapse: collapse; 
            margin-top: 10px; 
        }
        th, td { 
            border: 1px solid #000; 
            padding: 8px; 
            text-align: left; 
        }
        th { 
            background-color: #eaeaea; 
            text-align: center;
        }
        tr:nth-child(even) { 
            background-color: #f9f9f9; 
        }
        footer {
            position: fixed;
            bottom: -20px;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 10px;
            border-top: 1px solid #000;
            padding-top: 5px;
        }
    </style>
</head>
<body>

<header>
    <h1>Consultorio Odontológico Perfect Smile</h1>
    <p>Reporte de Pacientes Atendidos</p>
</header>

<h2>Odontólogo: Dr(a). {{ $odontologo->nombre_p }} {{ $odontologo->nombre_s }} {{ $odontologo->apellido_p }} {{ $odontologo->apellido_s }}</h2>

<table>
    <thead>
        <tr>
            <th>Paciente</th>
            <th>Fecha</th>
            <th>Tratamiento</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pacientes as $p)
            <tr>
                <td>{{ $p->nombre_completo }}</td>
                <td>{{ \Carbon\Carbon::parse($p->fecha)->format('d/m/Y') }}</td>
                <td>{{ $p->tipo_tratamiento }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<footer>
    Generado automáticamente el {{ \Carbon\Carbon::now()->format('d/m/Y H:i') }} - Sistema de Reportes Perfect Smile
</footer>

</body>
</html>
