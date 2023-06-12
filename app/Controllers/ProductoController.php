<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsuarioModel;
use App\Models\PersonaModel;
use App\Models\ProductoModel;
use App\Models\CategoriasModel;
use App\Models\FacturaModel;
use App\Models\DetalleFacturaModel;

class ProductoController extends BaseController
{
    public function __construct()
    {
        //Siempre hay que ponerlos para que los validadores de errores funcionen
        helper(['url', 'form', 'FormularioError']);
    }

    public function index()
    {
        //Creamos el objeto de la Tabla Productos
        $productos = new ProductoModel();

        //Ponemos en una varaible todos los productos de la tabla PRODUCTOS
        // $DatosProductos = $productos->orderBy('cantidad', 'ASC')->where('activo', 1)->findAll();
        $DatosProductos = $productos->orderBy('cantidad', 'ASC')->where('activo', 1)->findAll();

        $data = [
            'productos' => $DatosProductos,
        ];

        return view('productos/productosActivos', $data);
    }
    public function productosDesactivados()
    {
        //Creamos el objeto de la Tabla Productos
        $productos = new ProductoModel();

        //Ponemos en una varaible todos los productos de la tabla PRODUCTOS
        $DatosProductos = $productos->orderBy('id_producto', 'ASC')->where('activo', 0)->findAll();

        $data = [
            //Registros de todos los productos
            'productos' => $DatosProductos
        ];

        return view('productos/productosInactivos', $data);
    }
    
    public function crearProducto()
    {
        $datosCategoria = new CategoriasModel();

        $data = [
            'categorias' => $datosCategoria->findAll(),
        ];
        return view('productos/crear', $data);
    
    
    }
    
    public function guardarProducto()
    {
        $datosCategoria = new CategoriasModel();        

        $validacion = $this->validate([
            'nombre' => [
                'rules' => 'required|max_length[50]',
                'errors' => [
                    'required' => 'Tienes que ingresar un nombre al producto',
                    'max_length' => 'El nombre del producto es muy largo'
                    ]
                ],
            'precio' => [
                'rules' => 'required|max_length[12]|decimal',
                'errors' => [
                    'required' => 'Tienes que ingresar un precio al producto',
                    'max_length' => 'El precio del producto es muy largo',
                    'decimal' => 'Formato inválido'
                    ]
                ],
            'cantidad' => [
                'rules' => 'required|max_length[11]|is_natural',
                'errors' => [
                    'required' => 'Tienes que ingresar una cantidad al producto',
                    'max_length' => 'La cantidad del producto es muy largo',
                    'is_natural' => 'Sólo números enteros'
                    ]
                ],
            'categoria' => [
                'rules' => 'required|is_not_unique[categorias.id_categoria]',
                'errors' => [
                    'required' => 'Tienes que elegir una categoria para el producto',
                    'is_not_unique' => 'La categoria no existe'
                    ]
                ],
                //IMG es el NAME del INPUT donde cargamos la IMAGEN
            'img' => [
                'rules' => 'uploaded[img]|mime_in[img,image/jpg,image/jpeg,image/png]|max_size[img,1024]',
                'errors' => [
                    'uploaded' => 'Tienes que subir una imagen',
                    'mime_in' => 'Formato de imagen invalido, sólo subir(jpg/png)',
                    'max_size' => 'Archivo muy pesado, sólo hasta 1024KB',
                ]
            ]
        ]);

        $data = [
            'validation'=> $this->validator,
            'categorias' => $datosCategoria->findAll(),
        ];



        if(!$validacion)
        {
            return view('productos/crear', $data);
        }

        if($imagen = $this->request->getFile('img'))
        {

            $nombre = $this->request->getPost('nombre');
            $precio = $this->request->getPost('precio');
            $cantidad = $this->request->getPost('cantidad');
            $categoria = $this->request->getPost('categoria');
            $imagen = $this->request->getFile('img');
            $descripcion = $this->request->getPost('descripcion');
            $estado = $this->request->getPost('estado');
            
            
            $nuevoNombre = $imagen->getRandomName();
            $imagen->move('assets/img/magicshopctes/productos/uploads',$nuevoNombre);
            
            $datos = [
                'nombre_producto' => $nombre,
                'descripcion_producto' => $descripcion,
                'precio' => $precio,
                'cantidad' => $cantidad,
                'url_imagen' => $nuevoNombre,
                'activo' => $estado,
                'id_categoria' => $categoria
            ];
            $productos = new ProductoModel();
    
            $productos->insert($datos);

            if($datos['activo'] == 1)
            {
                return redirect()->to(route_to('productosOn'))->with('success', 'Producto cargado correctamente!');
            }else
            {
                return redirect()->to(route_to('productosOff'))->with('success', 'Producto creado correctamente! Se ecuentra INACTIVO');

            }
        }else
        {

            return redirect()->back()->with('fail', 'Error al intentar insertar datos en la BD');
        }


    }

    public function borrarProducto($id=null)
    {
        $producto = new ProductoModel();
        $datos = [
            'activo' => 0,
        ];
        $producto->where('id_producto', $id)->update($id,$datos);


        return redirect()->to(route_to('productosOn'))->with('success', 'El producto fue DESACTIVADO correctamente!');
    }

    public function activarProducto($id=null)
    {
        $producto = new ProductoModel();
        $datos = [
            'activo' => 1,
        ];
        $producto->where('id_producto', $id)->update($id,$datos);

        return redirect()->to(route_to('productosOff'))->with('success', 'El producto fue ACTIVADO correctamente!');
    }

    public function editarProducto($id=null)
    {
        $productos = new ProductoModel();
        $datosCategoria = new CategoriasModel();

        $DatosProductos = $productos->where('id_producto', $id)->first();
        

        $datos = [
            'producto' => $DatosProductos,
            'categorias' => $datosCategoria->findAll(),
            'categoriaEditar' => $datosCategoria->where('id_categoria',$DatosProductos['id_categoria'])->first()
        ];

        return view('productos/editar',$datos);
    }

    public function actualizarProducto($id=null)
    {
        $datosCategoria = new CategoriasModel(); 
        $producto = new ProductoModel();

        $id = $this->request->getVar('id');
        $nombre = $this->request->getPost('nombre');
        $precio = $this->request->getPost('precio');
        $cantidad = $this->request->getPost('cantidad');
        $categoria = $this->request->getPost('categoria');
        $imagen = $this->request->getFile('img');
        $descripcion = $this->request->getPost('descripcion');
        $estado = $this->request->getPost('estado');


        $validacion = $this->validate([
            'nombre' => [
                'rules' => 'required|max_length[50]',
                'errors' => [
                    'required' => 'Dejaste en blanco el nombre al guardar',
                    'max_length' => 'El nombre del producto es muy largo'
                    ]
                ],
            'precio' => [
                'rules' => 'required|max_length[12]|decimal',
                'errors' => [
                    'required' => 'Tienes que ingresar un precio al producto',
                    'max_length' => 'El precio del producto es muy largo',
                    'decimal' => 'Formato inválido'
                    ]
                ],
            'cantidad' => [
                'rules' => 'required|max_length[11]|is_natural',
                'errors' => [
                    'required' => 'Tienes que ingresar una cantidad al producto',
                    'max_length' => 'La cantidad del producto es muy largo',
                    'is_natural' => 'Sólo números enteros'
                    ]
                ],
            'categoria' => [
                'rules' => 'required|is_not_unique[categorias.id_categoria]',
                'errors' => [
                    'required' => 'Tienes que elegir una categoria para el producto',
                    'is_not_unique' => 'La categoria no existe'
                    ]
                ],
                //IMG es el NAME del INPUT donde cargamos la IMAGEN
            'img' => [
                'rules' => 'mime_in[img,image/jpg,image/jpeg,image/png]|max_size[img,1024]',
                'errors' => [
                    'mime_in' => 'Formato de imagen invalido, sólo subir(jpg/png)',
                    'max_size' => 'Archivo muy pesado, sólo hasta 1024KB',
                ]
            ]
        ]);


        $datos = [
                'nombre_producto' => $nombre,
                'descripcion_producto' => $descripcion,
                'precio' => $precio,
                'cantidad' => $cantidad,
                'activo' => $estado,
                'id_categoria' => $categoria
            ];

        

        if($validacion)
        {
            $producto->update($id,$datos);

            $imagen = $this->request->getFile('img');

            if($imagen->getname() != null)
            {
                //Obtenemos el producto con el ID escondido del formulario
                $datosProducto=$producto->where('id_producto',$id)->first();
                $ruta = ('assets/img/magicshopctes/productos/uploads/'.$datosProducto['url_imagen']);
                unlink($ruta);
                
                $nuevoNombre = $imagen->getRandomName();
                $imagen->move('assets/img/magicshopctes/productos/uploads',$nuevoNombre);
                
                $img = [
                    'url_imagen' => $nuevoNombre
                ];
        
                $producto->update($id,$img);
                
            }

            if($datos['activo'] == 1)
            {
                return redirect()->to(route_to('productosOn'))->with('success', 'Producto actualizado correctamente!');
            }else
            {
                return redirect()->to(route_to('productosOff'))->with('success', 'Producto INACTIVO actualizado correctamente!');
    
            }    
        }
        else
        {

            $DatosProductos = $producto->where('id_producto', $id)->first();

            $data = [
                'validation'=> $this->validator,
                'categorias' => $datosCategoria->findAll(),
                'producto' => $DatosProductos,
                'categoriaEditar' => $datosCategoria->where('id_categoria',$DatosProductos['id_categoria'])->first()
            ];
            return view('productos/editar',$data);
        }

    }

    public function carrito($id=null,$numFiltro=null)
    {
        
        $producto = new ProductoModel();
        
        $elegido = $producto->where('id_producto', $id)->first();

        if(session()->get('productos') == null)
        {
            //Creamos un arreglo vacio contenedor
            $total = array();
            //Creamos un arreglo con el producto añadido al carrito
            //$productoElegido = array('id' => $id, 'cantidad' => 1);
            $productoElegido = array('id' => $id, 'cantidad' => 1, 'subTotal' => $elegido['precio']);
            //Metemos al arreglo contenedor el arreglo añadido al carrito
            array_push($total, $productoElegido);
            //Descontamos 1 al producto en stock
            $datos = [
                'cantidad' => $elegido['cantidad'] - $productoElegido['cantidad'],
            ];
            
            $asociar = [
                'productos' => $total,
            ];
            //Metemos el array asociadito productos a la sesion
            session()->set(array_merge(session()->get(),$asociar));
        }else
        {
            $total = session()->get('productos');
            //$productoElegido = array('id' => $id, 'cantidad' => 1);
            $productoElegido = array('id' => $id, 'cantidad' => 1, 'subTotal' => $elegido['precio']);
            array_push($total, $productoElegido);
            $datos = [
                'cantidad' => $elegido['cantidad'] - $productoElegido['cantidad'],
            ];
            $asociar = [
                'productos' => $total,
            ];
            //dd($total);
            session()->set(array_merge(session()->get(),$asociar));
        }
        //Actualizamos la cantidad del producto con la variable $datos=(cantidadEnLaBD - 1)
        $producto->where('id_producto', $id)->update($id,$datos);

        //Ordenamos el arreglo productos
        $result = array();
        $PrecioTotal = 0;
        foreach(session()->get('productos') as $t) 
        {
            $repeat=false;
            for($i=0;$i<count($result);$i++)
            {
                if($result[$i]['id']==$t['id'])
                {
                    $result[$i]['cantidad']+=$t['cantidad'];
                    $result[$i]['subTotal']+=$t['subTotal'];
                    $repeat=true;
                    break;
                }
            }
            if($repeat==false)
                $result[] = array('id' => $t['id'], 'cantidad' => $t['cantidad'], 'subTotal' => $t['subTotal']);
                $PrecioTotal = $PrecioTotal + $t['subTotal'];
        }
        $asociar = [
            'productosOrdenados' => $result,
            'SumaPrecioProductos' => $PrecioTotal,
        ];
        //Creamos y Actualizamos un arreglo nuevo con los productos ordenados
        session()->set(array_merge(session()->get(),$asociar));
        
        //Redireccionamos a la función FILTRADO para volver a ver los mismos productos filtrados
        return redirect()->to('filtrado'.$numFiltro)->with('success', 'Agregado al carrito');
    }

    public function vaciarCarrito($id=null)
    {

        $producto = new ProductoModel();
        $elegido = $producto->where('id_producto', $id)->first();
        $datos = [
            'cantidad' => $elegido['cantidad'] + 1,
        ];

        $arrayViejo = session()->get('productos');

        for($x = 0; $x < count($arrayViejo); $x++) 
        {
            if($arrayViejo[$x]['id'] == $id)
            {
                unset($arrayViejo[$x]);
                break;
            }
        }
        $arrayViejo = array_values($arrayViejo);

        $asociar = [
            'productos' => $arrayViejo,
        ];
        $producto->where('id_producto', $id)->update($id,$datos);
        session()->remove('productos');
        session()->set(array_merge(session()->get(),$asociar));

        //Ordenamos el arreglo productos
        $result = array();
        $PrecioTotal = 0;
        foreach(session()->get('productos') as $t) 
        {
            $repeat=false;
            for($i=0;$i<count($result);$i++)
            {
                if($result[$i]['id']==$t['id'])
                {
                    $result[$i]['cantidad']+=$t['cantidad'];
                    $result[$i]['subTotal']+=$t['subTotal'];
                    $repeat=true;
                    break;
                }
            }
            if($repeat==false)
                $result[] = array('id' => $t['id'], 'cantidad' => $t['cantidad'], 'subTotal' => $t['subTotal']);
                $PrecioTotal = $PrecioTotal + $t['subTotal'];
        }
        $asociar = [
            'productosOrdenados' => $result,
            'SumaPrecioProductos' => $PrecioTotal,
        ];
        //Creamos y Actualizamos un arreglo nuevo con los productos ordenados
        session()->set(array_merge(session()->get(),$asociar));

        return redirect()->to(route_to('carritoCompras'))->with('success', '1 producto se ha sacado de la lista');
    }
    
    public function vacioTotalCarrito()
    {

        $producto = new ProductoModel();
        $arrayViejo = session()->get('productos');
        //Devolvemos producto x producto a la BD
        for($x = 0; $x < count($arrayViejo); $x++) 
        {
            $elegido = $producto->where('id_producto', $arrayViejo[$x]['id'])->first();
            $datos = [
                'cantidad' => $elegido['cantidad'] + 1,
            ];
            $producto->where('id_producto', $arrayViejo[$x]['id'])->update($arrayViejo[$x]['id'],$datos);
        }
        //Ponemos en 0 a los array
        $asociar = [
            'productos' => '',
            'productosOrdenados' => '',
            'SumaPrecioProductos' => ''
        ];
        session()->set(array_merge(session()->get(),$asociar));

        return redirect()->to(route_to('carritoCompras'))->with('success', 'Todos los productos fueron quitados');
    }

    public function indexCompras()
    {
        $productos = new ProductoModel();
        $data = [
            'productosBD' => $productos->where('activo', 1)->findAll()
        ];

        return view('carritoCompras', $data);
    }
    public function confirmarCompra()
    {

        $datosFactura = [
            'id_usuario' => session()->get('id_usuario'),
            'importe_total' => session()->get('SumaPrecioProductos'),
        ];
        //dd($datosFactura);

        $factura = new FacturaModel();
        $factura->save($datosFactura);
        $ultimo_id = $factura->insertID();

        foreach(session()->get('productosOrdenados') as $PO) 
        {
            $datosDetalleFactura = [
                'id_factura' => $ultimo_id,
                'id_producto' => $PO['id'],
                'cantidad' => $PO['cantidad'],
                'subTotal' => $PO['subTotal'],
            ];
            //dd($datosFactura,$datosDetalleFactura);
            $detalleFactura = new DetalleFacturaModel();
            $detalleFactura->save($datosDetalleFactura);
        }
        //Ponemos en 0 a los array
        $asociar = [
            'productos' => '',
            'productosOrdenados' => '',
            'SumaPrecioProductos' => ''
        ];
        session()->set(array_merge(session()->get(),$asociar));
        
        return redirect()->to(route_to('catalogo'))->with('success', 'Gracias por su compra!');
    }

    public function buscarProductoActivo()
    {
        $productos = new ProductoModel();
        $nombre = $this->request->getPost('nombre');
        $encontrado = $productos->where('activo', 1)->like('nombre_producto', $nombre)->findAll();

        $data = [
            'productos' => $encontrado,
            ];
        return view('productos/productosActivos', $data);
    }
    public function buscarProductoInActivo()
    {
        $productos = new ProductoModel();
        $nombre = $this->request->getPost('nombre');
        //$encontrado = $producto->where('nombre_producto', $nombre)->findAll();
        $encontrado = $productos->where('activo', 0)->like('nombre_producto', $nombre)->findAll();

        $data = [
            'productos' => $encontrado,
            ];
        return view('productos/productosInactivos', $data);
    }

}