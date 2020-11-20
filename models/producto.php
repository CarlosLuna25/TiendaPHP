<?php
class producto
{
    private $id;
    private $nombre;
    private $categoria_id;
    private $descripcion;
    private $stock;
    private $precio;
    private $img;
    private $fecha;
    private $db;

    public function __construct()
    {
        $this->db = Database::Conexion();
    }

    /**
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
 
     */
    public function setNombre($nombre)
    {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    /**
     * Set the value of id
     
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Get the value of categoria_id
     */
    public function getCategoria_id()
    {
        return $this->categoria_id;
    }

    /**
     * Set the value of categoria_id
     
     */
    public function setCategoria_id($categoria_id)
    {
        $this->categoria_id = $this->db->real_escape_string($categoria_id);
    }

    /**
     * Get the value of descripcion
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion

     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $this->db->real_escape_string($descripcion);
    }

    /**
     * Get the value of stock
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set the value of stock
 
     */
    public function setStock($stock)
    {
        $this->stock = $this->db->real_escape_string($stock);
    }

    /**
     * Get the value of precio
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set the value of precio

     */
    public function setPrecio($precio)
    {
        $this->precio = $this->db->real_escape_string($precio);
    }

    /**
     * Get the value of img
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * Set the value of img
  
     */
    public function setImg($img='box.svg')
    {
        $this->img = $this->db->real_escape_string($img);
    }

    /**
     * Get the value of fecha
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set the value of fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }
    public function GetProductos(){
        $sql="SELECT p.*,c.nombre AS 'categoria' FROM productos p INNER JOIN categorias c ON (c.id=p.categoria_id) ORDER BY p.id DESC";
        $productos=$this->db->query($sql);
        return $productos;
    }
    public function save(){
        $resultado=false;
        $sql="INSERT INTO productos VALUES(null,{$this->getCategoria_id()},'{$this->getNombre()}','{$this->getDescripcion()}',
                                    {$this->getStock()},{$this->getPrecio()},'{$this->getImg()}', CURDATE());";
        $save=$this->db->query($sql);
        if ($save){
            $resultado=true;
        }
        return $resultado;
    }
    public function delete(){
        $resultado=false;
        $sql="DELETE FROM productos WHERE ID={$this->getId()}";
        $delete=$this->db->query($sql);
        if ($delete) {
           $resultado=true;
        }
        return $resultado;
    }

    public function getOne(){
        $sql="SELECT p.*,c.nombre AS 'categoria' FROM productos p INNER JOIN categorias c ON (c.id=p.categoria_id) WHERE p.id={$this->getId()}";
           
        $producto=$this->db->query($sql);
        return $producto->fetch_object();
    }
    public function getRandom($limit){
        $productos=$this->db->query("SELECT p.*, c.nombre AS 'categoria' FROM productos p INNER JOIN categorias c ON(c.id=p.categoria_id)
        ORDER BY RAND() LIMIT $limit");
        return $productos;
    }
    public function edit(){
        $resultado=false;
        $sql="UPDATE productos SET categoria_id={$this->getCategoria_id()}, nombre='{$this->getNombre()}', descripcion='{$this->getDescripcion()}',
                                    stock={$this->getStock()}, precio={$this->getPrecio()}";
       if ($this->getImg()!=null) {
           # code...
           $sql.= ", img='{$this->getImg()}'";
       }
       $sql.="WHERE id={$this->getId()};";
       $save=$this->db->query($sql);
        if ($save){
            $resultado=true;
        }
        return $resultado;
    }
    public function getProducto_Categoria(){
    $sql= "SELECT * FROM productos WHERE categoria_id={$this->getCategoria_id()} ORDER BY fecha";
    $productos=$this->db->query($sql);
    return $productos;

    }

}
