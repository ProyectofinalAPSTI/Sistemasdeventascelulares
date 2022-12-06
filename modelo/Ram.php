<?php
require_once SYS . DIRECTORY_SEPARATOR . 'Modelo.php';
require_once PER . DIRECTORY_SEPARATOR . "BaseDeDatos.php";

class Ram extends Modelo {
    private $_idram;
    private $_capacidad;
    private $_tabla="ram";
    private $_bd;

    public function __construct($idram=null, $capacidad=null){
        $this->_bd = new BaseDeDatos(new MySQL());
        $this->_idram = $idram;
        $this->_capacidad= $capacidad;
    }
    public function leer(){
        $sql ="SELECT * FROM ". $this->_tabla .";";
        return $this->_bd->ejecutar($sql);
    }
     public function leerUno(){
        $sql= "SELECT * FROM ". $this->_tabla 
            . " WHERE idram=".$this->_idram;
        
        $datos= $this->_bd->ejecutar($sql);  
        //var_dump($datos);exit();
        if (is_array($datos['data'])){
            $this->_idram = $datos['data'][0]["idram"];
            $this->_capacidad = $datos['data'][0]["capacidad"];  
        }
        
        return $datos; 
    }
    public function eliminar(){
        $sql= "Delete FROM ". $this->_tabla 
            . " WHERE idram=".$this->_idram;
        return $this->_bd->ejecutar($sql);    
    }
    public function editar(){
        $sql ="UPDATE ". $this->_tabla 
            . " SET capacidad='".$this->_capacidad."'"
            ." WHERE idram=".$this->_idram;
        return $this->_bd->ejecutar($sql);
    }

    public function nuevo(){
        $sql = "INSERT INTO ". $this->_tabla 
            ." (idram, capacidad) VALUES (".
                $this->_idram .",'". $this->_capacidad ."'"
            .");";
        return $this->_bd->ejecutar($sql);
    }
    public function getIdram(){
        return $this->_idram;
    }
    public function getcapacidad(){
        return $this->_capacidad;
    }
}