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
            'menu'=> false,
        ];
        $this->view('login', $data);
    }

    public function registro(){
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Procesamos la informacion recibida del formulario.

            $firstName = $_POST['first_name'] ?? '';
            $lastName_1 = $_POST['last_name_1'] ?? '';
            $lastName_2 = $_POST['last_name_2'] ?? '';
            $email = $_POST['email'] ?? '';
            $password_1 = $_POST['password_1'] ?? '';
            $password_2 = $_POST['password_2'] ?? '';
            $address = $_POST['address'] ?? '';
            $city = $_POST['city'] ?? '';
            $state = $_POST['state'] ?? '';
            $postcode = $_POST['postcode'] ?? '';
            $country  = $_POST['country'] ?? '';

            $dataForm = [
                'first_name' => $firstName,
                'last_name_1' => $lastName_1,
                'last_name_2' => $lastName_2,
                'email' => $email,
                'password_1' => $password_1,
                'password_2' => $password_2,
                'address' => $address,
                'city' => $city,
                'state' => $state,
                'postcode' => $postcode,
                'country' => $country
            ];

        } else{
            // Mostramos el formulario

            $data = [
                'titulo' => 'Registro',
                'menu'=> false,
            ];
            $this->view('register', $data);
        }        
    }

    public function olvido(){
        print('Estoy en olvido');
    }

}