<?php

namespace App\Http\Controllers;

use App\Models\citas;
use App\Models\usuario;
use App\Models\paciente;
use Illuminate\Http\Request;

class citasControlador extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $cedulaPaciente = $request->input('cedula');
        $fecha = $request->input('fecha');

        $citas = Citas::with('paciente', 'usuario')
            ->where('estado', '!=', 'Eliminada')
            ->when($cedulaPaciente, function ($query) use ($cedulaPaciente) {
                $query->whereHas('paciente', function ($q) use ($cedulaPaciente) {
                    $q->where('cedula', 'like', "%{$cedulaPaciente}%");
                });
            })
            ->when($fecha, function ($query) use ($fecha) {
                $query->whereDate('fecha', $fecha);
            })
            ->orderBy('updated_at', 'desc')
            ->paginate(10);

        $pacientes = Paciente::all();
        $odontologos = Usuario::where('rol', 'Odontólogo')->get();

        return view('citas/indexCitas', compact('citas', 'pacientes', 'odontologos'));
    }

    public function buscarPacientePorCedula(Request $request)
    {
        $cedula = $request->input('cedula');
        $paciente = Paciente::where('cedula', $cedula)->first();

        if ($paciente) {
            return response()->json([
                'existe' => true,
                'paciente' => $paciente
            ]);
        } else {
            return response()->json([
                'existe' => false
            ]);
        }
    }

    //Calendario
    public function verCalendario()
    {
        $citas = Citas::with('paciente')->where('estado', '!=', 'Eliminada')->get();

        $eventos = $citas->map(function ($cita) {
            // Definir el color según el estado
            $color = match ($cita->estado) {
                'Pendiente' => '#f39c12',   // Naranja
                'Confirmada' => '#28a745',  // Verde
                'Cancelada' => '#dc3545',   // Rojo
                default => '#6c757d',       // Gris (para cualquier otro estado)
            };

            return [
                'title' => $cita->odontologo . ' - ' . $cita->paciente->nombre_p . ' ' . $cita->paciente->apellido_p,
                'start' => $cita->fecha . 'T' . $cita->hora,
                'color' => $color,

                // Propiedades para el modal
                'paciente' => $cita->paciente->nombre_p . ' ' . $cita->paciente->apellido_p,
                'odontologo' => $cita->odontologo,
                'fecha' => $cita->fecha,
                'hora' => $cita->hora,
                'estado' => $cita->estado,
            ];
        });

        return view('citas/calendarioCitas', ['eventos' => $eventos]);
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

        //dd('Llegó al método store', $request->all());

        $request->validate([
            'cedulaPaciente' => 'required|string|exists:pacientes,cedula',
            'id_paciente' => 'required|integer|exists:pacientes,id_paciente',
            'id_usuario' => 'required|integer|exists:usuarios,id_usuario',
            'odontologo' => 'required|string',
            'fecha' => 'required|date',
            'hora' => 'required',
        ]);

        Citas::create([
            'id_paciente' => $request->id_paciente,
            'id_usuario' => $request->id_usuario,
            'odontologo' => $request->odontologo,
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'estado' => 'Pendiente' // <-- Fijamos siempre este valor
        ]);

        return redirect()->back()->with('success', 'Cita agendada correctamente.');
    }

    public function cambiarEstado(Request $request)
    {
        $cita = Citas::findOrFail($request->input('id_cita'));
        $cita->estado = $request->input('estado');
        $cita->save();

        return redirect()->route('indexCitas')->with('success', 'Estado actualizado correctamente.');
    }


    /**
     * Display the specified resource.
     */
    public function show(citas $citas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(citas $citas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, citas $citas)
    {

        //dd($request->all());

        // Validar los datos del formulario
        $request->validate([
            'id_paciente' => 'required|integer|exists:pacientes,id_paciente',
            'id_usuario' => 'required|integer|exists:usuarios,id_usuario',
            'odontologo' => 'required|string',
            'fecha' => 'required|date',
            'hora' => 'required',
            'estado' => 'required|string|in:Pendiente,Confirmada,Cancelada,Atendida'
        ]);

        // Buscar la cita por ID
        $citas = Citas::findOrFail($request->id_cita);

        // Actualizar los datos
        $citas->update([
            'id_paciente' => $request->id_paciente,
            'id_usuario' => $request->id_usuario,
            'odontologo' => $request->odontologo,
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'estado' => 'Pendiente',
        ]);

        // Redirigir con mensaje de éxito
        return redirect()->back()->with('success', 'Cita actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Citas $cita)
    {

        $cita = Citas::findOrFail($request->id_cita);
        $cita->estado = 'Eliminada';
        $cita->save();

        return redirect()->route('indexCitas');
    }
}
