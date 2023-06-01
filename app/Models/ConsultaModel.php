<?php namespace App\Models;

use CodeIgniter\Model;

class ConsultaModel extends Model
{

    //Definimos la tabla a usar
    protected $table = 'consultas';
    //Definimos la llave
    protected $primaryKey = 'id_consulta';
    //Definimos los campos a modificar de la tabla
    protected $allowedFields = [
                                'id_usuario',
                                'asunto',
                                'email',
                                'mensaje',
                                'nombre',
                                'leido',
                            ];
    
    protected $useTimestamps = true;
    protected $createdField = 'fecha_create';
    protected $updatedField = 'fecha_updated';

    
}