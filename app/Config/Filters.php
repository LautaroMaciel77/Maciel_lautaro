<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     */
    public $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        // add custom
        'auth'  => \App\Filters\AuthFilter::class,
        'admin' => \App\Filters\AdminFilter::class,
	];
    

    public $filters = [
        'auth' => [
            // Lista de rutas en las que se aplicará el filtro "auth"
            'except' => [
            
            '/ventas',
            '/factura/(:num)',
            '/carrito',
            '/carrito_actualiza',
            '/carrito_agrega',
            'carrito_elimina/(:any)',
            '/borrar',
            '/carrito-comprar',
            'sumar_carrito',
            'restar_carrito',
            '/favoritos',
            'crear_favorito/(:num)',
            'favoritos/borrar/(:num)',
            'user/editar_usuario/(:num)',
            'user/editar/(:num)',
        
        ],
    ],
        'admin' => [
            // Lista de rutas en las que se aplicará el filtro "admin"
            'only' => [
                '/usarios',
                '/baja_usuario',
                '/buscar',
                '/alta_productos',
                '/productos',
                '/ProductoController/store',
                '/product/change_baja/(:num)',
                '/productos_eliminados',
                '/buscar_producto',
                '/product/editar_producto/(:num)',
                '/product/editar/(:num)',
                '/buscar_catalogo',
                '/respuesta/(:num)',
                '/buscar_consulta',
                '/respuestas/(:num)',
                '/consultas',
                '/consultas_respuestas',
                '/banner',
                '/buscar_banner',
                '/banner_eliminados',
                '/alta_banner',
                '/store_banner',
                '/banner/change_baja/(:num)',
                '/banner/editar/(:num)',
                '/editar_banner/(:num)',
            ],
        ],
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     */
    public array $globals = [
        'before' => [
            // 'honeypot',
            // 'csrf',
            // 'invalidchars',
        ],
        'after' => [
            'toolbar',
            // 'honeypot',
            // 'secureheaders',
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['foo', 'bar']
     *
     * If you use this, you should disable auto-routing because auto-routing
     * permits any HTTP method to access a controller. Accessing the controller
     * with a method you don’t expect could bypass the filter.
     */
    public array $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     */
  
}
