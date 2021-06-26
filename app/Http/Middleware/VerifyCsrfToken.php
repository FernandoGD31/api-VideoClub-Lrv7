<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '/RegistrarContenido',
        '/EditarContenido/*',
        '/EliminarContenido/*',
        '/MostrarContenido',
        '/MostrarContenidoId/*',
        '/MostrarPeliculas',
        '/MostrarSeries',
        '/GeneroPelicula/*',
        '/GeneroSerie/*',
        '/Calificacion/*',
        '/Director/*',
        '/Actor/*',
        '/Sinopsis/*',
        '/RegistrarCliente',
        '/EditarCliente/*',
        '/MostrarIdioma/*',
        '/MostrarCap/*',
        '/Mostrarestreno',
        '/MostrarSeriesIdioma/{idioma}',
        '/ListarClientes', 
        '/MostrarClienteId/*', 
        '/EliminarCliente/*',
        '/RentaContenido/*/*', 
        '/ContenidoRentado/*'
    ];
}
