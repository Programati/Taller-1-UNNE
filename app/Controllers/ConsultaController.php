<?php

namespace App\Controllers;


use App\Models\ConsultaModel;
use App\Models\UsuarioModel;
use App\Models\PersonaModel;


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
                // return view('Contacto/contacto', ['validation'=>$this->validator]);
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
    
    public function listaConsultasUsuarios()
    {
        $consultas = new ConsultaModel();
        // ACTUALIZAMOS LA LISTA DE CONSULTAS NO LEIDAS
        $asociar = [
            'consultas' => $consultas->where('leido', 0)->findAll(),
        ];
        session()->set(array_merge(session()->get(),$asociar));

        // TRAMOS TODAS LAS CONSULTAS A LA VISTA
        $listaConsultas = $consultas->where('id_usuario!=', null)->findAll();

        $data = [
            'listaConsultas' => $listaConsultas,
        ];

        return view('Contacto/verConsultasUsuarios', $data);
    }

    public function listaConsultasNoUsuarios()
    {
        $consultas = new ConsultaModel();
        // ACTUALIZAMOS LA LISTA DE CONSULTAS NO LEIDAS
        $asociar = [
            'consultas' => $consultas->where('leido', 0)->findAll(),
        ];
        session()->set(array_merge(session()->get(),$asociar));

        // TRAMOS TODAS LAS CONSULTAS A LA VISTA
        $listaConsultas = $consultas->where('id_usuario', null)->findAll();

        $data = [
            'listaConsultas' => $listaConsultas,
        ];

        return view('Contacto/verConsultasNoUsuarios', $data);
    }

    public function consultaLeida($id=null)
    {
        $consultas = new ConsultaModel();

        $datos = [
            'leido' => 1,
        ];

        $consultas->where('id_consulta', $id)->update($id,$datos);
        //Traemos el array de consultas de la sesion
        $arrayViejo = session()->get('consultas');
        //dd(session()->get('consultas'));
        //La recorremos
        for($x = 0; $x < count($arrayViejo); $x++) 
        {
            //dd($arrayViejo);
            if($arrayViejo[$x]['id_consulta'] == $id)
            {
                //Sacamos el mensaje leido del array consulas de la session
                unset($arrayViejo[$x]);
                $arrayViejo = array_values($arrayViejo);
                break;
            }
        }
        //Ponemos al array dentro de una variable
        $asociar = [
            'consultas' => $arrayViejo,
        ];
        //Actualizamos la sesion con el array de consultas
        session()->set(array_merge(session()->get(),$asociar));

        $listaConsultas = $consultas->findAll();

        $data = [
            'listaConsultas' => $listaConsultas,
        ];
        
        if($consultas->where('id_consulta', $id)->first()['id_usuario'] != null)
        {
            return redirect()->to(route_to('listaConsultasUsuarios', $data));
        }else
        {
            return redirect()->to(route_to('listaConsultasNoUsuarios', $data));
        }

    }

    public function buscarConsultaUsuarios()
    {
        $consultas = new ConsultaModel();
        // ACTUALIZAMOS LA LISTA DE CONSULTAS NO LEIDAS
        $asociar = [
            'consultas' => $consultas->where('leido', 0)->findAll(),
        ];
        session()->set(array_merge(session()->get(),$asociar));


        $fecha = $this->request->getPost('fecha');
        $encontrado = $consultas->where('fecha_create', $fecha)->where('id_usuario!=', null)->findAll();

        $data = [
            'listaConsultas' => $encontrado,
        ];

        return view('Contacto/verConsultasUsuarios', $data);
    }

    public function buscarConsultaNoUsuario()
    {
        $consultas = new ConsultaModel();
        // ACTUALIZAMOS LA LISTA DE CONSULTAS NO LEIDAS
        $asociar = [
            'consultas' => $consultas->where('leido', 0)->findAll(),
        ];
        session()->set(array_merge(session()->get(),$asociar));


        $fecha = $this->request->getPost('fecha');
        $encontrado = $consultas->where('fecha_create', $fecha)->where('id_usuario', null)->findAll();

        $data = [
            'listaConsultas' => $encontrado,
        ];

        return view('Contacto/verConsultasNoUsuarios', $data);
    }
}