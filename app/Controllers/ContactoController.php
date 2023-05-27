<?php

namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\UsuarioModel;

use App\Models\PersonaModel;

class ContactoController extends BaseController
{
    public function index()
    {
        
        $data = [
        ];
        return view('Contacto/contacto', $data);
    }

}