<?php
require_once SYS . DIRECTORY_SEPARATOR . 'Modelo.php';
require_once PER . DIRECTORY_SEPARATOR . "BaseDeDatos.php";

class Reportes extends Modelo {
    private $_bd;
    public function __construct() {
        $this->_bd = new BaseDeDatos(new MySQL());
    }
    public function getDatosCantidad(){
        $sql ="call CantidadTotalProductos;";    
        $datos = $this->_bd->ejecutar($sql);
        return $this->getArray($datos['data']);
    }
    private function getArray($datos){
        $data=null;
        foreach ($datos as $d) {
            $data[]=$d['TotaldeProductos'];
        }
        //var_dump($datos);exit();
        return array('data'=>$data);
    }
    public function getPoquito(){
        $sql = "SELECT COUNT(productos.idproducto) AS ProductosPocoStock FROM productos WHERE productos.stock<=5;";
        return $this->_bd->ejecutar($sql);
    }
    public function getTotalanual(){
        $sql = "SELECT boletas.*, CAST(SUM(detallesboletas.subtotal) AS DECIMAL(8,2))AS TotalVentasMes FROM boletas INNER JOIN detallesboletas ON boletas.idboleta=detallesboletas.idboleta WHERE year(boletas.fecha)=2022 LIMIT 100;";
        return $this->_bd->ejecutar($sql);
    }
    public function getColpoquito(){
        $sql = "SELECT * FROM `v_listapocostock`;";
        return $this->_bd->ejecutar($sql);
        //var_dump($sql);exit();
    }
    public function getTotalmes(){
        $sql = "SELECT boletas.*, CAST(SUM(detallesboletas.subtotal) AS DECIMAL(8,2))AS TotalVentasMes FROM boletas INNER JOIN detallesboletas ON boletas.idboleta=detallesboletas.idboleta WHERE year(boletas.fecha)=2022 and month(boletas.fecha)=12 LIMIT 100;";
        return $this->_bd->ejecutar($sql);
    }
}