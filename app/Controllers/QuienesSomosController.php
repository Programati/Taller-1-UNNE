<?php

namespace App\Controllers;

class QuienesSomosController extends BaseController
{
    public function index()
    {
        $datos = ['titulo' => 'Quienes somos'];//Declaramos un array declarativo y ponemos contenido

        $vista =    view('estructura/head', $datos).//Al pasar la vista, tambien pasamos un parámetro array
                            view('Quienes_Somos/body_quienes_somos').
                            view('estructura/footer');
        return $vista;
    }

}