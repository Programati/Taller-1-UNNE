<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsuarioModel;
use App\Models\PersonaModel;
use App\Models\ProductoModel;
use App\Models\CategoriasModel;

class CatalogoController extends BaseController
{
    public function index()
    {
        //Creamos el objeto de la Tabla Productos
        $productos = new ProductoModel();
        $categorias = new CategoriasModel();
        $numFiltro = 0;

        $DatosProductos = $productos->orderBy('id_producto', 'DESC')
                            ->where('activo', 1)->where('cantidad >', 0)
                            ->findAll();
        //$DatosProductos = $productos->orderBy('id_producto', 'ASC')->where('activo', 0)->findAll();

        $data = [
            'productos' => $DatosProductos,
            'categorias' => $categorias->where('activo', 1)->findAll(),
            'numFiltro' => $numFiltro,
        ];

        return view('productos/catalogo', $data);
    }        
    public function filtrado($id=null)
    {
        //Creamos el objeto de la Tabla Productos
        $productos = new ProductoModel();
        $categorias = new CategoriasModel();
        $numFiltro = $id;
        if($id==0)
        {
            $DatosProductos = $productos->orderBy('id_producto', 'DESC')
                            ->where('activo', 1)->where('cantidad >', 0)
                            ->findAll();

            $data = [
            'productos' => $DatosProductos,
            'categorias' => $categorias->where('activo', 1)->findAll(),
            'numFiltro' => $numFiltro,
            ];
        }else
        {
            $DatosProductos = $productos->where('id_categoria', $id)
                                ->where('activo', 1)->where('cantidad >', 0)
                                ->findAll();
    
            $data = [
                'productos' => $DatosProductos,
                'categorias' => $categorias->where('activo', 1)->findAll(),
                'numFiltro' => $numFiltro,
            ];
            
        }

        

        return view('productos/catalogo', $data);
    }    
    
    public function buscarProducto()
    {
        //dd($p_nombre);
        $productos = new ProductoModel();
        $categorias = new CategoriasModel();

        $nombre = $this->request->getPost('nombre');

        //$encontrado = $producto->where('nombre_producto', $nombre)->findAll();
        $encontrado = $productos->orderBy('id_producto', 'DESC')
                            ->where('activo', 1)->like('nombre_producto', $nombre)
                            ->findAll();
                                


        $data = [
            'productos' => $encontrado,
            'categorias' => $categorias->where('activo', 1)->findAll(),
            'numFiltro' => 0,
            'letraFiltro' => $nombre,
            ];
        return view('productos/catalogo', $data);
    }
}