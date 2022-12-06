<?php
require_once SYS . DIRECTORY_SEPARATOR . 'Modelo.php';
require_once PER . DIRECTORY_SEPARATOR . "BaseDeDatos.php";

class Mensaje extends Modelo {
    private $_idmensaje;
    private $_nombre;
    private $_email;
    private $_tema;
    private $_msm;
    private $_tabla="mensaje";
    private $_bd;

    public function __construct($idmensaje=null, $nombre=null, $email=null, $tema=null, $msm=null){
        $this->_bd = new BaseDeDatos(new MySQL());
        $this->_idmensaje = $idmensaje;
        $this->_nombre= $nombre;
        $this->_email= $email;
        $this->_tema= $tema;
        $this->_msm= $msm;
    }
    public function leer(){
        $sql ="SELECT * FROM ". $this->_tabla .";";
        return $this->_bd->ejecutar($sql);
    }
     public function leerUno(){
        $sql= "SELECT * FROM ". $this->_tabla 
            . " WHERE idmensaje=".$this->_idmensaje;
        $datos= $this->_bd->ejecutar($sql);  
        #var_dump($datos);exit();
        if (is_array($datos['data'])){
            $this->_idmensaje = $datos['data'][0]["idmensaje"];
            $this->_nombre = $datos['data'][0]["nombre"];  
            $this->_email = $datos['data'][0]["email"]; 
            $this->_tema = $datos['data'][0]["tema"]; 
            $this->_msm = $datos['data'][0]["msm"]; 
        }
        
        return $datos; 
    }
    public function eliminar(){
        $sql= "Delete FROM ". $this->_tabla 
            . " WHERE idmensaje=".$this->_idmensaje;
        return $this->_bd->ejecutar($sql);    
    }
    public function editar(){
        $sql ="UPDATE ". $this->_tabla 
            . " SET nombre='".$this->_nombre."',"
            . " email='".$this->_email."',"
            . " tema='".$this->_tema."',"
            . " msm='".$this->_msm."',"
            ." WHERE idmensaje=".$this->_idmensaje;
        return $this->_bd->ejecutar($sql);
    }
    public function nuevo(){
        $sql = "INSERT INTO ". $this->_tabla 
            ." (idmensaje, nombre, email, tema, msm) VALUES (
                '".''."','"
                . $this->_nombre ."','"
                . $this->_email ."','"
                . $this->_tema ."','"
                . $this->_msm ."');";
        //var_dump($sql); exit();
        return $this->_bd->ejecutar($sql);
        header("Location: ?");
        exit();
    }
    public function getIdmensaje(){
        return $this->_idmensaje;
    }
    public function getnombre(){
        return $this->_nombre;
    }
    public function getemail(){
        return $this->_email;
    }
    public function gettema(){
        return $this->_tema;
    }
    public function getmsm(){
        return $this->_msm;
    }
}