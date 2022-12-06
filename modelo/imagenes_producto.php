<?php
require_once SYS . DIRECTORY_SEPARATOR . 'Modelo.php';
require_once PER . DIRECTORY_SEPARATOR . "BaseDeDatos.php";
require_once "Producto.php";
class imagenes_producto extends Modelo {
    private $_idimagen;
    private $_url;
    private $_producto;
    private $_nombre;
    private $_tabla="imagenes_producto";
    private $_vista="v_imgproductos";
    private $_bd;

    public function __construct($idimagen=null, $url=null, $producto=null, $nombre=null){
        $this->_bd = new BaseDeDatos(new MySQL());
        $this->_idimagen = $idimagen;
        $this->_url= $url;
        $this->_producto= new Producto($producto);
        $this->_nombre= $nombre;
    }
    public function setproducto (Producto $p){
        $this->_producto= $p;
    }
    public function getproducto(){
        return $this->_producto;
    }
    public function leer(){
        $sql ="SELECT * FROM ". $this->_vista .";";
        return $this->_bd->ejecutar($sql);
    }
     public function leerUno(){
        $sql= "SELECT * FROM ". $this->_vista 
            . " WHERE idimagen=".$this->_idimagen;
        
        $datos= $this->_bd->ejecutar($sql);  
        //var_dump($datos);exit();
        if (is_array($datos['data'])){
            $this->_idimagen = $datos['data'][0]["idimagen"];
            $this->_url = $datos['data'][0]["url"];  
            $this->_producto = new Producto ($datos['data'][0]["idproducto"]);
            $this->_nombre = $datos['data'][0]["nombre"];
        }
        
        return $datos; 
    }
    public function eliminar(){
        $sql= "Delete FROM ". $this->_tabla 
            . " WHERE idimagen=".$this->_idimagen;
        return $this->_bd->ejecutar($sql);    
    }
    public function editar(){
        $sql ="UPDATE ". $this->_tabla 
            . " SET url='".$this->_url."'"
            . ", idproducto=".$this->_producto->getidproducto() 
            . ", nombre='".$this->_nombre ."'"
            ." WHERE idimagen=".$this->_idimagen.";";
            //var_dump($sql); exit();
        return $this->_bd->ejecutar($sql);
    }

    public function nuevo(){
        $sql = "INSERT INTO ". $this->_tabla 
            ." (idimagen, url) VALUES (".
                $this->_idimagen .",'". $this->_url ."'"
            .");";
        return $this->_bd->ejecutar($sql);
    }
    public function getidimagen(){
        return $this->_idimagen;
    }
    public function geturl(){
        return $this->_url;
    }
    public function getnombre(){
        return $this->_nombre;
    }
}