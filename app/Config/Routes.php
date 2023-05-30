<?php

namespace Config;

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

$routes->get('/', 'HomeController::index');
$routes->get('quienes somos', 'QuienesSomosController::index', ['as' => "quienes_somos"]);
$routes->get('comercializacion', 'ComercializacionController::index', ['as' => "comercializacion"]);
$routes->get('contacto', 'ContactoController::index', ['as' => "contacto"]);
$routes->get('terminos y usos', 'TerminosUsosController::index', ['as' => "terminos_y_usos"]);
$routes->get('catalogo', 'CatalogoController::index', ['as' => "catalogo"]);




//Al enviar Formulario Registro nos redirege aqui
//Controllador->funcion donde guardamos los datos
$routes->post('guardado', 'AuthController::guardarRegistro', ['as' => 'guardar']);

//El Formulario de Logueo nos trae aqui y de aca vamos para la funcion CHECK
//Controlador->funcion donde verificamos la identidad del usuario desde el LOGIN
$routes->post('signin', 'AuthController::check', ['as' => 'controlUsuario']);


//GRUPO DE LINKS donde solo el ADMINISTRADOR puede ver
$routes->group('',['filter'=>'VerificarAdmin'], function($routes)
{
    //Inicio Administracion
    $routes->get('dashboard', 'HomeController::indexAdmin');

    //Agregamos todas las rutas que querramos proteger con el filtro
    $routes->get('usuariosOn', 'UsuarioController::usuariosActivos');
    $routes->get('usuariosOff', 'UsuarioController::usuariosInActivos');
    //BorrarPersona
    $routes->get('deleteP(:num)', 'UsuarioController::bajaPersona/$1');
    //Activar Persona
    $routes->get('activarP(:num)', 'UsuarioController::altaPersona/$1');

    //Listar Productos
    $routes->get('productosOn', 'ProductoController::index');
    $routes->get('productosOff', 'ProductoController::productosDesactivados');

    //Crear
    $routes->get('NuevoProducto', 'ProductoController::crearProducto', ['as' => 'crearproducto']);
    //Guardar
    $routes->post('GuardarProducto', 'ProductoController::guardarProducto', ['as' => 'guardarproducto']);
    //Actualizar
    $routes->post('actualizar', 'ProductoController::actualizarProducto');
    //Borrar
    $routes->get('delete(:num)', 'ProductoController::borrarProducto/$1');
    //Activar
    $routes->get('activar(:num)', 'ProductoController::activarProducto/$1');
    //Editar
    $routes->get('editar(:num)', 'ProductoController::editarProducto/$1');


    

});


//GRUPO DE LINKS DONDE ASEGURAMOS QUE LOS USUARIOS LOGUEADOS NO INGRESEN
$routes->group('',['filter'=>'UsuarioYaLogueado'], function($routes)
{
    //Agregamos todas las rutas que querramos proteger con el filtro
    //FORMULARIOS LOGIN
    $routes->match(['get','post'],'login', 'AuthController::formularioLogin', ['as' => 'login']);
    //FORMULARIOS REGISTRO
    $routes->match(['get','post'],'registrarse', 'AuthController::formularioRegistro', ['as' => 'formularioRegistro']);
    
});

//GRUPO DE LINKS donde hacemos que los que no estan logueados, tengan que loguearse para ver el contenido
$routes->group('',['filter'=>'VerificarAutenticacion'], function($routes)
{
    //FORMULARIO LOGIN pero primero destruimos sesion
    $routes->get('logout', 'AuthController::salir', ['as' => 'logout']);
    //Lista de compras realizadas
    $routes->get('carritoCompras', 'ProductoController::indexCompras');
    //Agregar
    $routes->get('carrito(:num)', 'ProductoController::carrito/$1');
    //Vaciar
    $routes->get('vaciarCarrito(:num)', 'ProductoController::vaciarCarrito/$1');
    //Vaciar Carrito Completo
    $routes->get('vacioTotalCarrito', 'ProductoController::vacioTotalCarrito');
    //ConfirmarCompra
    $routes->get('confirmarCompra', 'ProductoController::confirmarCompra');

    //Factura
    $routes->get('factura', 'FacturaController::index');

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



