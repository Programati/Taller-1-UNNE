<?php

namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\UsuarioModel;

use App\Models\PersonaModel;

class ContactoController extends BaseController
{
    public function __construct()
    {
        //url = Archivos con _helper y que estan en el CodeIgniter
        //form = Hacemos referencia al HELPER form del sistema propio de CodeIgniter
        //En este caso, creamos un FORMULARIOERROR propio, asi que tambien lo agregamos al arreglo del HELPER
        helper(['url','form','FormularioError']);

    }
    public function index()
    {
        
        $data = [
        ];
        return view('Contacto/contacto', $data);
    }

}