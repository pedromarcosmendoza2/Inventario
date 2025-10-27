<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNodoMacSisipoToImpresorasTable extends Migration
{
    /**
     * Ejecuta la migración.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('impresoras', function (Blueprint $table) {
            $table->string('nodo', 60)->nullable();
            $table->string('mac', 60)->nullable();
            $table->string('sisipo', 60)->nullable();
        });
    }

    /**
     * Revierte la migración.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('impresoras', function (Blueprint $table) {
            $table->dropColumn(['nodo', 'mac', 'sisipo']);
        });
    }
}
