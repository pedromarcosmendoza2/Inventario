<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToEquiposTable extends Migration
{
    /**
     * Ejecuta las migraciones.
     *
     * @return void
     */
    public function up()
    {
        // Para agregar varias columnas con chequeos, mejor hacerlo columna por columna
     /*   if (!Schema::hasColumn('equipos', 'tipo')) {
            Schema::table('equipos', function (Blueprint $table) {
                $table->string('tipo', 50);
            });
        }

        if (!Schema::hasColumn('equipos', 'marca')) {
            Schema::table('equipos', function (Blueprint $table) {
                $table->string('marca', 50)->nullable();
            });
        }

        if (!Schema::hasColumn('equipos', 'modelo')) {
            Schema::table('equipos', function (Blueprint $table) {
                $table->string('modelo', 50)->nullable();
            });
        }

        if (!Schema::hasColumn('equipos', 'numero_serie')) {
            Schema::table('equipos', function (Blueprint $table) {
                $table->string('numero_serie', 100)->nullable();
            });
        }

        if (!Schema::hasColumn('equipos', 'direccion_ip')) {
            Schema::table('equipos', function (Blueprint $table) {
                $table->string('direccion_ip', 15)->nullable();
            });
        }

        if (!Schema::hasColumn('equipos', 'estado')) {
            Schema::table('equipos', function (Blueprint $table) {
                $table->string('estado', 50)->default('Activo');
            });
        }

        if (!Schema::hasColumn('equipos', 'piso')) {
            Schema::table('equipos', function (Blueprint $table) {
                $table->string('piso', 100)->nullable();
            });
        }

        if (!Schema::hasColumn('equipos', 'departamento')) {
            Schema::table('equipos', function (Blueprint $table) {
                $table->string('departamento', 100)->nullable();
            });
        }

        if (!Schema::hasColumn('equipos', 'id_empleado')) {
            Schema::table('equipos', function (Blueprint $table) {
                $table->unsignedBigInteger('id_empleado')->nullable();

                // Agregar la clave foránea
                $table->foreign('id_empleado')->references('id_empleado')->on('empleados')->onDelete('set null');
            });
        }

        if (!Schema::hasColumn('equipos', 'procesador')) {
            Schema::table('equipos', function (Blueprint $table) {
                $table->string('procesador', 100)->nullable();
            });
        }

        if (!Schema::hasColumn('equipos', 'tecnologia_disco')) {
            Schema::table('equipos', function (Blueprint $table) {
                $table->string('tecnologia_disco', 100)->nullable();
            });
        }

        if (!Schema::hasColumn('equipos', 'tecnologia_memoria')) {
            Schema::table('equipos', function (Blueprint $table) {
                $table->string('tecnologia_memoria', 100)->nullable();
            });
		}*/
    }

    /**
     * Deshacer las migraciones.
     *
     * @return void
     */
    public function down()
    {
       /* Schema::table('equipos', function (Blueprint $table) {
            // Primero eliminar la clave foránea si existe
            $sm = Schema::getConnection()->getDoctrineSchemaManager();
            $doctrineTable = $sm->listTableDetails('equipos');

            if ($doctrineTable->hasForeignKey('equipos_id_empleado_foreign')) {
                $table->dropForeign(['id_empleado']);
            }

            $columns = [
                'tipo',
                'marca',
                'modelo',
                'numero_serie',
                'direccion_ip',
                'estado',
                'piso',
                'departamento',
                'id_empleado',
                'procesador',
                'tecnologia_disco',
                'tecnologia_memoria',
            ];

            foreach ($columns as $column) {
                if (Schema::hasColumn('equipos', $column)) {
                    $table->dropColumn($column);
                }
            }
	   });*/
	}
}
