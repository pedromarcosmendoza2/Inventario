<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToImpresorasTable extends Migration
{
    /**
     * Ejecuta las migraciones.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('impresoras', function (Blueprint $table) {
            $table->increments('id_impresora');       // id_impresora int(11) auto_increment PRIMARY KEY
            $table->string('marca', 50)->nullable();  // marca varchar(50)
            $table->string('modelo', 50)->nullable(); // modelo varchar(50)
            $table->string('numero_serie', 100)->nullable(); // numero_serie varchar(100)
            $table->string('direccion_ip', 15)->nullable();  // direccion_ip varchar(15)
            $table->string('estado', 50)->default('Activo'); // estado varchar(50) default 'Activo'
            $table->string('piso', 100)->nullable();         // piso varchar(100)
            $table->string('departamento', 100)->nullable(); // departamento varchar(100)
            $table->string('seccion', 100)->nullable();      // seccion varchar(100)
            $table->timestamps();                             // created_at y updated_at
        });
    }

    /**
     * Deshacer las migraciones.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('impresoras');
    }
}
