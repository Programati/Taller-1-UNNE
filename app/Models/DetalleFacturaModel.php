<?php namespace App\Models;

use CodeIgniter\Model;

class DetalleFacturaModel extends Model
{

    //Definimos la tabla a usar
    protected $table = 'detallesfacturas';
    //Definimos la llave
    protected $primaryKey = 'id_detalle_factura';
    //Definimos los campos a modificar de la tabla
    protected $allowedFields = [
                                'id_factura',
                                'id_producto',
                                'cantidad',
                                'subTotal',
                            ];




    
}