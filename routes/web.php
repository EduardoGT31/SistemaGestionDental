<?php

use App\Http\Controllers\loginControlador;
use App\Http\Controllers\usuarioControlador;
use App\Http\Controllers\pacienteControlador;
use App\Http\Controllers\historialClinicoControlador;
use Illuminate\Support\Facades\Route;

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
})->name('inicioAdmin');

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
Route::get('/medical_history/{id}', [historialClinicoControlador::class, 'index'])->name('indexHistorialClinico');
Route::post('/medical_history/{id}/store', [historialClinicoControlador::class, 'store'])->name('storeHistorialClinico');

//Route::middleware(['auth'])->group(function () {});
