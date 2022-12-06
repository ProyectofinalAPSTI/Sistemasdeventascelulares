<?php
require_once SYS . DIRECTORY_SEPARATOR . 'Modelo.php';
require_once PER . DIRECTORY_SEPARATOR . "BaseDeDatos.php";

class Tienda extends Modelo {
    private $_ruc;
    private $_nombre;
    private $_telefono;
    private $_direccion;
    private $_tabla="tienda";
    private $_bd;

    public function __construct($ruc=null, $nombre=null, $telefono=null, $direccion=null){
        $this->_bd = new BaseDeDatos(new MySQL());
        $this->_ruc = $ruc;
        $this->_nombre= $nombre;
        $this->_telefono= $telefono;
        $this->_direccion= $direccion;

    }
    public function leer(){
        $sql ="SELECT * FROM ". $this->_tabla .";";
        return $this->_bd->ejecutar($sql);
        #var_dump($datos);exit();
    }
     public function leerUno(){
        $sql= "SELECT * FROM ". $this->_tabla 
            . " WHERE ruc=".$this->_ruc;
        
        $datos= $this->_bd->ejecutar($sql);  
        #var_dump($datos);exit();
        if (is_array($datos['data'])){
            $this->_ruc = $datos['data'][0]["ruc"];
            $this->_nombre = $datos['data'][0]["nombre"];  
            $this->_telefono = $datos['data'][0]["telefono"];  
            $this->_direccion = $datos['data'][0]["direccion"];  
        }

        return $datos;
    }
    public function eliminar(){
        $sql= "Delete FROM ". $this->_tabla 
            . " WHERE ruc=".$this->_ruc;
        return $this->_bd->ejecutar($sql);    
    }
    public function editar(){
        $sql ="UPDATE ". $this->_tabla 
            . " SET nombre='".$this->_nombre."'"
            . ",telefono='". $this->_telefono."'"
            . ",direccion='". $this->_direccion."'"
            ." WHERE ruc=".$this->_ruc;
        return $this->_bd->ejecutar($sql);
    }

    public function nuevo(){
        $sql = "INSERT INTO ". $this->_tabla 
            ." (ruc, nombre, telefono, direccion) VALUES (".
                $this->_ruc .",'". $this->_nombre ."','". $this->_telefono ."','". $this->_direccion."');";
        return $this->_bd->ejecutar($sql);
    }
    public function getruc(){
        return $this->_ruc;
    }
    public function getnombre(){
        return $this->_nombre;
    }
    public function gettelefono(){
        return $this->_telefono;
    }
    public function getdireccion(){
        return $this->_direccion;
    }
}