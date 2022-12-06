<?php
require_once SYS . DIRECTORY_SEPARATOR . 'Controlador.php';
require_once MOD .DIRECTORY_SEPARATOR . 'Carrito.php';
require_once REC . DIRECTORY_SEPARATOR . 'Celular.php';
/*
* Clase CtrlCiudad
*/
class CtrlAcerca extends Controlador {
    public function index($msg=''){
        $menu= Celular::getMenu();
        $migas = array(
            '?'=>'Inicio',
        );
        $datos = array(
            'titulo'=>"",
            'contenido'=>Vista::mostrar ('acerca/mostrar.php','',true),
            'menu'=>$menu,
            'migas'=>$migas,
            'msg'=>$msg
        );
        //var_dump();exit();
        $this->mostrarVista('template.php',$datos);
    }
}


