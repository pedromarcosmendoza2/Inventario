<?php

namespace App\Exports;

use App\Models\DispositivoRed;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DispositivosSheet implements FromCollection, WithHeadings
{
	    public function collection()
			    {
					        return DispositivoRed::select(
								            'id_dispositivo',
											            'tipo',
														            'marca',
																	            'modelo',
																				            'numero_serie',
																							            'direccion_ip',
																										            'estado',
																													            'piso',
																																            'departamento',
																																			            'seccion',
																																						            'created_at',
																																									            'updated_at',
																																												            'nodo',
																																															            'mac',
																																																		            'sisipo'
																																																					        )->get();
							    }

		    public function headings(): array
				    {
						        return [
									            'ID Dispositivo',
												            'Tipo',
															            'Marca',
																		            'Modelo',
																					            'Número de Serie',
																								            'Dirección IP',
																											            'Estado',
																														            'Piso',
																																	            'Departamento',
																																				            'Sección',
																																							            'Creado en',
																																										            'Actualizado en',
																																													            'Nodo',
																																																            'MAC',
																																																			            'SISIPO'
																																																						        ];
								    }
}

