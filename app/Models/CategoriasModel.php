<?php namespace App\Models;

use CodeIgniter\Model;

class CategoriasModel extends Model
{

    //Definimos la tabla a usar
    protected $table = 'categorias';
    //Definimos la llave
    protected $primaryKey = 'id_categoria';
    //Definimos los campos a modificar de la tabla
    protected $allowedFields = [
                                'nombre_categoria',
                                'descripcion_categoria',
                                'activo'
                            ];




    
}