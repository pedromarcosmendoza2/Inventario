<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Equipo;
use App\Models\Impresora;
use App\Models\DispositivoRed;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            // Datos para las gráficas
            $stats = [
                'total_empleados' => Empleado::count(),
                'total_equipos' => Equipo::count(),
                'total_impresoras' => Impresora::count(),
                'total_dispositivos' => DispositivoRed::count(),
                
                // Equipos por tipo
                'equipos_por_tipo' => Equipo::selectRaw('tipo, COUNT(*) as total')
                    ->groupBy('tipo')
                    ->pluck('total', 'tipo')
                    ->toArray(),
                
                // Equipos por estado
                'equipos_por_estado' => Equipo::selectRaw('estado, COUNT(*) as total')
                    ->groupBy('estado')
                    ->pluck('total', 'estado')
                    ->toArray(),
                
                // Dispositivos por departamento (Top 5)
                'equipos_por_departamento' => Equipo::selectRaw('departamento, COUNT(*) as total')
                    ->groupBy('departamento')
                    ->orderByDesc('total')
                    ->limit(5)
                    ->pluck('total', 'departamento')
                    ->toArray(),
                
                // Equipos por piso
                'equipos_por_piso' => Equipo::selectRaw('piso, COUNT(*) as total')
                    ->groupBy('piso')
                    ->orderBy('piso')
                    ->pluck('total', 'piso')
                    ->toArray(),

                // NUEVAS GRÁFICAS: Procesadores
                'equipos_por_procesador' => Equipo::selectRaw('procesador, COUNT(*) as total')
                    ->whereNotNull('procesador')
                    ->where('procesador', '!=', '')
                    ->groupBy('procesador')
                    ->orderByDesc('total')
                    ->pluck('total', 'procesador')
                    ->toArray(),

                // NUEVAS GRÁFICAS: Memoria RAM
                'equipos_por_memoria' => Equipo::selectRaw('tecnologia_memoria, COUNT(*) as total')
                    ->whereNotNull('tecnologia_memoria')
                    ->where('tecnologia_memoria', '!=', '')
                    ->groupBy('tecnologia_memoria')
                    ->orderByDesc('total')
                    ->pluck('total', 'tecnologia_memoria')
                    ->toArray(),

                // NUEVAS GRÁFICAS: Discos Duros
                'equipos_por_disco' => Equipo::selectRaw('tecnologia_disco, COUNT(*) as total')
                    ->whereNotNull('tecnologia_disco')
                    ->where('tecnologia_disco', '!=', '')
                    ->groupBy('tecnologia_disco')
                    ->orderByDesc('total')
                    ->pluck('total', 'tecnologia_disco')
                    ->toArray(),
            ];

            return view('welcome', compact('stats'));
        }

        return view('welcome');
    }
}