<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsuarioModel;
use App\Models\PersonaModel;

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
        $datosPersona = new PersonaModel();

        //Capturamos el ID del logueo de la PERSONA reciente
        $id_persona_logueada = session()->get('loggedUser');

        if(session()->has('loggedUser'))
        {
            //Buscamos en el objeto USUARIO el ID de la persona => Se convierte en un Array
            $info_usuario = $datosUsuarios->where('id_persona',$id_persona_logueada)->first();
            //Buscamos en el objeto a la PERSONA logueada
            $info_persona = $datosPersona->find($id_persona_logueada);
            session()->set(array_merge(session()->get(),$info_usuario,$info_persona));
        }else
        {
            $info_usuario = 0;
            $info_persona = 0;
        }

        $data = [
            //Registro de la PERSONA logueada
            'infoPersonaLog' => $info_persona,
            'infoUsuario' => $info_usuario,
        ];
        return view('inicio/bodyPrincipal', $data);
    }
    //PARA PROBAR COSAS-- ACTIVAR LA RUTA
    public function index2()
    {
        //Creamos el objeto de la Tabla Usuarios
        $datosUsuarios = new UsuarioModel();
        $datosPersona = new PersonaModel();

        //Capturamos el ID del logueo de la PERSONA reciente
        $id_persona_logueada = session()->get('loggedUser');

        if(session()->has('loggedUser'))
        {
            //Buscamos en el objeto USUARIO el ID de la persona => Se convierte en un Array
            $info_usuario = $datosUsuarios->where('id_persona',$id_persona_logueada)->first();
            //Buscamos en el objeto a la PERSONA logueada
            $info_persona = $datosPersona->find($id_persona_logueada);
            session()->set(array_merge(session()->get(),$info_usuario,$info_persona));
        }else
        {
            $info_usuario = 0;
            $info_persona = 0;
        }

        $data = [
            //Registro de la PERSONA logueada
            'infoPersonaLog' => $info_persona,
            'infoUsuario' => $info_usuario,
        ];
        return view('a', $data);
    }

    public function indexAdmin()
    {
        //Creamos el objeto de la Tabla Usuarios
        $datosUsuarios = new UsuarioModel();
        $datosPersona = new PersonaModel();

        //Capturamos el ID del logueo de la PERSONA reciente
        $id_persona_logueada = session()->get('loggedUser');

        if(session()->has('loggedUser'))
        {
            //Buscamos en el objeto USUARIO el ID de la persona => Se convierte en un Array
            $info_usuario = $datosUsuarios->where('id_persona',$id_persona_logueada)->first();
            //Buscamos en el objeto a la PERSONA logueada
            $info_persona = $datosPersona->find($id_persona_logueada);
            session()->set(array_merge(session()->get(),$info_usuario,$info_persona));
        }else
        {
            $info_usuario = 0;
            $info_persona = 0;
        }

        $data = [
            //Registro de la PERSONA logueada
            'infoPersonaLog' => $info_persona,
            'infoUsuario' => $info_usuario,
        ];
        return view('Dashboard/dashboard', $data);
    }

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
