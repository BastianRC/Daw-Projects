<?php 

ini_set('display_errors', 1);

define('ROOT', DIRECTORY_SEPARATOR);
define('APP', ROOT . 'app' . DIRECTORY_SEPARATOR);
define('ENCRIPTKEY', 'Prueba1.');

require_once('libs/Controller.php');
require_once('libs/Mysqldb.php');
require_once('libs/Application.php');