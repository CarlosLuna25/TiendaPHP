<?php
require_once('models/producto.php');
class productoController
{
    public function index()
    {
        $producto=new producto();
       $productos= $producto->getRandom(6);
       
        //renderizar la vista

        require_once('views/producto/ProductosDestacados.php');
    }
    public function gestion()
    {
        helpers::isAdmin();
        $producto = new producto();
        $productos = $producto->GetProductos();
        require_once('views/producto/gestion.php');
    }

    public function crear()
    {
        helpers::isAdmin();

        $categorias = helpers::showCategorias();
        require_once('views/producto/crear.php');
    }

    public function save()
    {
        helpers::isAdmin();
        if (isset($_POST) and !empty($_POST)) {
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $precio = isset($_POST['precio']) && is_numeric($_POST['precio']) ? $_POST['precio'] : false;
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
            $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;
            $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
           
            if ($nombre && $descripcion && $precio && $categoria && $stock) {
                # code...
                $producto = new producto();
                $producto->setNombre($nombre);
                $producto->setDescripcion($descripcion);
                $producto->setCategoria_id($categoria);
               
               
                 $producto->setStock($stock);
                
                $producto->setPrecio($precio);

                // guardar imagen si es recibida por el form
                if (isset($_FILES['img']) && !empty($_FILES['img']['name'])) {

                    $archivo = $_FILES['img'];
                    $filename = $archivo['name'];
                    $mimetype = $archivo['type'];
                    //comprobar que sea de tipo imagen
                    if ($mimetype == "image/jpg" || $mimetype == "image/jpeg" || $mimetype == "image/png" || $mimetype == "image/gif" || $mimetype == "image/svg+xml") {
                        # code...
                        //verificamos que exista el directorio
                        if (!is_dir('uploads/images')) {
                            # code...
                            mkdir('uploads/images', 0777, true);
                        }
                        move_uploaded_file($archivo['tmp_name'], 'uploads/images/' . $filename);
                        //seteamos la imagen al producto
                        $producto->setImg($filename);
                    } else {

                        $producto->setImg('box.svg');
                        $_SESSION['imagen'] = 'Failed';
                    }
                } else {
                    if (!isset($_GET['id'])) {
                        $producto->setImg('box.svg');
                    }
                }
                //verificamos si es un metodo para actualizar o crear
                if (isset($_GET['id'])) {
                    $producto->setId($_GET['id']);
                    $save = $producto->edit();
                } else {
                    $save = $producto->save();
                }
                //se verifica el guardado 
                if ($save) {
                    $_SESSION['producto'] = 'Complete';
                } else {
                    $_SESSION['producto'] = 'Failed';
                }
            } else {
                $_SESSION['producto'] = 'Failed';
            }
        } else {
            $_SESSION['producto'] = 'Failed';
        }
        header('location:' . base_url . 'producto/gestion');
    }
    public function editar()
    {
        helpers::isAdmin();
        if (isset($_GET['id'])) {
            $editar = true;
            $categorias = helpers::showCategorias();
            $id = $_GET['id'];
            $producto = new producto();
            $producto->setId($id);
            $actual = $producto->getOne();
            require_once('views/producto/crear.php');
        } else {

            $_SESSION['delete'] = 'NotId';
        }
    }
    public function eliminar()
    {
        helpers::isAdmin();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $producto = new producto();
            $producto->setId($id);
            $delete = $producto->delete();
            if ($delete) {
                $_SESSION['delete'] = 'Complete';
            } else {
                $_SESSION['delete'] = 'Failed';
            }
        } else {
            $_SESSION['delete'] = 'NotId';
        }
        header('location:' . base_url . 'producto/gestion');
    }
    public function ver(){
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $producto = new producto();
            $producto->setId($id);
            $actual= $producto->getOne();
            require_once('views/producto/ver.php');
        }
    }
}
