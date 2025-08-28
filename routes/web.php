<?php

use App\Http\Controllers\loginControlador;
use App\Http\Controllers\usuarioControlador;
use App\Http\Controllers\pacienteControlador;
use App\Http\Controllers\historialClinicoControlador;
use App\Http\Controllers\citasControlador;
use App\Http\Controllers\reporteControlador;
use Illuminate\Support\Facades\Route;

// Ruta para mostrar formulario login (pública)
Route::get('/', function () {
    return view('login');
})->name('login');

// Ruta POST para procesar login y redirigir según rol
Route::post('/dashboard', [loginControlador::class, 'verificacionLogin'])->name('loginExitoso');

// Ruta para cerrar sesión
Route::get('/logout', [loginControlador::class, 'cerrarSesion'])->name('cerrarSesion');


// Rutas protegidas para cada rol con control manual de sesión y rol

// Dashboard Admin
Route::get('/dashboard/admin', function () {
    if (!session()->has('id') || session('rol') !== 'Administrador') {
        return redirect()->route('login')->with('error', 'Acceso no autorizado');
    }
    return view('dashboard.menuPrincipalAdmin');
})->name('inicioAdmin');

// Dashboard Odontólogo
Route::get('/dashboard/odontologo', function () {
    if (!session()->has('id') || session('rol') !== 'Odontólogo') {
        return redirect()->route('login')->with('error', 'Acceso no autorizado');
    }
    return view('dashboard.menuPrincipalOdontologo');
})->name('inicioOdontologo');

// Dashboard Secretaria
Route::get('/dashboard/secretaria', function () {
    if (!session()->has('id') || session('rol') !== 'Secretaria') {
        return redirect()->route('login')->with('error', 'Acceso no autorizado');
    }
    return view('dashboard.menuPrincipalSecretaria');
})->name('inicioSecretaria');


/*
//Login
Route::get('/', function () {
    return view('login');
})->name('login');

//Verficacion de credenciales Login
Route::post('/dashboard', [loginControlador::class, 'verificacionLogin'])->name('loginExitoso');

//Cerrar Sesion
Route::get('/logout', [loginControlador::class, 'cerrarSesion'])->name('cerrarSesion');

//Inicio Admin
Route::get('/dashboard', function () {
    return view('dashboard/menuPrincipalAdmin');
})->name('inicioAdmin');*/

//Recuperacion
// Ruta para mostrar el formulario de ingreso de correo
Route::get('/recuperar', [LoginControlador::class, 'formCorreo'])->name('recuperar');

// Ruta que verifica si el correo existe y el usuario está activo
Route::get('/recuperar', [LoginControlador::class, 'mostrarFormulario'])->name('recuperar.formulario');
Route::post('/recuperar/verificar', [LoginControlador::class, 'verificarCorreo'])->name('recuperar.verificar');
Route::post('/recuperar/actualizar', [LoginControlador::class, 'actualizar'])->name('recuperar.actualizar');

//Usuarios
Route::get('/users', [usuarioControlador::class, 'index'])->name('indexUsuarios');
Route::post('/users/store', [usuarioControlador::class, 'store'])->name('crearUsuario');
Route::put('/user/update', [usuarioControlador::class, 'update'])->name('editarUsuario');
Route::delete('/user/delete', [usuarioControlador::class, 'destroy'])->name('eliminarUsuario');
Route::put('/user/reset', [usuarioControlador::class, 'resetPassword'])->name('resetearUsuario');

//Paciente
Route::get('/patients', [pacienteControlador::class, 'index'])->name('indexPaciente');
Route::post('/patients/store', [pacienteControlador::class, 'store'])->name('crearPaciente');
Route::put('/patients/update', [pacienteControlador::class, 'update'])->name('editarPaciente');
Route::delete('/patients/delete', [pacienteControlador::class, 'destroy'])->name('eliminarPaciente');

//Historial Clinico
Route::get('/medical_history/{id_paciente}', [historialClinicoControlador::class, 'index'])->name('indexHistorialClinico');
Route::post('/medical_history/{id_paciente}/store', [historialClinicoControlador::class, 'store'])->name('storeHistorialClinico');
Route::put('/medical_history/{id_paciente}/update', [historialClinicoControlador::class, 'update'])->name('updateHistorialClinico');
Route::delete('/medical_history/delete', [HistorialClinicoControlador::class, 'destroy'])->name('deleteHistorialClinico');

//Citas
Route::get('/citas', [citasControlador::class, 'index'])->name('indexCitas');
Route::get('/buscar-paciente', [citasControlador::class, 'buscarPacientePorCedula'])->name('buscarPaciente');
Route::post('/citas/guardar', [citasControlador::class, 'store'])->name('storeCitas');
Route::put('/citas/update', [citasControlador::class, 'update'])->name('updateCitas');
Route::delete('/citas/delete', [citasControlador::class, 'destroy'])->name('destroyCitas');
Route::put('/citas/cambiar-estado', [citasControlador::class, 'cambiarEstado'])->name('cambiarEstadoCita');

//Calendario
Route::get('/citas/calendario', [CitasControlador::class, 'verCalendario'])->name('calendarioCitas');

//Reportes
Route::get('/report', [reporteControlador::class, 'index'])->name('indexReporte');
Route::get('/reportes/historial-por-paciente', [reporteControlador::class, 'vistaHistorialPorPaciente'])->name('reporte.HistorialPaciente');
Route::get('/reportes/historial/{id}/pdf', [ReporteControlador::class, 'generarHistorialPDF'])->name('reportes.historial.pdf');

// Vista del formulario para elegir odontólogo
Route::get('/reportes/por-odontologo', [reporteControlador::class, 'vistaPorOdontologo'])->name('reportes.vistaPorOdontologo');
Route::post('/reportes/por-odontologo/pdf', [reporteControlador::class, 'generarPorOdontologo'])->name('reportes.generarPorOdontologo');
Route::get('/reportes/citas-hoy', [reporteControlador::class, 'citasHoy'])->name('reportes.citas.hoy');


//Pruebas
/*Route::get('/citas/calendario', [citasControlador::class, 'calendario'])->name('citas.calendario');
Route::get('/pacientes/buscar', [citasControlador::class, 'buscar']);*/

