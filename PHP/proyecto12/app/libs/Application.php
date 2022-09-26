<?php

/**
 * La clase application maneja la URL y maneja los procesos
 */

class Application
{
    private $urlController = null;
    private $urlAction = null;
    private $urlParams = [];


    function __construct()
    {
        $db = Mysqldb::getInstance()->getDatabase();

        $url = $this->separarURL();

        if (!$this->urlController) {
            require_once '../app/controllers/loginController.php';
            $page = new loginController();
            $page->index();
        } else if (file_exists('../controllers/' . ucfirst($this->urlController) . 'Controller.php')) {
            $controller = ucfirst($this->urlController) . 'Controller.php';
            require_once '../app/controllers/' . $controller . '.php';
            $this->urlController = new $controller;
            $this->urlController->index();
        }
    }

    public function separarURL()
    {
        if ($_SERVER['REQUEST_URI'] != '/') {
            $url = trim($_SERVER['REQUEST_URI'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);

            $this->urlController = $url[0] ?? null;
            $this->urlAction = $url[1] ?? null;

            unset($url[0], $url[1]);

            $this->urlParams = array_values($url);
        }
    }
}