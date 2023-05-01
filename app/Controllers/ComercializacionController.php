<?php

namespace App\Controllers;

class ComercializacionController extends BaseController
{
    public function index()
    {
        $datos = ['titulo' => 'Comercialización'];//Declaramos un array declarativo y ponemos contenido

        $vista =    view('estructura/head', $datos).//Al pasar la vista, tambien pasamos un parámetro array
                    view('Comercializacion/body_comercializacion').
                    view('estructura/footer');
        return $vista;
    }

}