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
            'menu'   => false
        ];

        $this->view('login', $data);
    }

    public function olvido()
    {
    }

    public function registro()
    {
        $errors = [];
        $dataForm = [];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'] ?? '';
            $user = $_POST['user'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            $dataForm = [
                'name' => $name,
                'user' => $user,
                'email' => $email,
                'password' => $password
            ];

            if ($name == '') {
                array_push($errors, 'El nombre es requerido');
            }
            if ($email == '') {
                array_push($errors, 'El email es requerido');
            }
            if ($user == '') {
                array_push($errors, 'El usuario es requerido');
            }
            if ($password == '') {
                array_push($errors, 'La contraseña es requerida');
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
                        'url' => 'login',
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
                        'text' => 'El correo utilizado ya existe.',
                        'color' => 'alert-danger',
                        'url' => 'login',
                        'colorButton' => 'btn-danger',
                        'textButton' => 'Regresar',
                    ];

                    $this->view('mensaje', $data);
                }
            } else {
                $data = [
                    'titulo' => 'Registro',
                    'menu'   => false,
                    'errors' => $errors,
                    'dataForm' => $dataForm
                ];

                $this->view('register', $data);
            }
        } else {
            $data = [
                'titulo' => 'Registro',
                'menu'   => false,
            ];

            $this->view('register', $data);
        }
    }
}
