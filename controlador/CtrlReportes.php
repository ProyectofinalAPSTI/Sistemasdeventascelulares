<?php
require_once SYS . DIRECTORY_SEPARATOR . 'Controlador.php';
require_once MOD .DIRECTORY_SEPARATOR . 'Carrito.php';
require_once REC . DIRECTORY_SEPARATOR . 'Celular.php';
require_once MOD . DIRECTORY_SEPARATOR . 'Producto.php';
require_once MOD . DIRECTORY_SEPARATOR . 'Graficador.php';
require_once MOD . DIRECTORY_SEPARATOR . 'Reportes.php';
/*
* Clase CtrlCiudad
*/
class CtrlReportes extends Controlador {
    public function index($msg=''){
        $menu= Celular::getMenu();
        $migas = array(
            '?'=>'Inicio',
        );
        $datosGraf= $this->getGraficoModelosXMarcas();
        $datosCantt= $this->getCantidadProductos();
        $datos = array(
            'titulo'=>"",
            'contenido'=>Vista::mostrar ('Reportes/mostrar.php',$datosCantt,true),
            'menu'=>$menu,
            'migas'=>$migas,
            'msg'=>array(
                'titulo'=>'',
                'cuerpo'=>''
            ),
        'data'=>null,
        'grafico'=>$datosGraf,
        'total'=>$datosCantt
        );
        //var_dump();exit();
        $this->mostrarVista('template.php',$datos);
    }
    private function getGraficoModelosXMarcas(){
        $g = new Graficador();
        $datos = $g->getModeloXMarca();
        return $datos;
    }
    private function getCantidadProductos(){
        $da = new Reportes();
        $datos = $da->getDatosCantidad();
        //var_dump($datos);exit();
        return $datos;
    }

}
