<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PersonaModel;

use App\Models\UsuarioModel;

class QuienesSomosController extends BaseController
{
    public function index()
    {
        $data = [
        ];
        return view('Quienes_Somos/body_quienes_somos', $data);
    }

}