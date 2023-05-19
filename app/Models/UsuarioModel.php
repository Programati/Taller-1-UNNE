<?php namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{

    //Definimos la tabla a usar
    protected $table = 'usuarios';
    //Definimos la llave
    protected $primaryKey = 'id';
    //Definimos los campos a modificar de la tabla
    protected $allowedFields = [
                                'nombre',
                                'apellido',
                                'email',
                                'password'
                            ];

}