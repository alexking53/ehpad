<?php
$url = explode('/', $_GET['p']);
require "../vendor/autoload.php";
if(isset($_GET['p']) && $_GET['p'] != ''){
    $param = explode('/', $_GET['p']);
    $controller = ucfirst(strtolower($param[0]));
    $action = isset($param[1]) && $param[1]!= "" ? $param[1] : 'index';
    $id = isset($param[2]) && $param[2] != "" ? $param[2] : null;
} else {
    $controller = "Acceuil";
    $action = "index";
    $id = null;
}

define('WEBROOT', str_replace('index.php','',
$_SERVER['SCRIPT_NAME']));
define('ROOT', str_replace('index.php','',
$_SERVER['SCRIPT_FILENAME']));
define('URL', str_replace('src/index.php','',
$_SERVER['SCRIPT_NAME']));
require_once ROOT . '/core/Controller.php';
//On appelle notre controller si son fichier existe
if (file_exists(ROOT . 'controller/' . $controller . '.php')) {
    require_once ROOT . '/controller/' . $controller . '.php';
    $controllerVerifie = new $controller();
    //On appelle la méthode si elle est définit dans le fichier du controller
    if (method_exists($controllerVerifie, $action)) {
    $controllerVerifie->$action($id);
    }
    }
?>