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
    public function index($id_paciente)
    {
        $paciente = Paciente::findOrFail($id_paciente);

        $historiales = Historial_Clinico::where('id_paciente', $id_paciente)
            ->where('estado', 'Activo') 
            ->orderBy('fecha', 'desc')
            ->paginate(10);

        // Odontólogos
        $odontologos = Usuario::where('rol', 'Odontólogo')->where('estado', 'Activo')->get();

        return view('historialClinico.indexHistorialClinico', compact('paciente', 'historiales', 'odontologos'));
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
        $request->validate([
            'id_paciente' => 'required|exists:pacientes,id_paciente',
            'fecha' => 'required|date',
            'motivo_consulta' => 'nullable|string',
            'diagnostico' => 'nullable|string',
            'observaciones' => 'nullable|string',
            'pieza_dental' => 'nullable|string|max:20',
            'tipo_tratamiento' => 'nullable|string|max:100',
            'odontologo' => 'required|string|max:100',
        ]);

        $historial = new Historial_Clinico();
        $historial->id_paciente = $request->id_paciente;
        $historial->odontologo = $request->odontologo;
        $historial->fecha = $request->fecha;
        $historial->motivo_consulta = $request->motivo_consulta;
        $historial->diagnostico = $request->diagnostico;
        $historial->observaciones = $request->observaciones;
        $historial->pieza_dental = $request->pieza_dental;
        $historial->tipo_tratamiento = $request->tipo_tratamiento;
        $historial->estado = 'Activo';

        $historial->save();

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

    public function update(Request $request)
    {
        $historial = historial_clinico::findOrFail($request->id_historial_clinico);

        $historial->pieza_dental = $request->pieza_dental;
        $historial->tipo_tratamiento = $request->tipo_tratamiento;
        $historial->motivo_consulta = $request->motivo_consulta;
        $historial->observaciones = $request->observaciones;

        $historial->save();

        return redirect()->back()->with('success', 'Historial actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $historial = historial_clinico::findOrFail($request->id_historial_clinico);

        // Eliminación lógica
        $historial->estado = 'Eliminado';
        $historial->save();

        return redirect()->back()->with('success', 'Historial clínico eliminado correctamente.');
    }
}
