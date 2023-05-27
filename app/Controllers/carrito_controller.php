<?php

namespace App\Controllers;

class carrito_controller extends BaseController
{
    public function __construct()
    {
        helper(['form','url','cart','FormularioError']);

        $session = session();

        $cart = \Config\Services::cart();
        $cart->contents();
    }
    public function add()
    {
        $cart = \Config\Services::Cart();
        $request = \Config\Services::request();
        $cart->insert(array(
            'id' => $request->getPost('id'),
            'qty' => 1,
            'price' => $request->getPost('precio_vta'),
            'name' => $request->getPost('nombre_prod'),
            
        ));
        return view('', $data);
    }        
}