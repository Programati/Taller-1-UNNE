<?php

namespace App\Controllers;


use App\Models\ConsultaModel;


class ConsultaController extends BaseController
{
    public function __construct()
    {
        //url = Archivos con _helper y que estan en el CodeIgniter
        //form = Hacemos referencia al HELPER form del sistema propio de CodeIgniter
        //En este caso, creamos un FORMULARIOERROR propio, asi que tambien lo agregamos al arreglo del HELPER
        helper(['url','form','FormularioError']);

    }
    public function index()
    {
        if(session()->get('loggedUser'))
        {
            $validacionesFormulario = $this->validate([
                'asunto' => [
                    'rules' => 'required|max_length[50]',
                    'errors' => [
                        'required' => 'Tienes que ingresar un asunto',
                        'max_length' => 'El asunto es muy largo'
                        ]
                    ],
                'mensaje' => [
                    'rules' => 'required|max_length[256]',
                    'errors' => [
                        'required' => 'Tienes que escribir un mensaje',
                        'max_length' => 'El mensaje es muy largo, puedes enviar varios'
                        ]
                    ],
            ]);
            if(!$validacionesFormulario)
            {
                return view('Contacto/contacto', ['validation'=>$this->validator]);
            }else
            {
                $asunto = $this->request->getPost('asunto');
                $mensaje = $this->request->getPost('mensaje');

                $consulta = new ConsultaModel();

                $data = [
                    'id_usuario' => session()->get('id_usuario'),
                    'asunto' => $asunto,
                    'email' => session()->get('email'),
                    'mensaje' => $mensaje,
                    'nombre' => session()->get('nombre'),
                    'leido' => 0,
                ];
                $consulta->save($data);
                return redirect()->to(route_to('contacto'))->with('success', 'Mensaje enviado! Te estaremos contestanto a la brevedad');
            }
        }else
        {
            $validacionesFormulario = $this->validate([
                'nombre' => [
                    'rules' => 'required|max_length[50]',
                    'errors' => [
                        'required' => 'Tienes que ingresar un nombre',
                        'max_length' => 'El nombre es muy largo'
                        ]
                    ],
                'asunto' => [
                    'rules' => 'required|max_length[50]',
                    'errors' => [
                        'required' => 'Tienes que ingresar un asunto',
                        'max_length' => 'El asunto es muy largo'
                        ]
                    ],
                'email' => [
                    'rules' => 'required|max_length[50]|valid_email',
                    'errors' => [
                        'required' => 'Tienes que ingresar tu correo electronico',
                        'max_length' => 'El correo electronico es muy largo',
                        'valid_email' => 'Tienes que ingresar un correo electronico válido',
                        ]
                    ],
                'mensaje' => [
                    'rules' => 'required|max_length[256]',
                    'errors' => [
                        'required' => 'Tienes que escribir un mensaje',
                        'max_length' => 'El mensaje es muy largo, puedes enviar varios'
                        ]
                    ],
            ]);
            if(!$validacionesFormulario)
            {
                return view('Contacto/contacto', ['validation'=>$this->validator]);
            }else
            {
                $nombre = $this->request->getPost('nombre');
                $asunto = $this->request->getPost('asunto');
                $email = $this->request->getPost('email');
                $mensaje = $this->request->getPost('mensaje');

                $consulta = new ConsultaModel();

                $data = [
                    'asunto' => $asunto,
                    'email' => $email,
                    'mensaje' => $mensaje,
                    'nombre' => $nombre,
                    'leido' => 0,
                ];
                $consulta->save($data);
                return redirect()->to(route_to('contacto'))->with('success', 'Mensaje enviado! Te estaremos contestanto a la brevedad');
            }

        }
        


        $data=[];
        return view('Contacto/contacto', $data);
    }        
}