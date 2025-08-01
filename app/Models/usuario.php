<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios';
    
    protected $primaryKey = 'id_usuario';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'cedula',
        'nombre_p',
        'nombre_s',
        'apellido_p',
        'apellido_s',
        'usuario',
        'contrasenia',
        'telefono',
        'correo',
        'rol',
        'estado',
    ];
    
}
