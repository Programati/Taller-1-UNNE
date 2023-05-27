<?php namespace App\Models;

use CodeIgniter\Model;

class PersonaModel extends Model
{

    //Definimos la tabla a usar
    protected $table = 'personas';
    //Definimos la llave
    protected $primaryKey = 'id_persona';
    //Definimos los campos a modificar de la tabla
    protected $allowedFields = [
                                'dni',
                                'nombre',
                                'apellido',
                                'telefono',
                                'email',
                                'id_domicilio',
                                'password',
                            ];

}