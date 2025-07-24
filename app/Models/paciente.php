<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paciente extends Model
{
    use HasFactory;

    protected $table = 'pacientes';

    protected $fillable = [
        'cedula',
        'nombre_p',
        'nombre_s',
        'apellido_p',
        'apellido_s',
        'genero',
        'fecha_nacimiento',
        'telefono',
        'direccion'
    ];
}
