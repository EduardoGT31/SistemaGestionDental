<?php

namespace App\Http\Controllers;

use App\Models\usuario;
use Illuminate\Http\Request;

class usuarioControlador extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /*
    
    public function index()
    {
        $usuarios = Usuario::paginate(10); // Muestra 10 por página
        //$usuarios = usuario::all();
        return view('usuario/indexUsuario', compact('usuarios'));
    }*/

    public function index(Request $request)
    {
        $buscar = $request->input('buscar');

        $buscar = strtolower($request->input('buscar'));

        $usuarios = Usuario::when($buscar, function ($query, $buscar) {
            $query->whereRaw('LOWER(nombre_p) LIKE ?', ["%$buscar%"])
                ->orWhereRaw('LOWER(apellido_p) LIKE ?', ["%$buscar%"])
                ->orWhereRaw('LOWER(usuario) LIKE ?', ["%$buscar%"])
                ->orWhereRaw('LOWER(cedula) LIKE ?', ["%$buscar%"]);
        })
            ->orderBy('updated_at', 'desc')
            ->paginate(10);;

        return view('usuario/indexUsuario', compact('usuarios'));
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
        $validatedData = $request->validate([
            'cedula'      => 'required|string|max:13|unique:usuarios,cedula',
            'nombre_p'    => 'required|string|max:60',
            'nombre_s'    => 'nullable|string|max:60',
            'apellido_p'  => 'required|string|max:60',
            'apellido_s'  => 'nullable|string|max:60',
            'usuario'     => 'required|string|max:60|unique:usuarios,usuario',
            'contrasenia' => 'required|string|min:6',
            'telefono'    => 'required|string|max:20',
            'correo'      => 'required|string|max:100|unique:usuarios,correo',
            'rol'         => 'required|string|in:Secretaria,Odontólogo,Administrador',
        ]);

        // Encriptar contraseña antes de guardar
        $validatedData['contrasenia'] = bcrypt($validatedData['contrasenia']);

        Usuario::create($validatedData);

        return redirect()->route('indexUsuarios')->with('success', 'Usuario creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, usuario $usuario)
    {
        $usuario = Usuario::findOrFail($request->id_usuario);

        // Valida y actualiza los datos
        $usuario->cedula = $request->cedula;
        $usuario->nombre_p = $request->nombre_p;
        $usuario->nombre_s = $request->nombre_s;
        $usuario->apellido_p = $request->apellido_p;
        $usuario->apellido_s = $request->apellido_s;
        $usuario->usuario = $request->usuario;
        $usuario->telefono = $request->telefono;
        $usuario->correo = $request->correo;
        $usuario->rol = $request->rol;

        $usuario->save();

        return redirect()->back()->with('success', 'Usuario actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, usuario $usuario)
    {
        $usuario = Usuario::findOrFail($request->id_usuario);

        $usuario->delete();

        return redirect()->route('indexUsuarios');
    }

    /**
     * ResetPassword
     */
    public function resetPassword(Request $request, usuario $usuario)
    {
        $request->validate([
            'contrasenia' => 'required|string|min:8',
        ]);

        $usuario = Usuario::findOrFail($request->id_usuario);
        $usuario->contrasenia = bcrypt($request->contrasenia);
        $usuario->save();

        return redirect()->route('indexUsuarios');
    }
}
