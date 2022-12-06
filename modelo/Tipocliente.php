<?php
require_once SYS . DIRECTORY_SEPARATOR . 'Modelo.php';
require_once PER . DIRECTORY_SEPARATOR . "BaseDeDatos.php";

class Tipocliente extends Modelo {
    private $_idtipo;
    private $_persona;
    private $_tabla="tipocliente";
    private $_bd;

    public function __construct($idtipo=null, $persona=null){
        $this->_bd = new BaseDeDatos(new MySQL());
        $this->_idtipo = $idtipo;
        $this->_persona= $persona;
    }
    public function leer(){
        $sql ="SELECT * FROM ". $this->_tabla .";";
        return $this->_bd->ejecutar($sql);
        #var_dump($datos);exit();
    }
     public function leerUno(){
        $sql= "SELECT * FROM ". $this->_tabla 
            . " WHERE idtipo=".$this->_idtipo;
        
        $datos= $this->_bd->ejecutar($sql);  
        #var_dump($datos);exit();
        if (is_array($datos['data'])){
            $this->_idtipo = $datos['data'][0]["idtipo"];
            $this->_persona = $datos['data'][0]["persona"];  
        }
        
        return $datos; 
    }
    public function eliminar(){
        $sql= "Delete FROM ". $this->_tabla 
            . " WHERE idtipo=".$this->_idtipo;
        return $this->_bd->ejecutar($sql);    
    }
    public function editar(){
        $sql ="UPDATE ". $this->_tabla 
            . " SET persona='".$this->_persona."'"
            ." WHERE idtipo=".$this->_idtipo;
        return $this->_bd->ejecutar($sql);
    }

    public function nuevo(){
        $sql = "INSERT INTO ". $this->_tabla 
            ." (idtipo, persona) VALUES (".
                $this->_idtipo .",'". $this->_persona ."'"
            .");";
        return $this->_bd->ejecutar($sql);
    }
    public function getidtipo(){
        return $this->_idtipo;
    }
    public function getpersona(){
        return $this->_persona;
    }
}