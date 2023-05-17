<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data=[];
        return view('inicio/bodyPrincipal', $data);
    }        
}
