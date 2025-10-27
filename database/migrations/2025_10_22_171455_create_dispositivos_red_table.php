<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('dispositivos_red', function (Blueprint $table) {
            $table->id('id_dispositivo'); // Clave primaria personalizada
            $table->string('tipo', 50)->nullable();
            $table->string('marca', 50)->nullable();
            $table->string('modelo', 50)->nullable();
            $table->string('numero_serie', 100)->nullable();
            $table->string('direccion_ip', 15)->nullable();
            $table->string('estado', 50)->default('Activo');
            $table->string('piso', 100)->nullable();
            $table->string('departamento', 100)->nullable();
            $table->string('seccion', 100)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dispositivos_red');
    }
};
