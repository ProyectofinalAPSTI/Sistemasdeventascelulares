<?php
require_once SYS . DIRECTORY_SEPARATOR . 'Modelo.php';
require_once PER . DIRECTORY_SEPARATOR . "BaseDeDatos.php";

class Marcas extends Modelo {
    private $_idmarca;
    private $_marca;
    private $_tabla="marcas";
    private $_bd;

    public function __construct($idmarca=null, $marca=null){
        $this->_bd = new BaseDeDatos(new MySQL());
        $this->_idmarca = $idmarca;
        $this->_marca= $marca;
    }
    public function leer(){
        $sql ="SELECT * FROM ". $this->_tabla .";";
        return $this->_bd->ejecutar($sql);
    }
     public function leerUno(){
        $sql= "SELECT * FROM ". $this->_tabla 
            . " WHERE idmarca=".$this->_idmarca;
        
        $datos= $this->_bd->ejecutar($sql);  
        //var_dump($datos);exit();
        if (is_array($datos['data'])){
            $this->_idmarca = $datos['data'][0]["idmarca"];
            $this->_marca = $datos['data'][0]["marca"];  
        }
        
        return $datos; 
    }
    public function eliminar(){
        $sql= "Delete FROM ". $this->_tabla 
            . " WHERE idmarca=".$this->_idmarca;
        return $this->_bd->ejecutar($sql);    
    }
    public function editar(){
        $sql ="UPDATE ". $this->_tabla 
            . " SET marca='".$this->_marca."'"
            ." WHERE idmarca=".$this->_idmarca;
        return $this->_bd->ejecutar($sql);
    }

    public function nuevo(){
        $sql = "INSERT INTO ". $this->_tabla 
            ." (idmarca, marca) VALUES (".
                $this->_idmarca .",'". $this->_marca ."'"
            .");";
        return $this->_bd->ejecutar($sql);
    }
    public function getidmarca(){
        return $this->_idmarca;
    }
    public function getmarca(){
        return $this->_marca;
    }
}