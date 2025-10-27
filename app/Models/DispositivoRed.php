<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DispositivoRed extends Model
{
    use HasFactory;

    protected $table = 'dispositivos_red';

    protected $primaryKey = 'id_dispositivo'; // clave primaria personalizada

    public $incrementing = true; // Si es auto_increment

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
        'seccion',
        'nodo',
        'mac',
        'sisipo',
    ];
}
