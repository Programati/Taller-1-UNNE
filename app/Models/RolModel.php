<?php namespace App\Models;

use CodeIgniter\Model;

class RolModel extends Model
{

    //Definimos la tabla a usar
    protected $table = 'roles';
    //Definimos la llave
    protected $primaryKey = 'id_rol';
    //Definimos los campos a modificar de la tabla
    protected $allowedFields = [
                                'nombre_rol',
                                'descripcion_rol',
                                'activo'
                            ];




    
}