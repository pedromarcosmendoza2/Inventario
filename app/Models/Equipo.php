<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $table = 'equipos';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = true;
    
    protected $fillable = [
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
        'tipo_conexion',
        'nodo',
        'mac',
        'sisipo',
    ];
    
    /**
     * Relación con el modelo Empleado
     */
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'id_empleado', 'id_empleado');
    }
}