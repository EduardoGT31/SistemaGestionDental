<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('historial_clinicos', function (Blueprint $table) {

            $table->id('id_historial_clinico');

            // Relaciones
            $table->unsignedBigInteger('id_paciente');

            // Información médica
            $table->date('fecha')->nullable();
            $table->text('motivo_consulta')->nullable();
            $table->string('odontologo')->nullable();
            $table->text('diagnostico')->nullable();
            $table->text('observaciones')->nullable();
            $table->string('pieza_dental')->nullable();
            $table->string('tipo_tratamiento')->nullable();
            $table->string('estado');

            $table->timestamps();

            // Claves foráneas
            $table->foreign('id_paciente')->references('id_paciente')->on('pacientes')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial_clinicos');
    }
};
