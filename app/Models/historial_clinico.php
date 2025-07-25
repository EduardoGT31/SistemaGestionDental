<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class historial_clinico extends Model
{
    use HasFactory;

    protected $table = 'historial_clinicos';

    protected $primaryKey = 'id_historial_clinico';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'id_paciente',
        'odontologo',
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
        return $this->belongsTo(Paciente::class, 'id_paciente', 'id_paciente');
    }

}
