<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class UsuarioYaLogueadoFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Redirigiremos al usuario a la página de inicio de sesion si no ha iniciado sesion
        if(session()->has('loggedUser'))
        {
            return redirect()->back();
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}