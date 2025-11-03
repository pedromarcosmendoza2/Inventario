<?php

namespace App\Exports;

use App\Models\Impresora;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ImpresorasSheet implements FromCollection, WithHeadings
{
	    public function collection()
			    {
					        return Impresora::select(
								            'id_impresora',
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
									            'ID Impresora',
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

