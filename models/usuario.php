<?php

class usuario{
    private $id;
    private $nombre;
    private $apellido;
    private $email;
    private $pass;
    private $rol;
    private $img;
    private $db;

        public function __construct()
        {
            $this->db= Database::Conexion();
        }

//---------------------metodos set y get-----------------------
    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

      
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
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $this->db->real_escape_string($nombre);

      
    }

    /**
     * Get the value of apellido
     */ 
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set the value of apellido
     *
     * @return  self
     */ 
    public function setApellido($apellido)
    {
        $this->apellido = $this->db->real_escape_string($apellido);

       
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $this->db->real_escape_string( $email);

    }

    /**
     * Get the value of pass
     */ 
    public function getPass()
    {
        return  password_hash($this->db->real_escape_string($this->pass), PASSWORD_BCRYPT, ['COST'=>4]);;
    }

    /**
     * Set the value of pass
     *
     * @return  self
     */ 
    public function setPass($pass)
    {
        $this->pass =$pass;

      
    }

    /**
     * Get the value of rol
     */ 
    public function getRol()
    {
        return $this->rol;
    }

    /**
     * Set the value of rol
     *
     * @return  self
     */ 
    public function setRol($rol)
    {
        $this->rol = $rol;

        
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
     *
     * @return  self
     */ 
    public function setImg($img)
    {
        $this->img = $img;

       
    }

    //-------------------------------------------------------------

    public function saveUser(){
        $resultado=false;
        $sql="INSERT INTO usuarios VALUES(null, '{$this->getNombre()}', '{$this->getApellido()}', '{$this->getPass()}', 
                                                '{$this->getEmail()}',CURDATE(), 'user', 'dafaul.png' );";
        $save=$this->db->query($sql);
        if ($save){
            $resultado=true;
        }
        return $resultado;
    }

    public function login(){
        $resultado=false;
        $email= $this->email;
        $pass= $this->pass;
       //existe usuario??
        $sql="SELECT * FROM usuarios WHERE email='$email'";
       
       $login= $this->db->query($sql);
        
        
       if ($login && $login->num_rows==1 ){
        $usuario= $login->fetch_object();

        //verificar la contraseña
        $verify= password_verify($pass,$usuario->pass);
        
       
        if ($verify) {
            $resultado=$usuario;
        }

       }
        return $resultado;
    }
}