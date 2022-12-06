<?php
require_once SYS . DIRECTORY_SEPARATOR . 'Modelo.php';
require_once PER . DIRECTORY_SEPARATOR . "BaseDeDatos.php";

class perfiles extends Modelo {
    private $_idperfil;
    private $_perfil;
    private $_tabla="perfiles";
    private $_bd;

    public function __construct($idperfil=null, $perfil=null){
        $this->_bd = new BaseDeDatos(new MySQL());
        $this->_idperfil = $idperfil;
        $this->_perfil= $perfil;
    }
    public function leer(){
        $sql ="SELECT * FROM ". $this->_tabla .";";
        return $this->_bd->ejecutar($sql);
    }
     public function leerUno(){
        $sql= "SELECT * FROM ". $this->_tabla 
            . " WHERE idperfil=".$this->_idperfil;
        
        $datos= $this->_bd->ejecutar($sql);  
        //var_dump($datos);exit();
        if (is_array($datos['data'])){
            $this->_idperfil = $datos['data'][0]["idperfil"];
            $this->_perfil = $datos['data'][0]["perfil"];  
        }
        
        return $datos; 
    }
    
    public function eliminar(){
        $sql= "Delete FROM ". $this->_tabla 
            . " WHERE idperfil=".$this->_idperfil;
        return $this->_bd->ejecutar($sql);    
    }
    public function editar(){
        $sql ="UPDATE ". $this->_tabla 
            . " SET perfil='".$this->_perfil."'"
            ." WHERE idperfil=".$this->_idperfil;
        return $this->_bd->ejecutar($sql);
    }

    public function nuevo(){
        $sql = "INSERT INTO ". $this->_tabla 
            ." (idperfil, perfil) VALUES (".
                $this->_idperfil .",'". $this->_perfil ."'"
            .");";
        return $this->_bd->ejecutar($sql);
    }
    public function getidperfil(){
        return $this->_idperfil;
    }
    public function getperfil(){
        return $this->_perfil;
    }
}