<?php
require_once SYS . DIRECTORY_SEPARATOR . 'Controlador.php';
require_once MOD .DIRECTORY_SEPARATOR . 'Ram.php';
require_once REC . DIRECTORY_SEPARATOR . 'Celular.php';
/*
* Clase CtrlPais
*/
class CtrlRam extends Controlador {
    
    public function index($msg=''){
        $menu= Celular::getMenu();
        $migas = array(
            '?'=>'Inicio',
            '#'=>'Listado'
        );

        $obj = new Ram();
        $resultado = $obj->leer();

        $datos = array(
            'titulo'=>"Ram",
            'contenido'=>Vista::mostrar('ram/mostrar.php',$resultado,true),
            'menu'=>$menu,
            'migas'=>$migas,
            'msg'=>$msg
        );
        
        $this->mostrarVista('template.php',$datos);
    }
    public function nuevo(){
        $menu = Celular::getMenu();
        $msg= array(
            'titulo'=>'Nuevo...',
            'cuerpo'=>'Ingrese información para nuevo Ram');
        $migas = array(
            '?'=>'Inicio',
            '?ctrl=CtrlRam'=>'Listado',
            '#'=>'Nuevo'
        );
        $datos1=array(
            'encabezado'=>'Nuevo Ram'
            );

        $datos = array(
                'titulo'=>'Nuevo Ram',
                'contenido'=>Vista::mostrar('ram/frmNuevo.php',$datos1,true),
                'menu'=>$menu,
                'migas'=>$migas,
                'msg'=>$msg
            );
        $this->mostrarVista('template.php',$datos);
    }

    public function guardarNuevo(){
        $obj = new Ram (
                $_POST["idram"],
                $_POST["capacidad"],
                );
        $respuesta=$obj->nuevo();

        $this->index($respuesta['msg']);
    }
    public function eliminar(){
        if (isset($_REQUEST['idram'])) {
            $obj = new Ram($_REQUEST['idram']);
            $resultado=$obj->eliminar();
            $this->index($resultado['msg']);
        } else {
            echo "...El Id a ELIMINAR es requerido";
        }
    }
    public function editar(){
        #Mostramos el Formulario de Editar
        $datos=null;
        $menu = Celular::getMenu();
        $msg= array(
            'titulo'=>'Editando...',
            'cuerpo'=>'Iniciando edición de: '.$_REQUEST['idram']);
        $migas = array(
            '?'=>'Inicio',
            '?ctrl=CtrlRam'=>'Listado',
            '#'=>'Editar',
        );
        if (isset($_REQUEST['idram'])) {
            $obj = new Ram($_REQUEST['idram']);
            $miObj = $obj->leerUno();
            #var_dump($obj->leerUno());exit();
            if (is_null($miObj['data'])) {
                $this->index(array(
                    'titulo'=>'Error',
                    'cuerpo'=>'ID Requerido: '.$_REQUEST['idram']. ' No Existe')
                );
            }else{
                $datos1 = array(
                    'ram'=>$obj
                );
            $datos = array(
                'titulo'=>'Editando Ram: '. $_REQUEST['idram'],
                'contenido'=>Vista::mostrar('ram/frmEditar.php',$datos1,true),
                'menu'=>$menu,
                'migas'=>$migas,
                'msg'=>$msg
            );
            }
            
        }else {
            $msg= array(
            'titulo'=>'Error',
            'cuerpo'=>'No se encontró al ID requerido');

            $datos = array(
                'titulo'=>'Editando ram... DESCONOCIDO',
                'contenido'=>'...El Id a Editar es requerido',
                'menu'=>$menu,
                'migas'=>$migas,
                'msg'=>$msg);
        }
        
        $this->mostrarVista('template.php',$datos);

        
    }
    public function guardarEditar(){
        $obj = new Ram (
                $_POST["idram"],    #El id que enviamos
                $_POST["capacidad"]
                );
        $respuesta=$obj->editar();
        
        $this->index($respuesta['msg']);
    }
}