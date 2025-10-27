<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ejecutar los cambios en la base de datos.
     */
    public function up(): void
    {
        Schema::table('equipos', function (Blueprint $table) {
            $table->string('tipo_conexion', 60)->nullable()->after('tecnologia_memoria');
            $table->string('nodo', 60)->nullable()->after('tipo_conexion');
            $table->string('mac', 60)->nullable()->after('nodo');
            $table->string('sisipo', 60)->nullable()->after('mac');
        });
    }

    /**
     * Revertir los cambios.
     */
    public function down(): void
    {
        Schema::table('equipos', function (Blueprint $table) {
            $table->dropColumn(['tipo_conexion', 'nodo', 'mac', 'sisipo']);
        });
    }
};
