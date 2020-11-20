
<?php 
session_start();
require_once('autoload.php');
require_once('config/Database.php');
require_once('helpers/helpers.php');
require_once('config/parameters.php');
require_once('views/layout/header.php');
require_once('views/layout/sidebar.php');





if (isset($_GET['controller']) && class_exists($_GET['controller'].'Controller')) {
    $nombre_controlador=$_GET['controller'].'Controller';
    $controlador= new $nombre_controlador();

    if (isset($_GET['action']) && method_exists($controlador,$_GET['action'])) {
        # code...
        $action=$_GET['action'];
        $controlador->$action();
        
    }else{
        $error= new ErrorController();
        $error->index();
    }
}elseif(!isset($_GET['controller']) && !isset($_GET['controller'])){
    $nombre_controlador= default_controller;
    $action= default_action;
    $controlador=new $nombre_controlador();
    $controlador->$action();
}
else{
    $error= new ErrorController();
    $error->index();
}


require_once('views/layout/footer.php');
?>