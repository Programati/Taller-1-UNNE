<?php namespace App\Libraries;

class Hash 
{
    //Recibimos un DATO y lo encriptamos
    public static function make($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    //Recibimos un dato y lo comparamos con el dato que hace referencia en la BD
    //En este caso, comparamos el password segun el email recibido
    public static function check($entered_password, $db_password)
    {
        if(password_verify($entered_password, $db_password))
        {
            return true;
        }else
        {
            return false;
        }
    }
}

?>