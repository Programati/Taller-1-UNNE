<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsuarioModel;
use App\Models\PersonaModel;

class UsuarioController extends BaseController
{

    public function usuariosActivos()
    {
        $datosUsuarios = new UsuarioModel();
        $datosPersonas = new PersonaModel();

        //Metemos a todos los usuarios en un ARRAY
        $info_usuario = $datosUsuarios->where('activo', 1)->where('id_rol', 2)->findAll();
        $info_persona = $datosPersonas->findAll();

        $data = [
            //Todos los registros de la tabla usuarios
            'infoUsuario' => $info_usuario,
            'infoPersona' => $info_persona
        ];
        
        return view('usuarios/listaUsuarios', $data);
    }

    public function usuariosInActivos()
    {
        $datosUsuarios = new UsuarioModel();
        $datosPersonas = new PersonaModel();

        //Metemos a todos los usuarios en un ARRAY
        $info_usuario = $datosUsuarios->where('activo', 0)->where('id_rol', 2)->findAll();
        $info_persona = $datosPersonas->findAll();

        $data = [
            //Todos los registros de la tabla usuarios
            'infoUsuario' => $info_usuario,
            'infoPersona' => $info_persona
        ];
        
        return view('usuarios/listaUsuarios', $data);
    }

    public function bajaPersona($id=null)
    {

        $usuario = new UsuarioModel();
        $datos = [
            'activo' => 0,
        ];
        $usuarioBan = $usuario->where('id_persona', $id)->find();
        $idBan = $usuarioBan['0']['id_usuario'];

        $usuario->where('id_persona', $id)->update($idBan,$datos);

        return redirect()->to(route_to('usuariosOn'))->with('success', 'El usuario fue dado de baja correctamente!');
    }

    public function altaPersona($id=null)
    {
        $usuario = new UsuarioModel();
        $datos = [
            'activo' => 1,
        ];
        $usuarioBan = $usuario->where('id_persona', $id)->find();
        $idBan = $usuarioBan['0']['id_usuario'];
        
        $usuario->where('id_persona', $id)->update($idBan,$datos);


        return redirect()->to(route_to('usuariosOff'))->with('success', 'El usuario fue dado de alta correctamente!');
    }
}