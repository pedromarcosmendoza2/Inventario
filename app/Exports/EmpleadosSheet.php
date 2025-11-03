<?php

namespace App\Exports;

use App\Models\Empleado;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EmpleadosSheet implements FromCollection, WithHeadings
{
	    public function collection()
			    {
					        return Empleado::select(
								            'id_empleado',
											            'created_at',
														            'updated_at',
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
																																																		            'sisipo'
																																																					        )->get();
							    }

		    public function headings(): array
				    {
						        return [
									            'ID Empleado',
												            'Creado en',
															            'Actualizado en',
																		            'Nombre',
																					            'Apellido Paterno',
																								            'Apellido Materno',
																											            'Cargo',
																														            'Piso',
																																	            'Departamento',
																																				            'Sección',
																																							            'Extensión',
																																										            'Tipo de Conexión',
																																													            'Nodo',
																																																            'MAC',
																																																			            'SISIPO'
																																																						        ];
								    }
}

