<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PersonaModel;

use App\Models\UsuarioModel;

class TerminosUsosController extends BaseController
{
    public function index()
    {
        $data = [
            
        ];
        return view('Terminos_y_Usos/bodyTerminosUsos', $data);
    }

}