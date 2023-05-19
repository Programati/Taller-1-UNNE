<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsuarioModel;

class QuienesSomosController extends BaseController
{
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
        return view('Quienes_Somos/body_quienes_somos', $data);
    }

}