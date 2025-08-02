<?php

namespace App\Http\Controllers;

use App\Models\usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class loginControlador extends Controller
{
    public function verificacionLogin(Request $req)
    {
        $req->validate([
            'usuario' => 'required|min:3',
            'contrasenia' => 'required|min:8'
        ]);

        $usuario = usuario::where('usuario', $req->usuario)->first();

        if ($usuario && ($req->contrasenia == $usuario->contrasenia || Hash::check($req->contrasenia, $usuario->contrasenia))) {
            // Guardar datos en sesión, incluido el rol
            session()->put([
                'id' => $usuario->id_usuario,
                'nombre_p' => $usuario->nombre_p,
                'apellido_p' => $usuario->apellido_p,
                'rol' => $usuario->rol
            ]);

            //dd('ROL DEL USUARIO: ' . $usuario->rol);
            //dd(session()->all());

            // Redirigir según el rol
            if ($usuario->rol === 'Administrador') {
                return redirect()->route('inicioAdmin');
            } elseif ($usuario->rol === 'Odontólogo') {
                return redirect()->route('inicioOdontologo');
            } elseif ($usuario->rol === 'Secretaria') {
                return redirect()->route('inicioSecretaria');
            } else {
                // Rol no esperado, opcional redirigir a login con error
                session()->flush();
                return redirect()->route('login')->withErrors(['usuario' => 'Rol no autorizado']);
            }
        }

        return back()->withErrors(['usuario' => 'Credenciales incorrectas'])->withInput();
    }

    public function cerrarSesion()
    {

        session()->forget([
            'id',
            'nombre_p',
            'apellido_p'
        ]);

        return redirect()->route('login');
    }


    //Recuperacion
    public function mostrarFormulario()
    {
        return view('auth.recuperarCorreo');
    }

    public function verificarCorreo(Request $request)
    {
        $request->validate([
            'correo' => 'required|email',
            'opcion' => 'required|in:usuario,contrasenia'
        ]);

        $usuario = Usuario::where('correo', $request->correo)->first();

        if (!$usuario) {
            return back()->with('error', 'Correo no encontrado');
        }

        return view('auth.recuperarUsuarioContrasenia', [
            'usuario' => $usuario,
            'opcion' => $request->opcion
        ]);
    }

    public function actualizar(Request $request)
    {
        $usuario = Usuario::findOrFail($request->id_usuario);

        if ($request->filled('nuevo_usuario')) {
            $request->validate(['nuevo_usuario' => 'required|string|max:60|unique:usuarios,usuario']);
            $usuario->usuario = $request->nuevo_usuario;
        }

        if ($request->filled('nueva_contrasenia')) {
            $request->validate([
                'nueva_contrasenia' => 'required|string|min:6',
                'confirmar_contrasenia' => 'required|same:nueva_contrasenia'
            ]);
            $usuario->contrasenia = bcrypt($request->nueva_contrasenia);
        }

        $usuario->save();

        return redirect()->route('login')->with('success', 'Datos actualizados correctamente.');
    }
}
