<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConnectionFieldsToEmpleadosTable extends Migration
{
    public function up()
    {
        Schema::table('empleados', function (Blueprint $table) {
            $table->string('tipo_conexion', 50)->nullable();
            $table->string('nodo', 60)->nullable();
            $table->string('mac', 60)->nullable();
            $table->string('sisipo', 60)->nullable();
        });
    }

    public function down()
    {
        Schema::table('empleados', function (Blueprint $table) {
            $table->dropColumn(['tipo_conexion', 'nodo', 'mac', 'sisipo']);
        });
    }
}
