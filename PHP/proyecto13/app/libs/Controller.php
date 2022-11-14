<?php

class Controller
{
    // Importa el modelo que se le pase por parametro y lo devuelve.
    public function model($model)
    {
        require_once('../app/models/' . $model . '.php');
        return new $model();
    }

    /**
     * Importa la vista que se le pase por parametro mas los datos y lo devuelve.
     * Si esta no existe, devuelve un mensaje.
     */
    public function view($view, $data = [])
    {
        if (file_exists('../app/views/' . $view . '.php')) {
            require_once('../app/views/' . $view . '.php');
        } else {

            die('La vista no existe');
        }
    }
}
