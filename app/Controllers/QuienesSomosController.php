<?php

namespace App\Controllers;

class QuienesSomosController extends BaseController
{
    public function index()
    {
        return view('Quienes_Somos/body_quienes_somos');
    }

}