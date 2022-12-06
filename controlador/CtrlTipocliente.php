<?php
require_once SYS . DIRECTORY_SEPARATOR . 'Controlador.php';
require_once MOD .DIRECTORY_SEPARATOR . 'Tipocliente.php';
require_once REC . DIRECTORY_SEPARATOR . 'Celular.php';
/*
* Clase CtrlPais
*/
class CtrlTipocliente extends Controlador {
    
    public function index($msg=''){
        $menu= Celular::getMenu();
        $migas = array(
            '?'=>'Inicio',
            '#'=>'Listado'
        );

        $obj = new Tipocliente();
        $resultado = $obj->leer();

        $datos = array(
            'titulo'=>"Tipocliente",
            'contenido'=>Vista::mostrar('tipocliente/mostrar.php',$resultado,true),
            'menu'=>$menu,
            'migas'=>$migas,
            'msg'=>$msg
        );
        #var_dump($datos);exit();
        $this->mostrarVista('template.php',$datos);
    }
    public function nuevo(){
        $menu = Celular::getMenu();
        $msg= array(
            'titulo'=>'Nuevo...',
            'cuerpo'=>'Ingrese información para nuevo Tipocliente');
        $migas = array(
            '?'=>'Inicio',
            '?ctrl=CtrlTipocliente'=>'Listado',
            '#'=>'Nuevo'
        );
        $datos1=array(
            'encabezado'=>'Nuevo Tipocliente'
            );

        $datos = array(
                'titulo'=>'Nuevo Tipo cliente',
                'contenido'=>Vista::mostrar('tipocliente/frmNuevo.php',$datos1,true),
                'menu'=>$menu,
                'migas'=>$migas,
                'msg'=>$msg
            );
        $this->mostrarVista('template.php',$datos);
    }

    public function guardarNuevo(){
        $obj = new Tipocliente (
                $_POST["idtipo"],
                $_POST["persona"],
                );
        $respuesta=$obj->nuevo();
        #var_dump($datos);exit();
        $this->index($respuesta['msg']);
    }
    public function eliminar(){
        if (isset($_REQUEST['idtipo'])) {
            $obj = new Tipocliente($_REQUEST['idtipo']);
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
            'cuerpo'=>'Iniciando edición de: '.$_REQUEST['idtipo']);
        $migas = array(
            '?'=>'Inicio',
            '?ctrl=CtrlTipocliente'=>'Listado',
            '#'=>'Editar',
        );
        if (isset($_REQUEST['idtipo'])) {
            $obj = new Tipocliente($_REQUEST['idtipo']);
            $miObj = $obj->leerUno();
            #var_dump($obj->leerUno());exit();
            if (is_null($miObj['data'])) {
                $this->index(array(
                    'titulo'=>'Error',
                    'cuerpo'=>'ID Requerido: '.$_REQUEST['idtipo']. ' No Existe')
                );
            }else{
                $datos1 = array(
                    'tipocliente'=>$obj
                );
            $datos = array(
                'titulo'=>'Editando tipocliente: '. $_REQUEST['idtipo'],
                'contenido'=>Vista::mostrar('tipocliente/frmEditar.php',$datos1,true),
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
                'titulo'=>'Editando tipocliente... DESCONOCIDO',
                'contenido'=>'...El Id a Editar es requerido',
                'menu'=>$menu,
                'migas'=>$migas,
                'msg'=>$msg);
        }
        
        $this->mostrarVista('template.php',$datos);

        
    }
    public function guardarEditar(){
        $obj = new Tipocliente (
                $_POST["idtipo"],    #El id que enviamos
                $_POST["persona"]
                );
        $respuesta=$obj->editar();
        
        $this->index($respuesta['msg']);
    }
}