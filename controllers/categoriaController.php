<?php
require_once('models/categoria.php');
require_once('models/producto.php');
class categoriaController{
    public function index(){
        helpers::isAdmin();
        $categoria= new categoria();
        $categorias= $categoria->GetCategorias();
        
       require_once('views/categoria/index.php');
    }

    public function crear(){
        helpers::isAdmin();
        require_once('views/categoria/crear.php'); 
    }
    public function save(){
        helpers::isAdmin(); //comprobamos que sea administrador 

        //guardar categoria en bd
        if (isset($_POST['nombre']) && !empty($_POST['nombre'])) {
            $categoria= new categoria();
            $categoria->setNombre($_POST['nombre']);
            $categoria->save();

        }

        header('location:'.base_url.'categoria/index');

    }
    public function ver(){
        if (isset($_GET['id'])) {
           $categoria= new categoria();
           $categoria->setId($_GET['id']);
           
           $cat_actual=$categoria->getOne();
           if ($cat_actual) {
               $producto=new producto();
               $producto->setCategoria_id($_GET['id']);
               $productos=$producto->getProducto_Categoria();
               
           }
        }

        require_once('views/categoria/ver.php');
    }
}{

}