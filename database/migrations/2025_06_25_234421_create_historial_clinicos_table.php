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

            $table->bigIncrements('id_historial_clinico');

            // Relaciones
            $table->unsignedBigInteger('id_paciente');

            // Información médica
            $table->date('fecha')->nullable();
            $table->text('motivo_consulta')->nullable();
            $table->text('diagnostico')->nullable();
            $table->text('tratamiento')->nullable();
            $table->text('observaciones')->nullable();

            // Información odontológica opcional
            $table->string('pieza_dental')->nullable();
            $table->string('tipo_tratamiento')->nullable();

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
