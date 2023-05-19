<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthCheckFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Redirigiremos al usuario a la página de inicio de sesion si no ha iniciado sesion
        if(!session()->has('loggedUser'))
        {
            return redirect()->to(route_to('login'))->with('fail', 'Necesitas iniciar sesion para acceder');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}