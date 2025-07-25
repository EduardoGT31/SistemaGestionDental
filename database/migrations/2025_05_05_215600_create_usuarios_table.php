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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->bigIncrements('id_usuario');
            $table->string('cedula', 13)->nullable(false);
            $table->string('nombre_p', 60)->nullable(false);
            $table->string('nombre_s', 60)->nullable(false);
            $table->string('apellido_p', 60)->nullable(false);
            $table->string('apellido_s', 60)->nullable(false);
            $table->string('usuario')->unique()->nullable(false);
            $table->string('contrasenia')->nullable(false);
            $table->string('telefono', 10)->nullable(false);
            $table->string('correo', 100)->nullable(false);
            $table->string('rol', 60)->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
