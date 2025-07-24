<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class historial_clinico extends Model
{
    use HasFactory;

    protected $table = 'historial_clinicos';

    protected $fillable = [
        'paciente_id',
        'usuario_id',
        'fecha',
        'motivo_consulta',
        'diagnostico',
        'tratamiento',
        'observaciones',
        'pieza_dental',
        'tipo_tratamiento',
    ];

    // Relación: un historial pertenece a un paciente
    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    // Relación: un historial fue creado por un usuario (odontólogo)
    public function odontologo()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
}
