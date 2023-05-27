<?php namespace App\Models;

use CodeIgniter\Model;

class ProductoModel extends Model
{

    //Definimos la tabla a usar
    protected $table = 'productos';
    //Definimos la llave
    protected $primaryKey = 'id_producto';
    //Definimos los campos a modificar de la tabla
    protected $allowedFields = [
                                'nombre_producto',
                                'descripcion_producto',
                                'precio',
                                'cantidad',
                                'url_imagen',
                                'activo',
                                'id_categoria'
                            ];

}