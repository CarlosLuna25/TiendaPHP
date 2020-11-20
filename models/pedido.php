<?php 

class pedido{
    private $id;
    private $usuario_id;
    private $estado, $municipio, $direccion;
    private $status;
    private $fecha;
    private $total;

    public function __construct()
    {
        $this->db = Database::Conexion();
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

  
    public function setId($id)
    {
        $this->id = $this->db->real_escape_string($id);

     
    }

    /**
     * Get the value of usuario_id
     */ 
    public function getUsuario_id()
    {
        return $this->usuario_id;
    }

    /**
     * Set the value of usuario_id
     *
     * @return  self
     */ 
    public function setUsuario_id($usuario_id)
    {
        $this->usuario_id = $this->db->real_escape_string($usuario_id);


    }

    /**
     * Get the value of estado
     */ 
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set the value of estado
     *
     * @return  self
     */ 
    public function setEstado($estado)
    {
        $this->estado = $this->db->real_escape_string($estado);
    }

    /**
     * Get the value of municipio
     */ 
    public function getMunicipio()
    {
        return $this->municipio;
    }

    /**
     * Set the value of municipio
     *
     * @return  self
     */ 
    public function setMunicipio($municipio)
    {
        $this->municipio = $this->db->real_escape_string($municipio);

    }

    /**
     * Get the value of direccion
     */ 
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set the value of direccion
     *
     * @return  self
     */ 
    public function setDireccion($direccion)
    {
        $this->direccion = $this->db->real_escape_string($direccion);

    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $this->db->real_escape_string($status);

    
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
     *
     * @return  self
     */ 
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * Get the value of total
     */ 
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set the value of total
     *
     * @return  self
     */ 
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }
    public function save(){
        $resultado=false;
        $sql="INSERT INTO pedidos VALUES(null,{$this->getUsuario_id()},'{$this->getEstado()}','{$this->getmunicipio()}',
                                    '{$this->getDireccion()}','confirmado',CURDATE(),CURTIME(),{$this->getTotal()} );";
        $save=$this->db->query($sql);
       
       
        if ($save){
            $resultado=true;
        }
        return $resultado;
    }
    public function saveLinea(){
        $resultado=false;
        $sql="SELECT LAST_INSERT_ID() as 'pedido_id'; ";
        $query= $this->db->query($sql);
        $pedido_id= $query->fetch_object()->pedido_id;
        foreach ($_SESSION['carrito'] as $indice=>$prod) {
            $producto= $prod['producto'];
            $insert="INSERT into productos_pedido VALUES(null,{$pedido_id}, {$prod['id_producto']}, {$prod['unidades']}); ";
           $save= $this->db->query($insert);
        }
        
        if ($save){
            $resultado=true;
        }
        return $resultado;
    }
    public function getAllByUser(){
        $sql="SELECT p.* FROM pedidos p".
        " WHERE p.usuario_id={$this->getUsuario_id()} ORDER BY id DESC";
       
           
        $pedidos=$this->db->query($sql);
        return $pedidos;
    }
    public function getOneByUser(){
        $sql="SELECT p.id, p.total_pedido, lp.unidades  FROM pedidos p
        INNER JOIN productos_pedido lp ON lp.pedido_id=p.id ".
        " WHERE p.usuario_id={$this->getUsuario_id()} ORDER BY id DESC LIMIT 1";
       
           
        $pedido=$this->db->query($sql);
        return $pedido->fetch_object();
    }
    public function getProductsByPedido($id){
        /* $sql="SELECT * FROM productos WHERE id IN 
        (SELECT producto_id FROM productos_pedido WHERE pedido_id={$id})"; */
        $sql="SELECT p.*, lp.unidades FROM productos p INNER JOIN productos_pedido lp ON p.id=lp.producto_id
         WHERE lp.pedido_id={$id}";
        $productos= $this->db->query($sql);
        return $productos;


    }

    public function getOne(){
    $sql="SELECT * FROM pedidos WHERE id={$this->getId()}";
    $pedido=$this->db->query($sql);
        return $pedido->fetch_object();
    }
    public function getAll(){
        $sql="SELECT * FROM pedidos";
        $pedido=$this->db->query($sql);
            return $pedido;
    }
    public function updateOne(){
    $resultado=false;
    $sql="UPDATE pedidos SET estado_pedido='{$this->getStatus()}' WHERE id={$this->getId()}";
    $save=$this->db->query($sql);
   
    
       
       
        if ($save){
            $resultado=true;
        }
        return $resultado;
    }
}




?>