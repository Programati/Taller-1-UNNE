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
$routes->get('filtrado(:num)', 'CatalogoController::filtrado/$1');
$routes->post('buscarProducto', 'CatalogoController::buscarProducto');




//Al enviar Formulario Registro nos redirege aqui
//Controllador->funcion donde guardamos los datos
$routes->post('guardado', 'AuthController::guardarRegistro', ['as' => 'guardar']);

//El Formulario de Logueo nos trae aqui y de aca vamos para la funcion CHECK
//Controlador->funcion donde verificamos la identidad del usuario desde el LOGIN
$routes->post('signin', 'AuthController::check', ['as' => 'controlUsuario']);
$routes->post('consulta', 'ConsultaController::index');


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

    //Crear Producto
    $routes->get('NuevoProducto', 'ProductoController::crearProducto', ['as' => 'crearproducto']);
    //Guardar Producto
    $routes->post('GuardarProducto', 'ProductoController::guardarProducto', ['as' => 'guardarproducto']);
    //Actualizar Producto
    $routes->post('actualizar', 'ProductoController::actualizarProducto');
    //Borrar Producto
    $routes->get('delete(:num)', 'ProductoController::borrarProducto/$1');
    //Activar Producto
    $routes->get('activar(:num)', 'ProductoController::activarProducto/$1');
    //Editar Producto
    $routes->get('editar(:num)', 'ProductoController::editarProducto/$1');

    //Todas las facturas
    $routes->get('allFacturas', 'FacturaController::allFacturas');
    //1 sola Factura completa
    $routes->get('facturaUnica(:num)', 'FacturaController::facturaUnica/$1');

    //Todas las consultas de todos los USUARIOS
    $routes->get('listaConsultasUsuarios', 'ConsultaController::listaConsultasUsuarios');
    //Todas las consultas de todos los NO-USUARIOS
    $routes->get('listaConsultasNoUsuarios', 'ConsultaController::listaConsultasNoUsuarios');
    //Check leido
    $routes->get('consultaLeida(:num)', 'ConsultaController::consultaLeida/$1');

    //Listar Categorias
    $routes->get('categoriasOn', 'CategoriaController::index');
    $routes->get('categoriasOff', 'CategoriaController::categoriasDesactivados');
    //Crear Categoria
    $routes->get('crearCategoria', 'CategoriaController::crearCategoria');
    //Guardar Categoria
    $routes->post('guardarCategoria', 'CategoriaController::guardarCategoria');
    //Borrar Categoria
    $routes->get('borrarCategoria(:num)', 'CategoriaController::borrarCategoria/$1');
    //Activar Categoria
    $routes->get('activarCategoria(:num)', 'CategoriaController::activarCategoria/$1');
    //Editar Categoria
    $routes->get('editarCategoria(:num)', 'CategoriaController::editarCategoria/$1');
    //Actualizar Categoria
    $routes->post('actualizarCategoria', 'CategoriaController::actualizarCategoria');

    

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

    //Lista de Facturas de cada usuario
    $routes->get('allFacturasUsuario', 'FacturaController::allFacturasUsuario');
    //Una factura del usuario
    $routes->get('facturaUnicaUsuario(:num)', 'FacturaController::facturaUnicaUsuario/$1');
    //Perfil de Usuario
    $routes->get('perfil', 'HomeController::perfil');

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



