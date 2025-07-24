<?php

namespace App\Http\Controllers;

use App\Models\usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class loginControlador extends Controller
{
    
    public function verificacionLogin(Request $req){
        
        $req -> validate ([
            'usuario' => 'required|min:3',
            'contrasenia' => 'required|min:8'
        ]);

        $usuario = usuario::where('usuario', $req -> usuario) -> first();

        /*if($usuario && Hash::check($req->contrasenia, $usuario->contrasenia)){

            session()->put([
                'id' => $usuario -> id,
                'nombre_p' => $usuario -> nombre_p,
                'apellido_p' => $usuario -> apellido_p
            ]);

            return redirect()->route('loginExitoso');
        } */

        if($usuario && $req->contrasenia == $usuario->contrasenia || $usuario && Hash::check($req->contrasenia, $usuario->contrasenia)){

            session()->put([
                'id' => $usuario -> id,
                'nombre_p' => $usuario -> nombre_p,
                'apellido_p' => $usuario -> apellido_p
            ]);

            return redirect()->route('loginExitoso');
        } 

        return back()->withErrors(['usuario' => 'Credenciales incorrectas'])->withInput();

    }

    public function cerrarSesion(){

        session()->forget([
            'id',
            'nombre_p',
            'apellido_p'
        ]);

        return redirect()->route('login');

    }

}
