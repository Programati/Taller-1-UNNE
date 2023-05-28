<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsuarioModel;
use App\Models\PersonaModel;
use App\Models\DomicilioModel;
use App\Models\ProductoModel;

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

        //Archivo para asignar el Tipo de USUARIO APP\CONFIG->AsignarUsuario
        $this->configs = config('AsignarRolUsuario');
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
            'dni' => [
                'rules' => 'required|max_length[50]',
                'errors' => [
                    'required' => 'Tienes que ingresar tu numero de DNI',
                    'max_length' => 'El numero del DNI es muy largo'
                    ]
                ],
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
            'telefono' => [
                'rules' => 'required|max_length[15]',
                'errors' => [
                    'required' => 'Tienes que ingresar tu numero de teléfono',
                    'max_length' => 'El numero del teléfono es muy largo'
                    ]
                ],
            'email' => [
                'rules' => 'required|max_length[50]|valid_email|is_unique[personas.email]',
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
            'calle' => [
                'rules' => 'required|max_length[50]',
                'errors' => [
                    'required' => 'Tienes que ingresar nombre de la calle',
                    'max_length' => 'Nombre de calle muy largo'
                    ]
                ],
            'alturaCalle' => [
                'rules' => 'required|max_length[50]',
                'errors' => [
                    'required' => 'Tienes que ingresar la altura de la calle o Mz y Csa',
                    'max_length' => 'Nombre de calle muy largo'
                    ]
                ],
            'codigoPostal' => [
                'rules' => 'required|max_length[11]',
                'errors' => [
                    'required' => 'Tienes que ingresar Codigo Postal',
                    'max_length' => 'Codigo Postal muy largo'
                    ]
                ],
            'localidad' => [
                'rules' => 'required|max_length[50]',
                'errors' => [
                    'required' => 'Tienes que ingresar la Localidad',
                    'max_length' => 'Nombre Localidad muy largo'
                    ]
                ],
            'provincia' => [
                'rules' => 'required|max_length[50]',
                'errors' => [
                    'required' => 'Tienes que ingresar la provincia',
                    'max_length' => 'Nombre provincia muy largo'
                    ]
                ],
            'pais' => [
                'rules' => 'required|max_length[50]',
                'errors' => [
                    'required' => 'Tienes que ingresar el pais',
                    'max_length' => 'Nombre pais muy largo'
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
        }else//De lo contrario, guardaremos los datos en variables para luego meterlos en la BD
        {
            //Almacenaremos en variables cada INPUT recivido
            $dni = $this->request->getPost('dni');
            $nombre = $this->request->getPost('nombre');
            $apellido = $this->request->getPost('apellido');
            $telefono = $this->request->getPost('telefono');
            $email = $this->request->getPost('email');
            $password  = $this->request->getPost('password');

            $calle = $this->request->getPost('calle');
            $numero = $this->request->getPost('alturaCalle');
            $codigoPostal = $this->request->getPost('codigoPostal');
            $localidad = $this->request->getPost('localidad');
            $provincia = $this->request->getPost('provincia');
            $pais = $this->request->getPost('pais');

            //---------------------------------------------------------------------------------------------

            //---------------------------------------------------------------------------------------------
            //ARRAY DATOS DOMICILIO
            $datosDomicilio = [
                'calle' => $calle,
                'numero' => $numero,
                'codigo_postal' => $codigoPostal,
                'localidad' => $localidad,
                'provincia' => $provincia,
                'pais' => $pais,
            ];

            //Creamos el objeo de la clase que tiene la estructura de la tabla domicilios
            $tablaDomiciliosModelo = new DomicilioModel();
            //Guardamos los datos en dicho objeto y con "SAVE" lo metemos en la BD
            $tablaDomiciliosModelo->save($datosDomicilio);
            //---------------------------------------------------------------------------------------------
            //Ponemos en una variable el ultimo registro de la tabla DOMICILIOS
            $ultimoID = $tablaDomiciliosModelo->orderBy('id_domicilio', 'DESC')->first();
            
            //Capturamos su Ultimo ID DOMICILIO insertado
            //dd($ultimoID['id_domicilio']);
            
            
            //---------------------------------------------------------------------------------------------
            //Valores de la tabla USUARIOS | Varaibles creadas con el POST recibido
            //ARRAY DATOS PERSONA
            $datosPersona = [
                'dni' => $dni,
                'nombre' => $nombre,
                'apellido' => $apellido,
                'telefono' => $telefono,
                'email' => $email,
                //Ultimo ID DOMICILIO insertado
                'id_domicilio' => $ultimoID['id_domicilio'],
                //Usando la Funcion creada, hasheamos el password
                'password' => Hash::make($password),
            ];
            
            
            //Creamos el objeo de la clase que tiene la estructura de la tabla personas
            $tablaPersonasModelo = new PersonaModel();
            //Guardamos los datos en dicho objeto y con "SAVE" lo metemos en la BD
            $tablaPersonasModelo->save($datosPersona);
            //---------------------------------------------------------------------------------------------
            $ultimo_id = $tablaPersonasModelo->insertID();
            //---------------------------------------------------------------------------------------------
            
            
            
            //---------------------------------------------------------------------------------------------
            
            //Creamos el objeo de la clase que tiene la estructura de la tabla usuarios
            $tablaUsuariosModelo = new UsuarioModel();

            //Seteamos el rol
            $tablaUsuariosModelo->RolUsuario($this->configs->defaultTipoUsuario);//podemos pasarle el string ADMINISTRADOR y funciona
            //Siempre que el string esté en la tabla referenciada, en este caso, es la tabla ROLES campo nombre_rol

            //ARRAY DATOS USUARIO
            $datosUsuario = [
                'id_persona' => $ultimo_id,
                'activo' => 1,
            ];

            
            
            //Asignamos el usuario normal
            //Guardamos los datos en dicho objeto y con "SAVE" lo metemos en la BD
            $query = $tablaUsuariosModelo->save($datosUsuario);

            //Si no se insertan los datos en la BD, mostrar error
            if(!$query)
            {
                return redirect()->back()->with('fail', 'Error al intentar insertar datos en la BD');
                
            }else //De lo contrario que muetre un mensaje EXITOSO
            {
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
                'rules' => 'required|valid_email|is_not_unique[personas.email]|email_estado[personas.email]',
                'errors' => [
                    'required' => 'Introdusca un correo electronico',
                    'valid_email' => 'Introdusca un formato de correo electronico válido',
                    'is_not_unique' => 'Su correo no está registrado',
                    'email_estado' => 'Su correo está dado de baja',
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
            return view('Auth/login', ['validation'=>$this->validator]);
        }else
        {
            //Verificaremos el usuario

            //Primero obtenemos su EMAIL y PASSWORD
            $email = $this->request->getpost('email');
            $password = $this->request->getpost('password');

            $tablaUsuariosModelo = new UsuarioModel();
            $tablaPersonaModelo = new PersonaModel();

            //Ponemos en una variable a la persona que obtenemos en una busqueda en la BD
            $informacion_persona_logueada = $tablaPersonaModelo->where('email', $email)->first();
            //Ponemos en una variable al usuario relacionado con el ID de la persona
            $info_usuario_logueado = $tablaUsuariosModelo->where('id_persona', $informacion_persona_logueada['id_persona'])->first();

            //Usamos la funcion para verificar el password del POST contra el que tenemos en la BD asociada al Correo
            $check_password = Hash::check($password, $informacion_persona_logueada['password']);

            if(!$check_password)//Si hay un error de logueo
            {
                //En una sesion flash, mandamos un error
                $this->session()->setFlashdata('fail', 'Contraseña incorrecta');
                //Y nos redirigimos a la pantalla de logueo
                return redirect()->to(route_to('login'))->withInput();
            }
            else//Si el usuario se loguea correctamente almacenamos su identificacion en la sesion
            {
                
                //$id_persona = $informacion_persona_logueada['id_persona'];
                $DatosLogin = [
                    'loggedUser' => $informacion_persona_logueada['id_persona'],
                    'productos' => '',
                ];
                session()->set($DatosLogin);

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
            //dd();
            if(session()->get('productos') != null)
            {

                //Primero devolvemos todos los productos
                $producto = new ProductoModel();
                $arrayViejo = session()->get('productos');
                for($x = 0; $x < count($arrayViejo); $x++) 
                {
                    $elegido = $producto->where('id_producto', $arrayViejo[$x]['id'])->first();
                    $datos = [
                        'cantidad' => $elegido['cantidad'] + 1,
                    ];
                    $producto->where('id_producto', $arrayViejo[$x]['id'])->update($arrayViejo[$x]['id'],$datos);
                }

            }

            //Removemos la sesion
            //session()->remove('loggedUser');
            session()->destroy();
            //Redirigimos a la pantalla de logueo
            return redirect()->to(route_to('/'))->with('fail', 'Cerraste sesion');
        }
    }

}