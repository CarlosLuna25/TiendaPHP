<?php
require_once('models/usuario.php');
class usuarioController
{
    public function index()
    {
        echo "controlador usuario accion index";
    }
    public function registro()
    {
        require_once('views/usuario/registro.php');
    }
    public function save()
    {
        if (isset($_POST) and !empty($_POST)) {
            # code...
            $nombre = isset($_POST['nombre']) ?   $_POST['nombre']  : false;
            $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $pass = isset($_POST['pass']) ?  $_POST['pass']: false;
            $errores = array();


             //validar datos antes de guardar
        //nombre
        if (!empty($nombre) && !is_numeric($nombre)  && !preg_match(" /[0-9]/ ",$nombre) ) {
            $nombre_validado=true;
 
         }else{
             $nombre_validado=false;
             $errores['nombre']="nombre invalido";
         }
 
         //apellido
         if (!empty($apellido) && !is_numeric($apellido)  && !preg_match(" /[0-9]/ ",$apellido) ) {
             $apellido_validado=true;
  
          }else{
              $apellido_validado=false;
              $errores['apellido']="apellido invalido";
          }
 
          //email
          if (!empty($email) && filter_var($email,FILTER_VALIDATE_EMAIL) ) {
             $email_validado=true;
  
          }else{
              $email_validado=false;
              $errores['email']="email invalido";
          }
 
          //contraseña
          if (!empty($pass)) {
             $pass_validado=true;
          }else {
              $pass_validado=false;
              $errores['pass']="Contraseña vacia";
          }
            if (count($errores)==0) {

                $usuario = new usuario();
                $usuario->setNombre($nombre);
                $usuario->setApellido($apellido);
                $usuario->setEmail($email);
                $usuario->setPass($pass);
                $save = $usuario->saveUser();
                if ($save == true) {
                    # c         ode...
                    $_SESSION['registro'] = 'Complete';
                } 
            }else{
                $_SESSION['registro'] = 'Failed';
                $_SESSION['errores']=$errores;

            }
           
            


          
        } else {
            $_SESSION['registro'] = 'Failed';
        }
        header('Location:' . base_url . 'usuario/registro');
    } // FIN SAVE

    public function login(){
        if(isset($_POST)){
            //identificar usuario

            //hacer consulta a la base de datos
            $usuario= new usuario();
            $usuario->setEmail($_POST['email']);
            $usuario->setPass($_POST['pass']);
            
            $identidad= $usuario->login();
           
            //crear sesion
            if (is_object($identidad) && $identidad) {
                # code...
                $_SESSION['identidad']= $identidad;
                if ($identidad->rol=='admin') {
                    # code...
                    $_SESSION['admin']=true;
                   
                }
            
            }else{
                $_SESSION['error_login']= "identificacion fallida";
            }
            echo "<script> 
            <!--
            window.location.replace('".base_url."'); 
            //-->
            </script>"; 
        }

       

    }

    public function logout(){
        if (isset($_SESSION['identidad'])) {
            $_SESSION['identidad']=null;
           
        }
        if (isset($_SESSION['admin'])) {
            $_SESSION['admin']=null;
            
        }
        
        header('location:'.base_url);
    }

}
