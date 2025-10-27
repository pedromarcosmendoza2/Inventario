<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('empleados', function (Blueprint $table) {
            // Cambiar id a id_empleado (opcional, ver nota abajo)
            $table->renameColumn('id', 'id_empleado');

            // Agregar columnas
            $table->string('nombre', 60);
            $table->string('apellido_paterno', 60)->nullable();
            $table->string('apellido_materno', 60)->nullable();
            $table->string('cargo', 100)->nullable();
            $table->string('piso', 100)->nullable();
            $table->string('departamento', 100)->nullable();
            $table->string('seccion', 100)->nullable();
            $table->string('extension', 20)->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('empleados', function (Blueprint $table) {
            // Revertir cambios
            $table->dropColumn([
                'nombre',
                'apellido_paterno',
                'apellido_materno',
                'cargo',
                'piso',
                'departamento',
                'seccion',
                'extension',
            ]);

            $table->renameColumn('id_empleado', 'id');
        });
    }
};
