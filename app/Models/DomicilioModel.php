<?php namespace App\Models;

use CodeIgniter\Model;

class DomicilioModel extends Model
{

    //Definimos la tabla a usar
    protected $table = 'domicilios';
    //Definimos la llave
    protected $primaryKey = 'id_domicilio';
    //Definimos los campos a modificar de la tabla
    protected $allowedFields = [
                                'calle',
                                'numero',
                                'codigo_postal',
                                'localidad',
                                'provincia',
                                'pais'
                            ];

}