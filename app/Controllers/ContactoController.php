<?php

namespace App\Controllers;

class ContactoController extends BaseController
{
    public function index()
    {
        $datos = ['titulo' => 'Contacto'];//Declaramos un array declarativo y ponemos contenido

        $vista =    view('estructura/head', $datos).//Al pasar la vista, tambien pasamos un parámetro array
                    view('Contacto/contacto').
                    view('estructura/footer');
        return $vista;
    }

    public function enviarMensaje(){
        print_r($_POST);
    }
}