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
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('cedula', 13)->nullable(true);
            $table->string('nombre_p', 60)->nullable(true);
            $table->string('nombre_s', 60)->nullable(true);
            $table->string('apellido_p', 60)->nullable(true);
            $table->string('apellido_s', 60)->nullable(true);
            $table->string('genero', 30)->nullable(true);
            $table->date('fecha_nacimiento')->nullable(true);
            $table->string('telefono', 10);
            $table->string('direccion', 100)->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};
