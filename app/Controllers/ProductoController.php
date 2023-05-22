<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsuarioModel;
use App\Models\ProductoModel;

class ProductoController extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form', 'FormularioError']);
    }

    //Siempre hay que crear el OBJETO usuario y el OBJETO producto
    public function index()
    {
        //Creamos el objeto de la Tabla Usuarios
        $datosUsuarios = new UsuarioModel();
        
        //Creamos el objeto de la Tabla Productos
        $productos = new ProductoModel();

        //Capturamos el ID del logueo del usuario reciente
        $id_usuario_logueado = session()->get('loggedUser');

        //Buscamos en el usuario logueado
        $info_usuario = $datosUsuarios->find($id_usuario_logueado);

        //Ponemos en una varaible todos los productos de la tabla PRODUCTOS
        $DatosProductos = $productos->orderBy('id', 'ASC')->findAll();

        //Array con 2 tipos de OBJETOS
        $data = [
            //Registro del usuario logueado
            'infoUsuarioLog' => $info_usuario,
            //Registros de todos los productos
            'productos' => $DatosProductos
        ];

        return view('productos/listar', $data);
    }
    
    public function crearProducto()
    {
        $data = [];
        return view('productos/crear', $data);
    
    
    }
    public function guardarProducto()
    {

        $validacion = $this->validate([
            'nombre' => [
                'rules' => 'required|max_length[50]',
                'errors' => [
                    'required' => 'Tienes que ingresar un nombre al producto',
                    'max_length' => 'El nombre del producto es muy largo'
                    ]
                ],
                //IMG es el NAME del INPUT donde cargamos la IMAGEN
            'img' => [
                'rules' => 'uploaded[img]|mime_in[img,image/jpg,image/jpeg,image/png]|max_size[img,1024]',
                'errors' => [
                    'uploaded' => 'Tienes que subir una imagen',
                    'mime_in' => 'Formato de imagen invalido, sólo subir(jpg/png)',
                    'max_size' => 'Archivo muy pesado, sólo hasta 1024MB',
                ]
            ]
        ]);



        if(!$validacion)
        {
            return view('productos/crear', ['validation'=>$this->validator]);
        }

        if($imagen = $this->request->getFile('img'))
        {

            $nombre = $this->request->getPost('nombre');
            $imagen = $this->request->getFile('img');
            
            $nuevoNombre = $imagen->getRandomName();
            $imagen->move('assets/img/magicshopctes/productos/uploads',$nuevoNombre);
            
            $datos = [
                'nombre' => $nombre,
                'imagen' => $nuevoNombre
            ];
            $productos = new ProductoModel();
    
            $productos->insert($datos);
        
            return redirect()->to(route_to('productos'))->with('success', 'Producto cargado correctamente!');
        }else
        {

            return redirect()->back()->with('fail', 'Error al intentar insertar datos en la BD');
        }


    }

    public function borrarProducto($id=null)
    {
        $producto = new ProductoModel();
        $datosProducto = $producto->where('id',$id)->first();

        $ruta = ('assets/img/magicshopctes/productos/uploads/'.$datosProducto['imagen']);
        unlink($ruta);

        $producto->where('id', $id)->delete($id);

        return redirect()->to(route_to('productos'))->with('success', 'Producto borrado correctamente!');
    }

    public function editarProducto($id=null)
    {
        //Creamos el objeto de la Tabla Usuarios
        $datosUsuarios = new UsuarioModel();
        
        //Creamos el objeto de la Tabla Productos
        $productos = new ProductoModel();

        //Capturamos el ID del logueo del usuario reciente
        $id_usuario_logueado = session()->get('loggedUser');

        //Buscamos en el objeto al usuario logueado
        $info_usuario = $datosUsuarios->find($id_usuario_logueado);

        
        $DatosProductos = $productos->where('id', $id)->first();

        $datos = [
            //Registro del usuario logueado
            'infoUsuarioLog' => $info_usuario,
            'producto' => $DatosProductos
        ];

        
        return view('productos/editar',$datos);
    }
//FALTAN VALIDACIONES
    public function actualizarProducto($id=null)
    {
        $producto = new ProductoModel();

        $nombre = $this->request->getPost('nombre');
        $id = $this->request->getVar('id');

        $datos = [
            'nombre' => $nombre
        ];

        $producto->update($id,$datos);

        $validacion = $this->validate([
            'imagen' => [
                'uploaded[imagen]',
                'mime_in[imagen,image/jpg,image/jpeg,image/png]',
                'max_size[imagen,1024]'
            ]
            ]);
        

        if($validacion)
        {
            if($imagen = $this->request->getFile('imagen'))
            {
                $datosProducto=$producto->where('id',$id)->first();

                $ruta = ('assets/img/magicshopctes/productos/uploads/'.$datosProducto['imagen']);
                unlink($ruta);
                
                $nuevoNombre = $imagen->getRandomName();
                $imagen->move('assets/img/magicshopctes/productos/uploads',$nuevoNombre);
                
                $datos = [
                    'imagen' => $nuevoNombre
                ];
        
                $producto->update($id,$datos);
            
            }
            
            
        }
        return redirect()->to(route_to('productos'))->with('success', 'Producto actualizado correctamente!');
    }

}