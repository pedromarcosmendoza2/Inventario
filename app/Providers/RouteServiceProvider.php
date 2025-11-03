<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
	    /**
		 *      * La ruta a la que se redirige por defecto tras login.
		 *           */
	    public const HOME = '/home'; // Cambia a '/' si quieres ir a la página pública

		    /**
			 *      * Define rutas del proyecto.
			 *           */
		    public function boot(): void
				    {
						        $this->routes(function () {
									            Route::middleware('web')
													                ->group(base_path('routes/web.php'));

												            Route::middleware('api')
																                ->prefix('api')
																			                ->group(base_path('routes/api.php'));
												        });
								    }
}

