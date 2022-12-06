<?php
require_once SYS . DIRECTORY_SEPARATOR . 'Controlador.php';
require_once MOD .DIRECTORY_SEPARATOR . 'Carrito.php';
require_once REC . DIRECTORY_SEPARATOR . 'Celular.php';
require_once MOD .DIRECTORY_SEPARATOR . 'Graficador.php';
/*
* Clase CtrlPrincipal
*/
class CtrlPrincipal extends Controlador {
    
    public function index(){
        $menu= Celular::getMenu();
        $migas = array(
            '?'=>'Hola',
        );
        $datos = array(
            'titulo'=>"",
            'contenido'=>Vista::mostrar('principal.php','',true),
            'menu'=>$menu,
            'migas'=>$migas,
            'msg'=>array(
                'titulo'=>'',
                'cuerpo'=>''
            )
        );
        $this->mostrarVista('template.php',$datos);

    }
    public function getCatalogo(){
        $menu= Celular::getMenu();
        $migas = array(
            '?'=>'Inicio',
            '#'=>'Catálogo',
        );

        $obj = new Producto();
        $resultado = $obj->leer();
        
        $msg=(!isset($_GET['id']))?array('titulo'=>'','cuerpo'=>''):array('titulo'=>'Nuevo elemento','cuerpo'=>'Se agregó un elemento al Carrito');
        $datos = array(
            'titulo'=>"Catálogo",
            'contenido'=>Vista::mostrar('principal.php',$resultado,true),
            'menu'=>$menu,
            'migas'=>$migas,
            'msg'=>$msg
        );
        
        $this->mostrarVista('template.php',$datos);
    }
    public function error404()
    {
        $datos= array(
            'controlador'=>isset($_GET['ctrl'])?$_GET['ctrl']:'CtrlPrincipal',
            'accion'=>isset($_GET['accion'])?$_GET['accion']:'index'
        );
        $this->mostrarVista('404.php',$datos);
    }
    public function gracias(){
        $menu= Celular::getMenu();
        $migas = array(
            '?'=>'Inicio',
        );
        unset($_SESSION['carrito']);
        $datos = array(
            'titulo'=>"Sistema de Ventas",
            'contenido'=>Vista::mostrar('gracias.php','',true),
            'menu'=>$menu,
            'migas'=>$migas,
            'msg'=>array(
                    'titulo'=>'',
                    'cuerpo'=>''
            )
        );
        
        $this->mostrarVista('template.php',$datos);

    }
    public function procesarcompra(){
        $menu= Celular::getMenu();
        $migas = array(
            '?'=>'Inicio',
        );
        $datosGraf= $this->getGraficoModelosXMarcas();
        unset($_SESSION['carrito']);
        $datos = array(
            'titulo'=>"Sistema de Ventas",
            'contenido'=>Vista::mostrar('procesarcompra.php','',true),
            'menu'=>$menu,
            'migas'=>$migas,
            'msg'=>array(
                    'titulo'=>'',
                    'cuerpo'=>''
            )
        );
        
        $this->mostrarVista('template.php',$datos);

    }
    
}