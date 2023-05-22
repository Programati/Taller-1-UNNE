<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsuarioModel;
use App\Models\ProductoModel;

class CatalogoController extends BaseController
{
    public function index()
    {
        //Creamos el objeto de la Tabla Usuarios
        $datosUsuarios = new UsuarioModel();
        
        //Creamos el objeto de la Tabla Productos
        $productos = new ProductoModel();

        //Capturamos el ID del logueo del usuario reciente
        $id_usuario_logueado = session()->get('loggedUser');

        //Buscamos en el objeto al usuario logueado
        $info_usuario = $datosUsuarios->find($id_usuario_logueado);

        
        $DatosProductos = $productos->orderBy('id', 'DESC')->findAll();

        $data = [
            //Registro del usuario logueado
            'infoUsuarioLog' => $info_usuario,
            'productos' => $DatosProductos
        ];

    

        return view('productos/catalogo', $data);
    }        
}