<?php namespace App\Models;

use CodeIgniter\Model;

class FacturaModel extends Model
{

    //Definimos la tabla a usar
    protected $table = 'facturas';
    //Definimos la llave
    protected $primaryKey = 'id_factura';
    //Definimos los campos a modificar de la tabla
    protected $allowedFields = [
                                'id_usuario',
                                'importe_total',
                            ];

    protected $useTimestamps = true;
    protected $createdField = 'fecha_factura';
    protected $updatedField = 'fecha_updated';
    
}