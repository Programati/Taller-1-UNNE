<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsuarioModel;
use App\Models\PersonaModel;

class HomeController extends BaseController
{
    protected $carrito=array();

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

        /*$pila = array('naranja' => 10);
        $pila2 = array('manzana' => 24);
        $pila = array_merge($pila,$pila2);
        session()->set(array_merge(session()->get(),$pila));*/

        //dd(session()->get());
        //Si está logueada buscamos su ROL
        if(session()->has('loggedUser'))
        {
            //Buscamos en el objeto USUARIO el ID de la persona => Se convierte en un Array
            $info_usuario = $datosUsuarios->where('id_persona',$id_persona_logueada)->first();
            //Buscamos en el objeto a la PERSONA logueada
            $info_persona = $datosPersona->find($id_persona_logueada);
            session()->set(array_merge(session()->get(),$info_usuario,$info_persona));
            //session()->set(array_merge(session()->get(),$info_persona));
            //dd(session()->get());
        }else
        {
            //SINO mandamos 0
            $info_usuario = 0;
            $info_persona = 0;
            //session()->set('infoPersonaLog');
        }
        //dd(session()->get());

        

        $data = [
            //Registro de la PERSONA logueada
            'infoPersonaLog' => $info_persona,
            'infoUsuario' => $info_usuario,
        ];
        //dd($data);
        return view('inicio/bodyPrincipal', $data);
    }

    public function usuariosActivos()
    {
        //Creamos el objeto de la Tabla Usuarios
        $datosUsuarios = new UsuarioModel();
        $datosPersonas = new PersonaModel();

        //Capturamos el ID del logueo del usuario reciente
        $id_persona_logueada = session()->get('loggedUser');

        //Buscamos a la persona logueada y ponemos en una variable todos sus datos
        $info_persona = $datosPersonas->find($id_persona_logueada);

        //CAPTURAMOS los datos usuario de la persona logueada
        $info_usuario_log = $datosUsuarios->where('id_persona',$id_persona_logueada)->first();

        //Metemos a todos los usuarios en un ARRAY
        //$info_usuario = $datosUsuarios->where('activo', 1)->findAll();
        $info_usuario = $datosUsuarios->where('activo', 1)->findAll();

        $data = [
            //Registro PERSONAS de la persona logueada
            'infoPersonaLog' => $info_persona,
            //Registro USURIOS de la persona logueada
            'infoUsuario' => $info_usuario_log,
            //Todos los registros de la tabla usuarios
            'infoPersona' => $info_usuario,
        ];
        
        return view('usuarios/listaUsuarios', $data);
    }

    public function usuariosInActivos()
    {
        $datosUsuarios = new UsuarioModel();
        $datosPersonas = new PersonaModel();

        //Capturamos el ID del logueo del usuario reciente
        $id_persona_logueada = session()->get('loggedUser');

        //Buscamos a la persona logueada y ponemos en una variable todos sus datos
        $info_persona = $datosPersonas->find($id_persona_logueada);

        //CAPTURAMOS los datos usuario de la persona logueada
        $info_usuario_log = $datosUsuarios->where('id_persona',$id_persona_logueada)->first();

        //Metemos a todos los usuarios en un ARRAY
        $info_usuario = $datosUsuarios->where('activo', 0)->findAll();

        $data = [
            //Registro PERSONAS de la persona logueada
            'infoPersonaLog' => $info_persona,
            //Registro USURIOS de la persona logueada
            'infoUsuario' => $info_usuario_log,
            //Todos los registros de la tabla usuarios
            'infoPersona' => $info_usuario,
        ];
        
        return view('usuarios/listaUsuarios', $data);
    }
}
