<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsuarioModel;
use App\Models\PersonaModel;
use App\Models\ProductoModel;
use App\Models\CategoriasModel;
use App\Models\FacturaModel;
use App\Models\DetalleFacturaModel;

class CategoriaController extends BaseController
{
    public function __construct()
    {
        //Siempre hay que ponerlos para que los validadores de errores funcionen
        helper(['url', 'form', 'FormularioError']);
    }

    public function index()
    {
        //Creamos el objeto de la Tabla Categorias
        $categorias = new CategoriasModel();
        $DatosCategorias = $categorias->where('activo', 1)->findAll();

        $data = [
            'categorias' => $DatosCategorias,
        ];

        return view('Categorias/categoriasActivas', $data);
    }
    public function categoriasDesactivados()
    {
        //Creamos el objeto de la Tabla Categorias
        $categorias = new CategoriasModel();
        $DatosCategorias = $categorias->where('activo', 0)->findAll();

        $data = [
            'categorias' => $DatosCategorias
        ];

        return view('Categorias/categoriasInActivas', $data);
    }
    
    public function crearCategoria()
    {
        return view('Categorias/crearCategoria');
    }
    
    public function guardarCategoria()
    {
        $validacion = $this->validate([
            'nombre' => [
                'rules' => 'required|max_length[50]',
                'errors' => [
                    'required' => 'Tienes que ingresar un nombre de categoria',
                    'max_length' => 'El nombre de la categoria es muy largo'
                    ]
                ],
            'descripcion' => [
                'rules' => 'required|max_length[100]',
                'errors' => [
                    'required' => 'Tienes que ingresar una descripcion a la categoria',
                    'max_length' => 'La descripcion supera los 100 carácteres'
                    ]
                ],
        ]);

        $data = [
            'validation'=> $this->validator,
        ];

        if(!$validacion)
        {
            return view('Categorias/crearCategoria', $data);
        }
        else
        {
            $nombre = $this->request->getPost('nombre');
            $descripcion = $this->request->getPost('descripcion');
            $estado = $this->request->getPost('estado');
            $datos = [
                'nombre_categoria' => $nombre,
                'descripcion_categoria' => $descripcion,
                'activo' => $estado,
            ];

            $categorias = new CategoriasModel();
            $categorias->insert($datos);

            if($datos['activo'] == 1)
            {
                return redirect()->to(route_to('categoriasOn'))->with('success', 'Categoria cargada correctamente!');
            }else
            {
                return redirect()->to(route_to('categoriasOff'))->with('success', 'Categoria creada correctamente! Se ecuentra INACTIVA');
    
            }
        }

    }

    public function borrarCategoria($id=null)
    {
        $categorias = new CategoriasModel();
        $datos = [
            'activo' => 0,
        ];
        $categorias->where('id_categoria', $id)->update($id,$datos);


        return redirect()->to(route_to('categoriasOn'))->with('success', 'La categoria fue DESACTIVADA correctamente!');
    }

    public function activarCategoria($id=null)
    {
        $categorias = new CategoriasModel();
        $datos = [
            'activo' => 1,
        ];
        $categorias->where('id_categoria', $id)->update($id,$datos);

        return redirect()->to(route_to('categoriasOff'))->with('success', 'La categoria fue ACTIVADA correctamente!');
    }

    public function editarCategoria($id=null)
    {
        $categorias = new CategoriasModel();

        $datosCategorias = $categorias->where('id_categoria', $id)->first();
        

        $datos = [
            'categoria' => $datosCategorias,
        ];

        return view('Categorias/editarCategoria',$datos);
    }

    public function actualizarCategoria($id=null)
    {
        $categorias = new CategoriasModel();

        $id = $this->request->getVar('id');
        $nombre = $this->request->getPost('nombre');
        $descripcion = $this->request->getPost('descripcion');
        $estado = $this->request->getPost('estado');


        $validacion = $this->validate([
            'nombre' => [
                'rules' => 'required|max_length[50]',
                'errors' => [
                    'required' => 'Tienes que ingresar un nombre de categoria',
                    'max_length' => 'El nombre de la categoria es muy largo'
                    ]
                ],
            'descripcion' => [
                'rules' => 'required|max_length[100]',
                'errors' => [
                    'required' => 'Tienes que ingresar una descripcion a la categoria',
                    'max_length' => 'La descripcion supera los 100 carácteres'
                    ]
                ],
        ]);



        $datos = [
            'nombre_categoria' => $nombre,
            'descripcion_categoria' => $descripcion,
            'activo' => $estado,
        ];

        
        
        if($validacion)
        {
            $categorias->update($id,$datos);
            if($datos['activo'] == 1)
            {
                return redirect()->to(route_to('categoriasOn'))->with('success', 'Categoria actualizada correctamente!');
            }else
            {
                return redirect()->to(route_to('categoriasOff'))->with('success', 'Categoria INACTIVA actualizada correctamente!');
    
            }
        }
        else
        {
            $datosCategorias = $categorias->where('id_categoria', $id)->first();

            $data = [
                'validation'=> $this->validator,
                'categoria' => $datosCategorias,
            ];
            return view('Categorias/editarCategoria', $data);
        }
        //dd($datos);

    }

}