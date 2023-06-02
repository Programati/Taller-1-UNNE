<?php

namespace App\Controllers;

use App\Models\FacturaModel;
use App\Models\DetalleFacturaModel;
use App\Models\DomicilioModel;
use App\Models\ProductoModel;
use App\Models\UsuarioModel;
use App\Models\PersonaModel;

class FacturaController extends BaseController
{
    public function index()
    {
        $factura = new FacturaModel();
        $detalleFactura = new DetalleFacturaModel();
        $domicilio = new DomicilioModel();
        $productos = new ProductoModel();

        $facturaUsuario = $factura->where('id_usuario', session()->get('id_usuario'))->findAll();


        //Array de los detalles de las facturas que sólo le pertenecen al USUARIO
        $detalleFacturaUsuario = array();
        $detalle = array();
        $productoDetalle = array();
        
        //Recorremos todas las facturas del usuario
        for($i=0;$i<count($facturaUsuario);$i++)
        {
            //Ponemos en un array todas las tablas detalle de cada factura
            //La factura 1 va a contener varios arrays si es que tiene mas de 1 producto
            array_push($detalleFacturaUsuario, $detalleFactura->where('id_factura', $facturaUsuario[$i]['id_factura'])->find() );
        }

        //Recorremos todo el array que contiene arrays de detalles
        for($i=0;$i<count($detalleFacturaUsuario);$i++)
        {
            //Recorremos cada array de detalle
            foreach ($detalleFacturaUsuario[$i] as $key => $value) {
                //Buscamos el producto del id_producto de cada array de detalle
                $productoDetalle = $productos->where('id_producto',$value['id_producto'])->first();
                //agregamos el nombre del producto al array de detalle
                $detalleFacturaUsuario[$i][$key]['nombre_producto'] = $productoDetalle['nombre_producto'];
            }
        }
        
        $domicilioUsuario = $domicilio->where('id_domicilio', session()->get('id_domicilio'))->first();

        $data=[
            'facturaUsuario' => $facturaUsuario,
            'domicilioUsuario' => $domicilioUsuario,
            'detalleFactura' => $detalleFacturaUsuario,
        ];
        return view('Facturas/factura', $data);
    }
    
    public function allFacturas()
    {
        $usuarios = new UsuarioModel();
        $personas = new PersonaModel();
        $facturas = new FacturaModel();
        $detallesFacturas = new DetalleFacturaModel();
        $productos = new ProductoModel();

        $datos = [
            'usuarios' => $usuarios->where('id_rol', 2)->findAll(),
            'personas' => $personas->findAll(),
            'facturas' => $facturas->findAll(),
            'detallesFacturas' => $detallesFacturas->findAll(),
            'productos' => $productos->findAll(),
        ];

        return view('Facturas/allFacturas', $datos);

    }

    public function allFacturasUsuario()
    {
        $facturas = new FacturaModel();
        $detallesFacturas = new DetalleFacturaModel();
        $productos = new ProductoModel();

        $misFacturas = $facturas->where('id_usuario', session()->get('id_usuario'))->findAll();
        $misDetallesFactura = array();
        

        foreach ($misFacturas as $key => $value) {

            foreach ($detallesFacturas->where('id_factura', $value['id_factura'])->findAll() as $keyD => $valueD) {

                if($value['id_factura'] == $valueD['id_factura'])
                {
                    array_push($misDetallesFactura, $valueD);
                }
            }
        }

        $datos = [
            'facturas' => $misFacturas,
            'detallesFacturas' => $misDetallesFactura,
            'productos' => $productos->findAll(),
        ];

        return view('Facturas/allFacturasUsuario', $datos);

    }

    public function facturaUnica($id=null)
    {
        $usuario = new UsuarioModel();
        $persona = new PersonaModel();
        $productos = new ProductoModel();
        $domicilio = new DomicilioModel();
        $factura = new FacturaModel();
        $detalleFactura = new DetalleFacturaModel();

        $facturaUsuario = $factura->where('id_factura', $id)->first();
        $usuarioElegido = $usuario->where('id_usuario', $facturaUsuario['id_usuario'])->first();
        $personaElegida = $persona->where('id_persona', $usuarioElegido['id_persona'])->first();
        $detallesElegidos = $detalleFactura->where('id_factura', $id)->findAll();
        $allProductos = $productos->findAll();
        

        //dd($facturaUsuario, $usuarioElegido, $personaElegida, $detallesElegidos);

        //Array de los detalles de las facturas que sólo le pertenecen al USUARIO
        $detalleFacturaUsuario = array();
        $productoDetalle = array();
        
        //Recorremos todas las facturas del usuario
        
        foreach ($detallesElegidos as $key => $value) {
            //echo $value['subTotal']."<br>";
            //echo $value['id_producto']."<br>";
            //array_push($detalleFacturaUsuario, $detalleFactura->where('id_factura', $facturaUsuario['id_factura'])->find() );
            foreach ($allProductos as $keyP => $valueP) {
                if($valueP['id_producto'] == $value['id_producto'])
                {
                    //echo $valueP['nombre_producto']."<br>";
                    $detallesElegidos[$key]['nombre_producto'] = $valueP['nombre_producto'];
                }
            }
        }

        //dd($detallesElegidos);

        
        $domicilioUsuario = $domicilio->where('id_domicilio', $personaElegida['id_domicilio'])->first();

        $data=[
            'usuario' => $usuarioElegido,
            'persona' => $personaElegida,
            'facturaUsuario' => $facturaUsuario,
            'domicilioUsuario' => $domicilioUsuario,
            'detalleFactura' => $detallesElegidos,
        ];
        //dd($data);

        return view('Facturas/facturaUnica', $data);

    }

    public function facturaUnicaUsuario($id=null)
    {
        $productos = new ProductoModel();
        $domicilio = new DomicilioModel();
        $factura = new FacturaModel();
        $detalleFactura = new DetalleFacturaModel();

        $facturaUsuario = $factura->where('id_factura', $id)->first();
        $detallesElegidos = $detalleFactura->where('id_factura', $id)->findAll();
        $allProductos = $productos->findAll();
        
        //Recorremos todas las facturas del usuario
        
        foreach ($detallesElegidos as $key => $value) {
            //echo $value['subTotal']."<br>";
            //echo $value['id_producto']."<br>";
            //array_push($detalleFacturaUsuario, $detalleFactura->where('id_factura', $facturaUsuario['id_factura'])->find() );
            foreach ($allProductos as $keyP => $valueP) {
                if($valueP['id_producto'] == $value['id_producto'])
                {
                    //echo $valueP['nombre_producto']."<br>";
                    $detallesElegidos[$key]['nombre_producto'] = $valueP['nombre_producto'];
                }
            }
        }

        //dd($detallesElegidos);

        
        $domicilioUsuario = $domicilio->where('id_domicilio', session()->get('id_domicilio'))->first();
        

        $data=[
            'facturaUsuario' => $facturaUsuario,
            'domicilioUsuario' => $domicilioUsuario,
            'detalleFactura' => $detallesElegidos,
        ];
        //dd($data);

        return view('Facturas/facturaUnicaUsuario', $data);

    }
}
