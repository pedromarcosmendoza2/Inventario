<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class InventarioExport implements WithMultipleSheets
{
	    public function sheets(): array
			    {
					        return [
								            'Empleados' => new EmpleadosSheet(),
											            'Equipos' => new EquiposSheet(),
														            'Impresoras' => new ImpresorasSheet(),
																	            'Dispositivos de Red' => new DispositivosSheet(),
																				        ];
							    }
}

