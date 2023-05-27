<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsuarioModel;
use App\Models\PersonaModel;
use App\Models\ProductoModel;

class CatalogoController extends BaseController
{
    public function index()
    {
        //Creamos el objeto de la Tabla Productos
        $productos = new ProductoModel();

        $DatosProductos = $productos->orderBy('id_producto', 'DESC')
                            ->where('activo', 1)->where('cantidad >', 0)
                            ->findAll();
        //$DatosProductos = $productos->orderBy('id_producto', 'ASC')->where('activo', 0)->findAll();

        $data = [
            'productos' => $DatosProductos
        ];

        return view('productos/catalogo', $data);
    }        
}