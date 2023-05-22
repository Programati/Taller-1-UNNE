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
$routes->post('Mensaje Enviado', 'ContactoController::enviarMensaje', ['as' => "envioMensaje"]);

$routes->get('terminos y usos', 'TerminosUsosController::index', ['as' => "terminos_y_usos"]);
$routes->get('Catalogo', 'CatalogoController::index', ['as' => "catalogo"]);


//FORMULARIO LOGIN pero primero destruimos sesion
$routes->get('logout', 'AuthController::salir', ['as' => 'logout']);

//Al enviar Formulario Registro nos redirege aqui
//Controllador->funcion donde guardamos los datos
$routes->post('/guardado', 'AuthController::guardarRegistro', ['as' => 'guardar']);

//El Formulario de Logueo nos trae aqui y de aca vamos para la funcion CHECK
//Controlador->funcion donde verificamos la identidad del usuario desde el LOGIN
$routes->post('signin', 'AuthController::check', ['as' => 'controlUsuario']);




//Para proteger RUTAS tenemos que ponerlas dentro de un grupo y aplicar el filtro programado

//GRUPO DE LINKS donde hacemos que los que no estan logueados, tengan que loguearse para ver el contenido
$routes->group('',['filter'=>'VerificarAutenticacion'], function($routes)
{
    //Agregamos todas las rutas que querramos proteger con el filtro
    $routes->match(['get','post'],'lista', 'HomeController::verUsuarios', ['as' => 'verUsuarios']);

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

//CREAR GRUPO DE RUTA PARA QUE SÓLO EL ADMIN INGRESE AQUI
//Listar Productos
//$routes->get('Allproductos', 'ProductoController::index', ['as' => 'listaProductos']);
$routes->get('productos', 'ProductoController::index');

//Crear Nuevo Libro
$routes->get('NuevoProducto', 'ProductoController::crearProducto', ['as' => 'crearproducto']);

//Guardar
$routes->post('GuardarProducto', 'ProductoController::guardarProducto', ['as' => 'guardarproducto']);
//Actualizar
$routes->post('actualizar', 'ProductoController::actualizarProducto');
//Borrar
$routes->get('delete(:num)', 'ProductoController::borrarProducto/$1');
//Editar
$routes->get('editar(:num)', 'ProductoController::editarProducto/$1');

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


