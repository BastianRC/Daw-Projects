<?php

class LoginController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = $this->model('Login');
    }

    public function index()
    {
        $data = [
            'titulo' => 'Login',
            'menu' => 'false'
        ];

        $this->view('login', $data);
    }

    public function olvido()
    {
        print('Estoy en olvido');
    }

    public function registro()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $errors = [];

            // Procesamos la información recibida del formulario y lo guardamos en un array.
            $dataForm = [
                'firstName' => $firstName = $_POST['first_name'] ?? '',
                'lastName1' => $lastName1 = $_POST['last_name_1'] ?? '',
                'lastName2' => $lastName2 = $_POST['last_name_2'] ?? '',
                'email' => $email = $_POST['email'] ?? '',
                'password' => $password1 = $_POST['password'] ?? '',
                'address' => $address = $_POST['address'] ?? '',
                'city' => $city = $_POST['city'] ?? '',
                'state' => $state = $_POST['state'] ?? '',
                'postcode' => $postcode = $_POST['postcode'] ?? '',
                'country' => $country = $_POST['country'] ?? ''
            ];

            // Este valor se procesa pero nos e guarda en el array.
            $password2 = $_POST['password2'] ?? '';

            if ($firstName == '') {
                array_push($errors, 'El nombre es requerido');
            }
            if ($lastName1 == '') {
                array_push($errors, 'El primer apellido es requerido');
            }
            if ($lastName2 == '') {
                array_push($errors, 'El segundo apellido es requerido');
            }
            if ($email == '') {
                array_push($errors, 'El email es requerido');
            }
            if ($password1 == '') {
                array_push($errors, 'La contraseña es requerido');
            }
            if ($password2 == '') {
                array_push($errors, 'Repetir la contraseña es requerido');
            }
            if ($address == '') {
                array_push($errors, 'La dirección es requerida');
            }
            if ($city == '') {
                array_push($errors, 'La ciudad es requerida');
            }
            if ($state == '') {
                array_push($errors, 'La provincia es requerida');
            }
            if ($postcode == '') {
                array_push($errors, 'El código postal es requerido');
            }
            if ($country == '') {
                array_push($errors, 'El país es requerido');
            }
            if ($password1 != $password2) {
                array_push($errors, 'Las contraseñas deben ser iguales');
            }

            if (count($errors) == 0) {
                if ($this->model->createUser($dataForm)) {
                    $data = [
                        'titulo' => 'Bienvenido',
                        'menu' => false,
                        'errors' => [],
                        'subtitle' => 'Bienvenido/a a nuestra tienda online',
                        'text' => 'Gracias por su registro',
                        'color' => 'alert-success',
                        'url' => 'menu',
                        'colorButton' => 'btn-success',
                        'textButton' => 'Acceder',
                    ];

                    $this->view('mensaje', $data);
                    
                } else {
                    $data = [
                        'titulo' => 'Error',
                        'menu' => false,
                        'errors' => [],
                        'subtitle' => 'Error en el proceso de registro.',
                        'text' => 'Probablemente el correo utilizado ya exista. Pruebe con otro',
                        'color' => 'alert-danger',
                        'url' => 'login',
                        'colorButton' => 'btn-danger',
                        'textButton' => 'Regresar',
                    ];

                    $this->view('mensaje', $data);

                }
            // Si hay errores cargara la vista con todos los datos en los inputs y un mensaje de error
            } else { 
                $data = [
                    'titulo' => 'Registro',
                    'menu' => 'false',
                    'errors' => $errors,
                    'dataForm' => $dataForm
                ];

                $this->view('register', $data);
            }
        } else {
            // Mostramos el formulario si el metodo es diferente a POST

            $data = [
                'titulo' => 'Registro',
                'menu' => 'false'
            ];

            $this->view('register', $data);
        }
    }
}
