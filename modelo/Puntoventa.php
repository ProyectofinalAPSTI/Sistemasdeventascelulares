<?php
require_once SYS . DIRECTORY_SEPARATOR . "Modelo.php";
require_once PER . DIRECTORY_SEPARATOR . "BaseDeDatos.php";
require_once "Producto.php";

class Puntoventa extends Modelo {
    private $_idpuntoventa;   # Nuestro (PK)
    private $_producto; #Objeto de tipo Producto
    private $_tabla="producto";
    private $_vista="v_productos";
    private $_bd;

    public function __construct($idproducto=null, $nombre=null
    , $Marca=null, $Imei=null, $descripcion=null, $almacenamiento=null, $ram=null, $preciocompra=null, $precioventa=null, $stock=null){
        $this->_bd = new BaseDeDatos(new MySQL());
        $this->_idproducto = $idproducto;
        $this->_nombre = $nombre;
        $this->_Marca = $Marca; 
        $this->_Imei = $Imei;
        $this->_descripcion = $descripcion;
        $this->_almacenamiento = new Almacenamiento($almacenamiento);
        $this->_ram = new Ram($ram); 
        $this->_preciocompra = $preciocompra;
        $this->_precioventa = $precioventa;
        $this->_stock = $stock;
    }

    public function setProducto (Producto $p){
        $this->_producto= $p;
    }
    public function getProducto(){
        return $this->_producto;
    }
    public function leer(){
        $sql ="SELECT * FROM ". $this->_vista .";";
        return $this->_bd->ejecutar($sql);
        
    }
    public function leerUno(){
        $sql= "SELECT * FROM ". $this->_vista 
            . " WHERE idpuntoventa=".$this->_idpuntoventa;
        $datos= $this->_bd->ejecutar($sql); 
        #var_dump($datos);exit();
        if (is_array($datos['data'])){
            $this->_idpuntoventa = $datos['data'][0]["idpuntoventa"];
            $this->_producto = new Producto ($datos['data'][0]["idproducto"]);
            $this->_producto = new Producto ($datos['data'][0]["nombre"]);
            $this->_producto = new Producto ($datos['data'][0]["Marca"]);
            $this->_producto = new Producto ($datos['data'][0]["Imei"]);
            $this->_producto = new Producto ($datos['data'][0]["descripcion"]);
            $this->_producto = new Producto ($datos['data'][0]["almacenamiento"]);
            $this->_producto = new Producto ($datos['data'][0]["ram"]);
            $this->_producto = new Producto ($datos['data'][0]["preciocompra"]);
            $this->_producto = new Producto ($datos['data'][0]["precioventa"]);
            $this->_producto = new Producto ($datos['data'][0]["stock"]);
        }
        #var_dump($sql); exit();
        return $datos; 
    }
    public function eliminar(){
        $sql= "Delete FROM ". $this->_tabla 
            . " WHERE idpuntoventa=".$this->_idpuntoventa;
        return $this->_bd->ejecutar($sql);    
    }
    public function editar(){
        $sql ="UPDATE ". $this->_tabla 
        . " SET nombre='".$this->_nombre."'"
        . " SET idproducto=". $this->_producto->getIdproducto()
        . ",nombre=". $this->_producto->getnombre()
        . ",Marca=". $this->_producto->getMarca()
        . ",Imei=". $this->_producto->getImei()
        . ",descripcion=". $this->_producto->getdescripcion()
        . ",idalmacenamiento=". $this->_producto->getalmacenamiento()
        . ",preciocompra=". $this->_producto->getpreciocompra()
        . ",precioventa=". $this->_producto->getprecioventa()
        . ",stock=". $this->_producto->getstock()
        . " WHERE idpuntoventa=".$this->_idpuntoventa.";";
        #var_dump($sql); exit();
        return $this->_bd->ejecutar($sql);
    }

    public function nuevo(){
        $sql = "INSERT INTO ". $this->_tabla 
        ." (idproducto, nombre, Marca, Imei, descripcion, idalmacenamiento, idram, preciocompra, precioventa, stock) VALUES 
        (".$this->_idproducto .",'". $this->_nombre ."','". $this->_Marca ."','". $this->_Imei ."','". $this->_descripcion ."',". $this->_almacenamiento->getIdalmacenamiento().",". $this->_ram->getIdram().",'". $this->_preciocompra ."','". $this->_precioventa ."','". $this->_stock ."');";
        #var_dump($sql); exit();
        return $this->_bd->ejecutar($sql);
    }
    public function getIdproducto(){
        return $this->_idproducto;
    }
    public function getnombre(){
        return $this->_nombre;
    }
    public function getMarca(){
        return $this->_Marca;
    }
    public function getImei(){
        return $this->_Imei;
    }
    public function getDescripcion(){
        return $this->_descripcion;
    }
    public function getPreciocompra(){
        return $this->_preciocompra;
    }
    public function getPrecioventa(){
        return $this->_precioventa;
    }
    public function getStock(){
        return $this->_stock;
    }
}