<?php

namespace App\Exports;

use App\Models\Equipo;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EquiposSheet implements FromCollection, WithHeadings
{
	    public function collection()
			    {
					        return Equipo::select(
								            'id',
											            'created_at',
														            'updated_at',
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
																																																														            'sisipo'
																																																																	        )->get();
							    }

		    public function headings(): array
				    {
						        return [
									            'ID',
												            'Creado en',
															            'Actualizado en',
																		            'Tipo',
																					            'Marca',
																								            'Modelo',
																											            'Número de Serie',
																														            'Dirección IP',
																																	            'Estado',
																																				            'Piso',
																																							            'Departamento',
																																										            'ID Empleado',
																																													            'Procesador',
																																																            'Tecnología de Disco',
																																																			            'Tecnología de Memoria',
																																																						            'Tipo de Conexión',
																																																									            'Nodo',
																																																												            'MAC',
																																																															            'SISIPO'
																																																																		        ];
								    }
}

