<?php namespace App\Models;

use CodeIgniter\Model;

class ProductoModel extends Model
{

    //Definimos la tabla a usar
    protected $table = 'productos';
    //Definimos la llave
    protected $primaryKey = 'id';
    //Definimos los campos a modificar de la tabla
    protected $allowedFields = [
                                'nombre',
                                'imagen'
                            ];

}