<?php

namespace App\Http\Controllers;

use App\Models\historial_clinico;
use App\Models\paciente;
use App\Models\usuario;
use Illuminate\Http\Request;

class historialClinicoControlador extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $paciente = Paciente::findOrFail($id);

        // Cargar historial del paciente ordenado por fecha descendente
        $historiales = Historial_Clinico::where('paciente_id', $id)
            ->with('odontologo')
            ->orderBy('fecha', 'desc')
            ->get();

        // Odontólogos
        $odontologos = Usuario::where('rol', 'Odontólogo')->get();

        return view('historialClinico/indexHistorialClinico', compact('paciente', 'historiales', 'odontologos'));
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
        // Validación de los datos
        $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'odontologo' => 'required|string|max:100',
            'fecha' => 'required|date',
            'motivo_consulta' => 'nullable|string',
            'diagnostico' => 'nullable|string',
            'tratamiento' => 'nullable|string',
            'observaciones' => 'nullable|string',
            'pieza_dental' => 'nullable|string|max:20',
            'tipo_tratamiento' => 'nullable|string|max:100',
        ]);

        // Crear nueva historia clínica
        $historial = new Historial_Clinico();
        $historial->paciente_id = $request->paciente_id;
        $historial->odontologo = $request->odontologo;
        $historial->fecha = $request->fecha;
        $historial->motivo_consulta = $request->motivo_consulta;
        $historial->diagnostico = $request->diagnostico;
        $historial->tratamiento = $request->tratamiento;
        $historial->observaciones = $request->observaciones;
        $historial->pieza_dental = $request->pieza_dental;
        $historial->tipo_tratamiento = $request->tipo_tratamiento;
        $historial->save();

        // Redirigir con mensaje
        return redirect()->back()->with('success', 'Historia clínica registrada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(historial_clinico $historial_clinico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(historial_clinico $historial_clinico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, historial_clinico $historial_clinico)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(historial_clinico $historial_clinico)
    {
        //
    }
}
