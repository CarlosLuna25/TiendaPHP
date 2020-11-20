<?php
class categoria
{
    private $id;
    private $nombre;
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

    public function GetCategorias(){
        $sql="SELECT * FROM categorias ORDER BY id DESC";
        $categorias=$this->db->query($sql);
        return $categorias;
    }
    public function save(){
        $resultado=false;
        $sql="INSERT INTO categorias VALUES(null, '{$this->getNombre()}');";
        $save=$this->db->query($sql);
        if ($save){
            $resultado=true;
        }
        return $resultado;
    }
    public function getOne(){
    $sql="SELECT * FROM categorias WHERE id={$this->getId()}";
        $categorias=$this->db->query($sql);
        return $categorias->fetch_object();
    }
}
