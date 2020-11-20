<?php
class Database{
    public static function Conexion(){
        $conexion= new mysqli("localhost","root","","tienda_master");
        $conexion->query("SET NAMES 'utf8'");
        return $conexion;
    }
}