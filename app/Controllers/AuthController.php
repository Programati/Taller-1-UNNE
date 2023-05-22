<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsuarioModel;
use App\Libraries\Hash;

class AuthController extends BaseController
{
    //Para usar los HELPERS (Formulario_helper), hay que definir un constructor
    public function __construct()
    {
        //url = Archivos con _helper y que estan en el CodeIgniter
        //form = Hacemos referencia al HELPER form del sistema propio de CodeIgniter
        //En este caso, creamos un FORMULARIOERROR propio, asi que tambien lo agregamos al arreglo del HELPER
        helper(['url','form','FormularioError']);
    }

    //PANTALLA DE LOGUEO
    public function formularioLogin()
    {
        $data = [];
        return view('Auth/login', $data);
    }

    //PANTALLA DE FORMULARIO PARA REGISTRAR USUARIOS
    public function formularioRegistro()
    {
        $data = [];
        return view('Auth/registrarse', $data);
    }

    //GUARDAR DATOS DEL FORMULARIO DE REGISTRO DE USUARIOS
    public function guardarRegistro()
    {
        //Validaremos los inputs del POST recibido por Formulario Registro
        //Pero pondremos nuestros propios mensajes de error para cada validacion incorrecta
        //Todos los campos son los NAME de cada INPUT del Formulario Registro        
        $validacionesFormulario = $this->validate([
            'nombre' => [
                'rules' => 'required|max_length[50]',
                'errors' => [
                    'required' => 'Tienes que ingresar tu nombre',
                    'max_length' => 'El nombre es muy largo'
                    ]
                ],
            'apellido' => [
                'rules' => 'required|max_length[50]',
                'errors' => [
                    'required' => 'Tienes que ingresar tu apellido',
                    'max_length' => 'El apellido es muy largo'
                    ]
                ],
            'email' => [
                'rules' => 'required|max_length[50]|valid_email|is_unique[usuarios.email]',
                'errors' => [
                    'required' => 'Tienes que ingresar tu correo electronico',
                    'max_length' => 'El correo electronico es muy largo',
                    'valid_email' => 'Tienes que ingresar un correo electronico válido',
                    'is_unique[usuarios.email]' => 'El correo que ingresaste ya esta registrado'
                    ]
                ],
            'password' => [
                'rules' => 'required|min_length[3]|max_length[50]',
                'errors' => [
                    'required' => 'Tienes que ingresar tu contraseña',
                    'min_length' => 'La contraseña es muy corta',
                    'max_length' => 'La contraseña es muy larga'
                    ]
                ],
            'password_confirm' => [
                'rules' => 'required|min_length[3]|max_length[50]|matches[password]',
                'errors' => [
                    'required' => 'Tienes que ingresar tu contraseña',
                    'min_length' => 'La contraseña es muy corta',
                    'max_length' => 'La contraseña es muy larga',
                    'matches' => 'Las contraseñas no coinciden'
                    ]
                ],
            'terminos' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tienes que aceptar los términos y condiciones'
                    ]
                ],
            
        ]);


        //Si el Formulario Registro no pasa las VALIDACIONES, mostraremos errores
        if(!$validacionesFormulario)
        {
            return view('Auth/registrarse', ['validation'=>$this->validator]);
        }else//De lo contrario, guardaremos los datos en la BD
        {
            //Almacenaremos en variables cada INPUT recivido

            $nombre = $this->request->getPost('nombre');
            $apellido = $this->request->getPost('apellido');
            $email = $this->request->getPost('email');
            $password  = $this->request->getPost('password');

            //Valores de la tabla USUARIOS | Varaibles creadas con el POST recibido
            $datosFormularioRegistro = [
                'nombre' => $nombre,
                'apellido' => $apellido,
                'email' => $email,
                //Usando la Funcion creada, hasheamos el password
                'password' => Hash::make($password),
            ];

            //Creamos el objeo de la clase que tiene la estructura de la tabla usuarios
            $tablaUsuariosModelo = new UsuarioModel();
            //Guardamos los datos en dicho objeto y con "SAVE" lo metemos en la BD
            $query = $tablaUsuariosModelo->save($datosFormularioRegistro);

            //Si no se insertan los datos en la BD, mostrar error
            if(!$query)
            {
                return redirect()->back()->with('fail', 'Error al intentar insertar datos en la BD');
                //return redirect()->back()->with('fail', 'Error al intentar insertar datos en la BD');
                
            }else //De lo contrario que muetre un mensaje EXITOSO
            {
                //Ultimo ID, Es el ID del usuario registrado
                $ultimo_id = $tablaUsuariosModelo->insertID();
                //Insertamos el ID del usuario registrado y lo seteamos en la sesion
                session()->set('loggedUser', $ultimo_id);
                return redirect()->to(route_to('/'))->with('success', 'Formulario cargado correctamente! Ahora te encuentras registrado');
            }

        }
    }

    //VERIFICACION DE USUARIO AL INICIAR SESION
    public function check()
    {
        //Comenzamos por validar los campos

        $validacion = $this->validate([
            'email' => [
                'rules' => 'required|valid_email|is_not_unique[usuarios.email]',
                'errors' => [
                    'required' => 'Introdusca un correo electronico',
                    'valid_email' => 'Introdusca un formato de correo electronico válido',
                    'is_not_unique' => 'Su correo no está registrado o fue dado de baja'
                    ]
                ],
            'password' => [
                'rules' => 'required|min_length[3]|max_length[50]',
                'errors' => [
                    'required' => 'Tienes que ingresar tu contraseña',
                    'min_length' => 'La contraseña es muy corta',
                    'max_length' => 'La contraseña es muy larga'
                    ]
                ]
        ]);

        if(!$validacion)
        {
            //Si hay algun dato incorrecto, mostramos el error debajo de cada campo del login
            //return view('Auth/login', ['validation'=>$this->validator]);
            return view('Auth/login', ['validation'=>$this->validator]);
        }else
        {
            //Verificaremos el usuario

            //Primero obtenemos su EMAIL y PASSWORD
            $email = $this->request->getpost('email');
            $password = $this->request->getpost('password');

            $tablaUsuariosModelo = new UsuarioModel();
            //Ponemos en una variable al usuario que obtenemos en una busqueda en la BD
            $informacion_usuario_logueado = $tablaUsuariosModelo->where('email', $email)->first();
            //Usamos la funcion para verificar el password del POST contra el que tenemos en la BD asociada al Correo
            $check_password = Hash::check($password, $informacion_usuario_logueado['password']);

            if(!$check_password)//Si hay un error de logueo
            {
                //En una sesion flash, mandamos un error
                session()->setFlashdata('fail', 'Contraseña incorrecta');
                //Y nos redirigimos a la pantalla de logueo
                return redirect()->to(route_to('login'))->withInput();
            }
            else//Si el usuario se loguea correctamente almacenamos su identificacion en la sesion
            {
                $id_usuario_logueado = $informacion_usuario_logueado['id'];
                session()->set('loggedUser', $id_usuario_logueado);
                return redirect()->to(route_to('/'))->with('success', 'Iniciaste sesion');

            }
        }


    }

    //SALIR DE LA SESION
    function salir()
    {
        //Si hemos registrado una sesion
        if(session()->has('loggedUser'))
        {
            //Removemos la sesion
            session()->remove('loggedUser');
            //Redirigimos a la pantalla de logueo
            return redirect()->to(route_to('/'))->with('fail', 'Cerraste sesion');
        }
    }

}