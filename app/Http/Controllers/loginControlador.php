<?php

namespace App\Http\Controllers;

use App\Models\usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class loginControlador extends Controller
{

    /*public function verificacionLogin(Request $req)
    {

        $req->validate([
            'usuario' => 'required|min:3',
            'contrasenia' => 'required|min:8'
        ]);

        $usuario = usuario::where('usuario', $req->usuario)->first();

        /*if($usuario && Hash::check($req->contrasenia, $usuario->contrasenia)){

            session()->put([
                'id' => $usuario -> id,
                'nombre_p' => $usuario -> nombre_p,
                'apellido_p' => $usuario -> apellido_p
            ]);

            return redirect()->route('loginExitoso');
        } -

        if ($usuario && $req->contrasenia == $usuario->contrasenia || $usuario && Hash::check($req->contrasenia, $usuario->contrasenia)) {

            session()->put([
                'id' => $usuario->id,
                'nombre_p' => $usuario->nombre_p,
                'apellido_p' => $usuario->apellido_p
            ]);

            return redirect()->route('loginExitoso');
        }

        return back()->withErrors(['usuario' => 'Credenciales incorrectas'])->withInput();
    }*/

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
}
