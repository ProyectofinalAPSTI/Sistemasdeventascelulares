<?php
require_once SYS . DIRECTORY_SEPARATOR . 'Controlador.php';
require_once MOD .DIRECTORY_SEPARATOR . 'imagenes_producto.php';
require_once REC . DIRECTORY_SEPARATOR . 'Celular.php';
/*
* Clase CtrlPais
*/
class Ctrlimagenes_producto extends Controlador {
    
    public function index($msg=''){
        $menu= Celular::getMenu();
        $migas = array(
            '?'=>'Inicio',
            '#'=>'Listado'
        );

        $obj = new imagenes_producto();
        $resultado = $obj->leer();

        $datos = array(
            'titulo'=>"Imagenes",
            'contenido'=>Vista::mostrar('imgproductos/mostrar.php',$resultado,true),
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
                'contenido'=>Vista::mostrar('imgproductos/frmNuevo.php',$datos1,true),
                'menu'=>$menu,
                'migas'=>$migas,
                'msg'=>$msg
            );
        $this->mostrarVista('template.php',$datos);
    }

    public function guardarNuevo(){
        $obj = new imagenes_producto (
                $_POST["idimagen"],
                $_POST["url"],
                $_POST["producto"],
                $_POST["nombre"]
                );
        $respuesta=$obj->nuevo();

        $this->index($respuesta['msg']);
    }
    public function eliminar(){
        if (isset($_REQUEST['idimagen'])) {
            $obj = new imagenes_producto($_REQUEST['idimagen']);
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
            'cuerpo'=>'Iniciando edición de: '.$_REQUEST['idimagen']);
            //var_dump();exit();
        $migas = array(
            '?'=>'Inicio',
            '?ctrl=Ctrlimagenes_producto'=>'Listado',
            '#'=>'Editar',
        );
        if (isset($_REQUEST['idimagen'])) {
            $obj = new imagenes_producto($_REQUEST['idimagen']);
            $miObj = $obj->leerUno();
            //var_dump($obj->leerUno());exit();
            if (is_null($miObj['data'])) {
                $this->index(array(
                    'titulo'=>'Error',
                    'cuerpo'=>'ID Requerido: '.$_REQUEST['idimagen']. ' No Existe')
                );
            }else{
                $datos1 = array(
                    'imagenes_producto'=>$obj
                );
            $datos = array(
                'titulo'=>'Editando Imagen: '. $_REQUEST['idimagen'],
                'contenido'=>Vista::mostrar('imgproductos/frmEditar.php',$datos1,true),
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
        $obj = new imagenes_producto (
                $_POST["idimagen"],
                $_POST["url"],
                $_POST["producto"],
                $_POST["nombre"]
                );
        $respuesta=$obj->editar();
        
        $this->index($respuesta['msg']);
    }
}