<?php namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{

    //Definimos la tabla a usar
    protected $table = 'usuarios';
    //Definimos la llave
    protected $primaryKey = 'id_usuario';
    //Definimos los campos a modificar de la tabla
    protected $allowedFields = [
                                'id_persona',
                                'id_rol',
                                'activo'
                            ];
    

    protected $deleteField = 'activo';//Campo de la tabla para dar una Baja LOGICA
    
    //Creamos una variable que contenga la funcion agregarTipoUsuario, para insertar antes de agregar
    //Esto es un CallBack, propio de CI
    protected $beforeInsert = ['addTipoUsuario'];

    protected $asignartipousuario;

    protected function addTipoUsuario($data)
    {
        //'data' => Es un ARRAY con los valores que está insertando en la tabla, su nombre ya esta definido por CI
        //'id_rol' es el nombre del campo, en data tenemos id_rol, asi que la nombramos y le asignamos el grupo
        $data['data']['id_rol'] = $this->asignartipousuario;//la asignacion es con la FUNCION RolUsuario, ya que esa funcion
        //pone en la variable asignartipousuario, el numero del id_rol
        return $data;
    }
                        
    
    
    public function RolUsuario(string $tipoUsuario)
    {
        $row = $this->db->table('roles')
                ->where('nombre_rol', $tipoUsuario)
                ->get()->getRow();

        if($row != null)
        {
            $this->asignartipousuario = $row->id_rol;
        }
    }

}