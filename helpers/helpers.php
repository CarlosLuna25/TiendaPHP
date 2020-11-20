<?php
class helpers{
   public static function MostrarErrores($errores,$campo){
        $alerta='';
        if (isset($errores[$campo]) && !empty($campo)) {
            $alerta='<div class="alert alert-danger" role="alert" >'.$errores[$campo].'</div>';
        }
        return $alerta;
    }
    public static function deleteSesion($nombre){
        if (isset($_SESSION[$nombre])) {
            $_SESSION[$nombre]==null;
            unset($_SESSION[$nombre]);
       
        }
        return $nombre;
        
    }
    public static function isAdmin(){
        if(!isset($_SESSION['admin'])){
            header('Location:'.base_url);
        }else{
            return true;
        }
    }
    public static function isLog(){
        if(!isset($_SESSION['identidad'])){
            header('Location:'.base_url);
        }else{
            return true;
        }
    }
    public static function showCategorias(){
        require_once('models/categoria.php');
        $categoria= new categoria();
        $categorias= $categoria->GetCategorias();
        return $categorias;
    }
    public static function counterCarrito(){
        $cantidad=0;
        if (isset($_SESSION['carrito'])) {
            $cantidad=count($_SESSION['carrito']);
        }
        return $cantidad;

    }
    public static function getTotal(){
        $total=0;
        if (isset($_SESSION['carrito'])) {
            # code...
            foreach($_SESSION['carrito'] as $indice=> $prod){
                $total+= ($prod['unidades']* $prod['precio']);
            }
        }
        return $total;
    }
    public static function showStatus($estado){
        $resultado="";
        
        if ($estado=='confirmado') {
           $resultado="Pendiente";
        }
        if ($estado=='listo') {
            $resultado="Preparado para el envio";
         }
         if ($estado=='preparacion') {
            $resultado="En preparacion";
         }
         if ($estado=='enviado') {
            $resultado="Enviado";
         }
         if ($estado=='entregado') {
            $resultado="Entregado";
         }

        return $resultado;
    }

}