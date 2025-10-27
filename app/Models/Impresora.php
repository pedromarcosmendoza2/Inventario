<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Impresora extends Model
{
    use HasFactory;

    protected $table = 'impresoras'; // opcional, por claridad

    protected $primaryKey = 'id_impresora'; // Muy importante si cambiaste 'id' por 'id_empleado'

    public $timestamps = true;

    protected $fillable = [
        'marca',
        'modelo',
        'numero_serie',
        'direccion_ip',
        'estado',
        'piso',
        'departamento',
        'seccion',
        'nodo',
        'mac',
        'sisipo',
    ];
    public function getRouteKeyName()
    {
        return 'id_impresora';
    }

}
