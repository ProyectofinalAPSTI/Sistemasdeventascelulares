<?php
require_once SYS . DIRECTORY_SEPARATOR . "Modelo.php";
require_once PER . DIRECTORY_SEPARATOR . "BaseDeDatos.php";
require_once "Marcas.php";
require_once "Almacenamiento.php";
require_once "Ram.php";

class Producto extends Modelo {
    private $_idproducto;   # Nuestro (PK)
    private $_nombre;
    private $_marcas;
    private $_descripcion;
    private $_almacenamiento; #Objeto de tipo Almacenamiento
    private $_ram; #Objeto de tipo Ram
    private $_pu;
    private $_stock;
    private $_tabla="productos";
    private $_vista="v_producto01";
    private $_bd;

    public function __construct($idproducto=null, $nombre=null
    , $marcas=null, $descripcion=null, $almacenamiento=null, $ram=null, $pu=null, $stock=null){
        $this->_bd = new BaseDeDatos(new MySQL());
        $this->_idproducto = $idproducto;
        $this->_nombre = $nombre;
        $this->_marcas = new Marcas($marcas);
        $this->_descripcion = $descripcion;
        $this->_almacenamiento = new Almacenamiento($almacenamiento);
        $this->_ram = new Ram($ram); 
        $this->_pu = $pu;
        $this->_stock = $stock;
    }
    public function setMarcas (Marcas $m){
        $this->_Marcas= $m;
    }
    public function getmarcas(){
        return $this->_marcas;
    }
    public function setAlmacenamiento (Almacenamiento $p){
        $this->_almacenamiento= $p;
    }
    public function getAlmacenamiento(){
        return $this->_almacenamiento;
    }
    public function setRam (Ram $r){
        $this->_ram= $r;
    }
    public function getRam(){
        return $this->_ram;
    }
    public function leer(){
        $sql ="SELECT * FROM ". $this->_vista .";";
        return $this->_bd->ejecutar($sql);
        
    }
    public function leerUno(){
        $sql= "SELECT * FROM ". $this->_vista 
            . " WHERE idproducto=".$this->_idproducto;
        $datos= $this->_bd->ejecutar($sql);  
        #var_dump($datos);exit();
        if (is_array($datos['data'])){
            $this->_idproducto = $datos['data'][0]["idproducto"];
            $this->_nombre = $datos['data'][0]["nombre"];
            $this->_marcas = new Marcas ($datos['data'][0]["idmarca"]);
            $this->_descripcion = $datos['data'][0]["descripcion"];
            $this->_almacenamiento = new Almacenamiento ($datos['data'][0]["idalmacenamiento"]);
            $this->_ram = new Ram ($datos['data'][0]["idram"]);
            $this->_pu = $datos['data'][0]["pu"];
            $this->_stock = $datos['data'][0]["stock"];
        }
        #var_dump($sql); exit();
        return $datos; 
    }
    public function getDetalles(){
        $sql= "SELECT * FROM ". $this->_vista 
            . " WHERE idproducto=".$this->_idproducto;
        $datos= $this->_bd->ejecutar($sql);  
        $sql= "SELECT * FROM imagenes_producto" 
           . " WHERE idproducto=".$this->_idproducto;
        $datos['imagenes']= $this->_bd->ejecutar($sql);
        return $datos; 
    }
    public function eliminar(){
        $sql= "Delete FROM ". $this->_tabla 
            . " WHERE idproducto=".$this->_idproducto;
        return $this->_bd->ejecutar($sql);    
    }
    public function editar(){
        $sql ="UPDATE ". $this->_tabla 
        . " SET nombre='".$this->_nombre."'"
        . ",idmarca=". $this->_marcas->getIdmarca()
        . ",descripcion='". $this->_descripcion."'"
        . ",idalmacenamiento=". $this->_almacenamiento->getIdalmacenamiento()
        . ",idram=". $this->_ram->getIdram()
        . ",pu='". $this->_pu."'"
        . ",stock='". $this->_stock."'"
        . " WHERE idproducto=".$this->_idproducto.";";
        //var_dump($sql); exit();
        return $this->_bd->ejecutar($sql);
    }

    public function nuevo(){
        $sql = "INSERT INTO ". $this->_tabla 
        ." (idproducto, nombre, idmarca, Imei, descripcion, idalmacenamiento, idram, preciocompra, precioventa, stock) VALUES 
        (".$this->_idproducto .",'". $this->_nombre ."',". $this->_marcas->getIdmarca().",'". $this->_Imei ."','". $this->_descripcion ."',". $this->_almacenamiento->getIdalmacenamiento().",". $this->_ram->getIdram().",'". $this->_preciocompra ."','". $this->_precioventa ."','". $this->_stock ."');";
        #var_dump($sql); exit();
        return $this->_bd->ejecutar($sql);
    }
    public function getIdproducto(){
        return $this->_idproducto;
    }
    public function getnombre(){
        return $this->_nombre;
    }
    public function getDescripcion(){
        return $this->_descripcion;
    }
    public function getPu(){
        return $this->_pu;
    }
    public function getStock(){
        return $this->_stock;
    }
    public function getProductosCarrito()    {
        $prod = null;
        $productos = $_SESSION['carrito']->getProductos();
        // var_dump($productos);exit();
        if (!empty($productos)){
            foreach ($productos as $key => $value) 
            $prod[] =$key;
         
            $misProductos=implode(",", $prod);

            $sql= "SELECT * FROM ". $this->_vista 
                . " WHERE idproducto in(".$misProductos.")";
            // var_dump($sql); exit();
            return $this->_bd->ejecutar($sql); 
        }else{
            return null;
        }
        
    }

}