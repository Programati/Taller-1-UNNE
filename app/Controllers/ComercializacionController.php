<?php

namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\UsuarioModel;

use App\Models\PersonaModel;

class ComercializacionController extends BaseController
{
    public function index()
    {
        $data = [
        ];
        return view('Comercializacion/body_comercializacion', $data);
    }

}