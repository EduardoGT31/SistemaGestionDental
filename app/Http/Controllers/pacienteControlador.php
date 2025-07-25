<?php

namespace App\Http\Controllers;

use App\Models\paciente;
use Illuminate\Http\Request;

class pacienteControlador extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $buscar = $request->input('buscar');

        $buscar = strtolower($request->input('buscar'));

        $pacientes = Paciente::when($buscar, function ($query, $buscar) {
            $query->whereRaw('LOWER(nombre_p) LIKE ?', ["%$buscar%"])
                ->orWhereRaw('LOWER(apellido_p) LIKE ?', ["%$buscar%"])
                ->orWhereRaw('LOWER(telefono) LIKE ?', ["%$buscar%"])
                ->orWhereRaw('LOWER(cedula) LIKE ?', ["%$buscar%"]);
        })
            ->orderBy('updated_at', 'desc')
            ->paginate(10);;

        return view('paciente/indexPaciente', compact('pacientes'));
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
        // Validación
        $validatedData = $request->validate([
            'cedula' => 'required|max:13|unique:pacientes,cedula',
            'nombre_p' => 'required|string|max:60',
            'nombre_s' => 'nullable|string|max:60',
            'apellido_p' => 'required|string|max:60',
            'apellido_s' => 'nullable|string|max:60',
            'genero' => 'required|in:Masculino,Femenino',
            'fecha_nacimiento' => 'required|date',
            'telefono' => 'required|string|max:10',
            'direccion' => 'nullable|string|max:255',
        ]);

        // Crear nuevo paciente
        Paciente::create($validatedData);

        // Redirigir con mensaje
        return redirect()->back()->with('success', 'Paciente registrado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(paciente $paciente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(paciente $paciente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, paciente $paciente)
    {
        // Validacion
        $request->validate([
            'id_paciente' => 'required|exists:pacientes,id_paciente',
            'cedula' => 'nullable|string|max:13',
            'nombre_p' => 'required|string|max:60',
            'nombre_s' => 'nullable|string|max:60',
            'apellido_p' => 'required|string|max:60',
            'apellido_s' => 'nullable|string|max:60',
            'genero' => 'required|string|in:Masculino,Femenino',
            'fecha_nacimiento' => 'required|date',
            'telefono' => 'required|string|max:10',
            'direccion' => 'nullable|string|max:255',
        ]);

        $paciente = Paciente::findOrFail($request->id_paciente);

        // Actualizar campos
        $paciente->cedula = $request->cedula;
        $paciente->nombre_p = $request->nombre_p;
        $paciente->nombre_s = $request->nombre_s;
        $paciente->apellido_p = $request->apellido_p;
        $paciente->apellido_s = $request->apellido_s;
        $paciente->genero = $request->genero;
        $paciente->fecha_nacimiento = $request->fecha_nacimiento;
        $paciente->telefono = $request->telefono;
        $paciente->direccion = $request->direccion;

        // Guardar
        $paciente->save();

        // Redireccionar con mensaje
        return redirect()->back()->with('success', 'Paciente actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Paciente $paciente)
    {
        $paciente = Paciente::findOrFail($request->id_paciente);

        $paciente->delete();

        return redirect()->route('indexPaciente');
    }
}
