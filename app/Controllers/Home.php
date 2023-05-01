<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
         $datos = ['titulo' => 'Inicio | Magic Shop'];//Declaramos un array declarativo y ponemos contenido
         $vista =    view('estructura/head', $datos).//Al pasar la vista, tambien pasamos un parámetro array
                     view('estructura/bodyPrincipal').
                     view('estructura/footer');
         return $vista;
    }        
}
