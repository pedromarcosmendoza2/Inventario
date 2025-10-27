<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $table = 'empleados'; // opcional, por claridad

    protected $primaryKey = 'id_empleado'; // Muy importante si cambiaste 'id' por 'id_empleado'

    public $timestamps = true;

    protected $fillable = [
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'cargo',
        'piso',
        'departamento',
        'seccion',
        'extension',
        'tipo_conexion',
        'nodo',
        'mac',
        'sisipo',
    ];
}
