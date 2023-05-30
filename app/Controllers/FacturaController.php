<?php

namespace App\Controllers;

use App\Models\FacturaModel;
use App\Models\DetalleFacturaModel;
use App\Models\DomicilioModel;
use App\Models\ProductoModel;

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
}
