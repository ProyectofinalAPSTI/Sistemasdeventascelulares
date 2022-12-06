<?php
require_once SYS . DIRECTORY_SEPARATOR . 'Modelo.php';
require_once PER . DIRECTORY_SEPARATOR . "BaseDeDatos.php";

class Almacenamiento extends Modelo {
    private $_idalmacenamiento;
    private $_capacidad;
    private $_tabla="almacenamiento";
    private $_bd;

    public function __construct($idalmacenamiento=null, $capacidad=null){
        $this->_bd = new BaseDeDatos(new MySQL());
        $this->_idalmacenamiento = $idalmacenamiento;
        $this->_capacidad= $capacidad;
    }
    public function leer(){
        $sql ="SELECT * FROM ". $this->_tabla .";";
        return $this->_bd->ejecutar($sql);
    }
     public function leerUno(){
        $sql= "SELECT * FROM ". $this->_tabla 
            . " WHERE idalmacenamiento=".$this->_idalmacenamiento;
        $datos= $this->_bd->ejecutar($sql);  
        #var_dump($datos);exit();
        if (is_array($datos['data'])){
            $this->_idalmacenamiento = $datos['data'][0]["idalmacenamiento"];
            $this->_capacidad = $datos['data'][0]["capacidad"];  
        }
        
        return $datos; 
    }
    public function eliminar(){
        $sql= "Delete FROM ". $this->_tabla 
            . " WHERE idalmacenamiento=".$this->_idalmacenamiento;
        return $this->_bd->ejecutar($sql);    
    }
    public function editar(){
        $sql ="UPDATE ". $this->_tabla 
            . " SET capacidad='".$this->_capacidad."'"
            ." WHERE idalmacenamiento=".$this->_idalmacenamiento;
            
        return $this->_bd->ejecutar($sql);
    }

    public function nuevo(){
        $sql = "INSERT INTO ". $this->_tabla 
            ." (idalmacenamiento, capacidad) VALUES (".
                $this->_idalmacenamiento .",'". $this->_capacidad ."'"
            .");";
        return $this->_bd->ejecutar($sql);
    }
    public function getIdalmacenamiento(){
        return $this->_idalmacenamiento;
    }
    public function getcapacidad(){
        return $this->_capacidad;
    }
}
