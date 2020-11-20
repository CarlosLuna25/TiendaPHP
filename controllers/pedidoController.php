<?php
require_once('models/pedido.php');
class pedidoController{
    public function index(){
        echo "controlador pedido accion index";
    }
    public function hacer(){
        
        require_once('views/pedido/hacer.php');
    }
    public function add(){
        if (isset($_SESSION['identidad']) && isset($_POST)) {
            # code...
            $usuario_id=$_SESSION['identidad']->id;
            $total_carrito= helpers::getTotal();
            $estado = isset($_POST['estado']) ?   $_POST['estado']  : false;
            $municipio = isset($_POST['municipio']) ? $_POST['municipio'] : false;
            $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;
            if ($estado && $municipio && $direccion) {
                # code...
                $pedido= new pedido();
                $pedido->setEstado($estado);
                $pedido->setMunicipio($municipio);
                $pedido->setDireccion($direccion);
                $pedido->setUsuario_id($usuario_id);
                $pedido->setTotal($total_carrito);
               $save= $pedido->save();
                //guardar productos dentro de ese pedido
                $save_lineas=$pedido->saveLinea();


               if ($save && $save_lineas) {
                  $_SESSION['pedido']='complete';
               }else{
                $_SESSION['pedido']='failed'; 
               }
            }else{
                $_SESSION['pedido']='failed';  
            }
           

            echo "<script> 
            <!--
            window.location.replace('".base_url."pedido/confirmado'); 
            //-->
            </script>"; 
           
        }else{
            header('location:'.base_url);
        }
    }
    public function confirmado(){
        if (isset($_SESSION['identidad'])) {
            # code...
         $pedido=new pedido();
         $pedido->setUsuario_id($_SESSION['identidad']->id);
         $pedido=$pedido->getOneByUser();

         //sacar productos del pedido
         $productos_pedido= new pedido();
        $productos= $productos_pedido->getProductsByPedido($pedido->id);
        }
      
        require_once('views/pedido/confirmado.php');
    }
    public function mispedidos(){
        helpers::isLog();
        $pedido=new pedido();
        //obtener pedidos del usuario
        $pedido->setUsuario_id($_SESSION['identidad']->id);
        $pedidos=$pedido->getAllByUser();
        require_once('views/pedido/mispedidos.php');
    }
    public function detalle_pedido(){
        helpers::isLog();
        if (isset($_GET['id'])) {
            $pedido_id=$_GET['id'];
            $pedido=new pedido();
            $pedido->setId($pedido_id);
            $pedido=$pedido->getOne();
   
            //sacar productos del pedido
            $productos_pedido= new pedido();
           $productos= $productos_pedido->getProductsByPedido($pedido->id);
            require_once('views/pedido/detalle.php');
        }else{
            echo "<script> 
            <!--
            window.location.replace('".base_url."pedido/mispedidos'); 
            //-->
            </script>"; 
        }
        
    }
    public function gestion(){
        helpers::isAdmin();
        $gestion=true;

        $pedido=new pedido();
        $pedidos=$pedido->getAll();
        require_once('views/pedido/mispedidos.php');
    }
    public function estado(){
        helpers::isAdmin();
        if(isset($_POST['pedido_id']) && isset($_POST['estado'])){
            //update del pedido
            $status=$_POST['estado'];
            $id=$_POST['pedido_id'];
            $pedido=new pedido();
            $pedido->setId($id);
            $pedido->setStatus($status);
            $pedido->updateOne();
            echo "<script> 
            <!--
            window.location.replace('".base_url."pedido/detalle_pedido&id=$id'); 
            //-->
            </script>"; 
           /*  header('location:'.base_url.'pedido/detalle_pedido&id='.$id); */
            
        }else{
            echo "<script> 
            <!--
            window.location.replace('".base_url."'); 
            //-->
            </script>"; 
        }
    }

}