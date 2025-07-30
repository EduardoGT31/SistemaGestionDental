<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class citas extends Model
{
    protected $table = 'citas';
    protected $primaryKey = 'id_cita';
    public $timestamps = true;

    protected $fillable = [
        'id_paciente',
        'id_usuario',
        'odontologo',
        'fecha',
        'hora',
        'estado',
    ];

    public function paciente()
    {
        // tercer parámetro: clave primaria de la tabla pacientes
        return $this->belongsTo(Paciente::class, 'id_paciente', 'id_paciente');
    }

    public function usuario()
    {
        // si la tabla usuarios tiene clave primaria diferente de 'id', ponla aquí también
        return $this->belongsTo(Usuario::class, 'id_usuario', 'id_usuario');
    }
}
