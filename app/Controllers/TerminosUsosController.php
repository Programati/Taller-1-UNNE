<?php

namespace App\Controllers;

class TerminosUsosController extends BaseController
{
    public function index()
    {
        $datos = ['titulo' => 'Términos y usos'];//Declaramos un array declarativo y ponemos contenido

        $vista =    view('estructura/head', $datos).//Al pasar la vista, tambien pasamos un parámetro array
                    view('Terminos_y_Usos/bodyTerminosUsos').
                    view('estructura/footer');
        return $vista;
    }

}