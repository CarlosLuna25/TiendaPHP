<?php
require_once('models/producto.php');
class carritoController{
    public function index(){
       
        require_once('views/carrito/ver.php');
    }
    public function add(){
        if (isset($_GET['id'])) {
           $producto_id=$_GET['id'];
        }else {
            echo "<script> 
            <!--
            window.location.replace('".base_url."'); 
            //-->
            </script>"; 
        }
        if (isset($_SESSION['carrito'])) {
            # code...
            $contador=0;
            foreach ($_SESSION['carrito'] as $key => $elemento) {
                if($elemento['id_producto']==$producto_id){
                    $_SESSION['carrito'][$key]['unidades']++;
                    $contador++;
                   
                  
                }
            }
        }if(!isset($contador) || $contador==0 ){
            //conseguir producto
            $producto=new producto();
            $producto->setId($producto_id);
            $producto=$producto->getOne();
            
            if(is_object($producto)){
                $_SESSION['carrito'][]=array(
                    'id_producto'=> $producto->id,
                    'precio'=> $producto->precio,
                    'unidades'=> 1,
                    'producto'=>$producto

                );
            }
        }
        echo "<script> 
        <!--
        window.location.replace('".base_url."carrito/index'); 
        //-->
        </script>"; 
    }
    public function remove(){
        if (isset($_GET['index'])) {
            # code...
            $indice=$_GET['index'];
            unset($_SESSION['carrito'][$indice]);
            
        }echo "<script> 
        <!--
        window.location.replace('".base_url."carrito/index'); 
        //-->
        </script>"; 
    }
    public function delete_all(){
        unset($_SESSION['carrito']);
        echo "<script> 
        <!--
        window.location.replace('".base_url."'); 
        //-->
        </script>"; 
        
    }
    public function aumentar(){
        if (isset($_GET['index'])) {
            # code...
            $indice=$_GET['index'];
            $_SESSION['carrito'][$indice]['unidades']++;
            
        }
        echo "<script> 
        <!--
        window.location.replace('".base_url."carrito/index'); 
        //-->
        </script>";
    }
    public function disminuir(){
        if (isset($_GET['index'])) {
            # code...
            $indice=$_GET['index'];
            $_SESSION['carrito'][$indice]['unidades']--;
            if ($_SESSION['carrito'][$indice]['unidades']==0) {
                unset($_SESSION['carrito'][$indice]);
            }
            
        }
        echo "<script> 
        <!--
        window.location.replace('".base_url."carrito/index'); 
        //-->
        </script>";

    }

}