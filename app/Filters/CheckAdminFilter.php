<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\UsuarioModel;

class CheckAdminFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if(!session()->has('loggedUser'))
        {
            return redirect()->to(route_to('login'))->with('fail', 'Necesitas iniciar sesion para acceder');
        }

        $item = $_SESSION;
        //dd($item);
        //dd($item['loggedUser']); //VEMOS LO QUE TRAE LA VARIABLE

        $datosUsuarios = new UsuarioModel();

        //Buscamos en el objeto USUARIO el ID de la persona => Se convierte en un Array
        $info_usuario = $datosUsuarios->where( 'id_persona', $item['loggedUser'])->findAll();
        //dd(gettype($info_usuario), $info_usuario, $info_usuario['0']['id_rol']); //Vemos el contenido de la variable

        // Redirigiremos al usuario a la página de inicio de sesion si no es ADMIN
        //El Array es de 1 fila, que tiene dentro 4 filas con 1 columna cada una, id_usuario/id_persona_id_rol/activo
        if($info_usuario['0']['id_rol'] != 1)
        {
            return redirect()->to(route_to('/'))->with('fail', 'Necesitas ser ADMINISTRADOR para acceder');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}