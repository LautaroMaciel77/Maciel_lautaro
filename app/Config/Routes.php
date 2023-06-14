<?php

namespace Config;
use App\Filters\AuthFilter;
// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
/*rutas para todos*/
$routes->get('/','Home::index');
$routes->get('/contacto', 'Home::contacto');
$routes->get('/terminos', 'Home::terminos');
$routes->get('/nosotros', 'Home::nosotros');
$routes->match(['get', 'post'], 'SignupController/store', 'SignupController::store');
$routes->match(['get', 'post'], 'SigninController/loginAuth', 'SigninController::loginAuth');
$routes->match(['get', 'post'], 'SigninController/logout', 'SigninController::logout');
$routes->get('/signup', 'SignupController::index');
$routes->match(['get', 'post'], '/catalogo', 'ProductoController::catalogo');
/*consulta*/
$routes->match(['get', 'post'], '/store_consulta', 'consultaController::store');
$routes->match(['get', 'post'], '/buscar_catalogo', 'ProductoController::buscar_catalogo');


/*rutas para auth*/
$routes->group('', ['filter' => 'auth'], function ($routes) {
/*usuario */

$routes->match(['get', 'post'], 'user/editar_usuario/(:num)', 'UserController::editar_usuario/$1');
$routes->match(['get', 'post'], 'user/editar/(:num)', 'UserController::editar/$1');
/*ventas*/
$routes->get('/ventas', 'ventasController::ventas');
$routes->post('/factura/(:num)', 'VentasController::factura/$1');
/*carrito*/

$routes->get('/carrito','Cartcontroller::muestra');
$routes->add('/carrito_actualiza','Cartcontroller::actualiza_carrito');
$routes->post('/carrito_agrega', 'Cartcontroller::add');
$routes->add('carrito_elimina/(:any)','Cartcontroller::remove/$1');
$routes->get('/borrar','Cartcontroller::borrar_carrito');
$routes->get('/carrito-comprar', 'Ventascontroller::comprar_carrito');
$routes->get('sumar_carrito', 'CartController::sumar_carrito', ['as' => 'sumar_carrito']);
$routes->get('restar_carrito', 'CartController::restar_carrito', ['as' => 'restar_carrito']);

/*Favoritos*/
$routes->get('/favoritos', 'FavoritosController::favoritos');
$routes->match(['get', 'post'],'crear_favorito/(:num)', 'FavoritosController::crear/$1');
$routes->get('favoritos/borrar/(:num)', 'FavoritosController::borrar/$1');
});


/*rutas para admin*/
$routes->group('', ['filter' => 'admin'], function ($routes) {
/*usuarios*/
$routes->post('user/change_baja/(:num)', 'UserController::changeBaja/$1');
$routes->post('user/change_id/(:num)', 'UserController::change_id/$1');
$routes->get('/usarios', 'UserController::index');
$routes->get('/baja_usuario', 'UserController::baja');
$routes->post('/buscar', 'UserController::buscar');
/*producto */
$routes->get('/alta_productos', 'ProductoController::alta_producto');
$routes->get('/productos', 'ProductoController::index');
$routes->match(['get', 'post'], 'ProductoController/store', 'ProductoController::store');
$routes->post('product/change_baja/(:num)', 'ProductoController::changeBaja/$1');
$routes->get('/productos_eliminados', 'ProductoController::baja');
$routes->match(['get', 'post'], '/buscar_producto', 'ProductoController::buscar');
$routes->post('product/editar_producto/(:num)', 'ProductoController::editar_producto/$1');
$routes->post('product/editar/(:num)', 'ProductoController::editar/$1');
/*catalogo*/

/*Consulta */
$routes->match(['get', 'post'], '/respuesta/(:num)', 'consultaController::respuesta/$1');
$routes->match(['get', 'post'], '/buscar_consulta', 'consultaController::buscar');
$routes->match(['get', 'post'], '/respuestas/(:num)', 'consultaController::respuestas/$1');
$routes->get('/consultas', 'consultaController::consultas');
$routes->get('/consultas_respuestas', 'consultaController::consultas_respuestas');
/*Banner*/
$routes->get('/banner', 'BannerController::banner');
$routes->add('/buscar_banner', 'BannerController::buscar');
$routes->get('/banner_eliminados', 'BannerController::banner_eliminados');
$routes->get('/alta_banner', 'BannerController::alta_banner');
$routes->match(['get', 'post'], 'store_banner', 'BannerController::store');
$routes->post('banner/change_baja/(:num)', 'BannerController::changeBaja/$1');
$routes->match(['get', 'post'],'banner/editar/(:num)', 'BannerController::editar/$1');
$routes->match(['get', 'post'],'editar_banner/(:num)', 'BannerController::editar_banner/$1');
});
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
