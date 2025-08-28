<?php

namespace App\Http\Controllers;

use App\Models\reporte;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\paciente;
use App\Models\usuario;
use App\Models\historial_clinico;
use App\Models\citas;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class reporteControlador extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('reportes.indexReportes');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(reporte $reporte)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(reporte $reporte)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, reporte $reporte)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(reporte $reporte)
    {
        //
    }

    public function vistaHistorialPorPaciente()
    {
        $pacientes = Paciente::where('estado', 'Activo')->paginate(10);
        return view('reportes.historialPorPaciente', compact('pacientes'));
    }


    public function generarHistorialPDF($id)
    {
        $paciente = Paciente::findOrFail($id);
        $historiales = Historial_Clinico::where('id_paciente', $id)->get();

        $nombreCompleto = "{$paciente->nombre_p} {$paciente->nombre_s} {$paciente->apellido_p} {$paciente->apellido_s}";

        Reporte::create([
            'tipo_reporte' => "Historial clínico de $nombreCompleto",
            'id_usuario' => session('id'),
            'generado_el' => now(),
        ]);

        $pdf = Pdf::loadView('reportes.pdf.pdfHistorialPaciente', compact('paciente', 'historiales'));
        return $pdf->stream("historial_{$paciente->apellido_p}_{$paciente->nombre_p}.pdf");
    }


    public function historialPorPacientePDF($id_paciente)
    {
        $paciente = Paciente::findOrFail($id_paciente);
        $historiales = Historial_Clinico::where('id_paciente', $id_paciente)
            ->where('estado', 'Activo') // si usas eliminación lógica
            ->orderBy('fecha', 'desc')
            ->get();

        $pdf = Pdf::loadView('reportes.pdf.pdfHistorialPaciente', compact('paciente', 'historiales'));
        return $pdf->stream('historial_' . $paciente->cedula . '.pdf');
    }

    public function vistaPorOdontologo()
    {
        // Supongo que tus odontólogos están en la tabla usuarios con rol "Odontólogo"
        $odontologos = Usuario::where('rol', 'Odontólogo')->get();

        return view('reportes.pacientePorOdontologo', compact('odontologos'));
    }

    // Generar el PDF con los pacientes de ese odontólogo
    public function generarPorOdontologo(Request $request)
    {
        $idOdontologo = $request->input('id_odontologo');

        $odontologo = Usuario::find($idOdontologo);

        if (!$odontologo) {
            return back()->with('error', 'Odontólogo no encontrado');
        }

        $nombreCompleto = $odontologo->nombre_p . ' ' .
            $odontologo->nombre_s . ' ' .
            $odontologo->apellido_p . ' ' .
            $odontologo->apellido_s;

        $pacientes = DB::table('historial_clinicos AS h')
            ->join('pacientes AS p', 'h.id_paciente', '=', 'p.id_paciente')
            ->where('h.odontologo', $nombreCompleto)
            ->select(
                DB::raw("p.nombre_p || ' ' || p.nombre_s || ' ' || p.apellido_p || ' ' || p.apellido_s AS nombre_completo"),
                'h.tipo_tratamiento',
                'h.fecha'
            )
            ->get();

        $pdf = Pdf::loadView('reportes.pdf.pdfPacientesPorOdontologo', compact('pacientes', 'odontologo'));

        Reporte::create([
            'tipo_reporte' => 'Historial por odontólogo',
            'id_usuario' => $idOdontologo,
        ]);

        return $pdf->stream('reporte-odontologo.pdf');
    }

    // Generar PDF de citas de hoy
    public function citasHoy(Request $request)
    {
        $idOdontologo = $request->input('id_odontologo');

        $odontologo = Usuario::find($idOdontologo);

        // Fecha actual
        $hoy = Carbon::now('America/Guayaquil')->toDateString();

        $citas = DB::table('citas as c')
            ->join('pacientes as p', 'p.id_paciente', '=', 'c.id_paciente')
            ->select(
                DB::raw("p.nombre_p || ' ' || p.nombre_s || ' ' || p.apellido_p || ' ' || p.apellido_s AS nombre_completo"),
                'c.fecha',
                'c.hora',
                'c.odontologo'
            )
            ->whereDate('c.fecha', $hoy)
            ->get();

        // Generar PDF
        $pdf = Pdf::loadView('reportes.pdf.pdfCitasHoy', compact('citas', 'hoy'));

        // Guardar registro en la tabla reportes
        Reporte::create([
            'tipo_reporte' => 'Citas del día',
            'id_usuario' => session('id'), 
            'generado_el' => now(),// Guarda el usuario logueado que generó el reporte
        ]);

        // Abrir en nueva pestaña
        return $pdf->stream('Citas_Hoy.pdf');
    }
}
