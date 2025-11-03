<?php

namespace App\Http\Controllers;

use App\Exports\InventarioExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
	    public function export()
			    {
					        $fecha = now()->format('Y-m-d_H-i-s');
							        $nombreArchivo = "inventario_completo_{$fecha}.xlsx";
							        return Excel::download(new InventarioExport, $nombreArchivo);
									    }
}

