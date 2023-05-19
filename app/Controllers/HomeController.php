<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsuarioModel;

class HomeController extends BaseController
{

    public function __construct()
    {
        helper(['form', 'url']);
    }

    public function index()
    {
        //Creamos el objeto de la Tabla Usuarios
        $datosUsuarios = new UsuarioModel();

        //Capturamos el ID del logueo del usuario reciente
        $id_usuario_logueado = session()->get('loggedUser');

        //Buscamos en el objeto al usuario logueado
        $info_usuario = $datosUsuarios->find($id_usuario_logueado);


        $data = [
            //Registro del usuario logueado
            'infoUsuarioLog' => $info_usuario,
        ];
        return view('inicio/bodyPrincipal', $data);
    }

    public function verUsuarios()
    {
        //Creamos el objeto de la Tabla Usuarios
        $datosUsuarios = new UsuarioModel();

        //Capturamos el ID del logueo del usuario reciente
        $id_usuario_logueado = session()->get('loggedUser');

        //Buscamos en el objeto al usuario logueado
        $info_usuario = $datosUsuarios->find($id_usuario_logueado);

        //Tambien capturamos todos los datos de la tabla de usuarios
        $info_tabla_usuarios = $datosUsuarios->findAll();

        $data = [
            //Registro del usuario logueado
            'infoUsuarioLog' => $info_usuario,
            'infoUsuariosReg' => $info_tabla_usuarios
        ];
        return view('usuariosRegistrados', $data);
    }

}
