<?php
require_once SYS . DIRECTORY_SEPARATOR . 'Controlador.php';
require_once MOD .DIRECTORY_SEPARATOR . 'Almacenamiento.php';
require_once REC . DIRECTORY_SEPARATOR . 'Celular.php';
/*
* Clase CtrlPais
*/
class CtrlAlmacenamiento extends Controlador {
    
    public function index($msg=''){
        $menu= Celular::getMenu();
        $migas = array(
            '?'=>'Inicio',
            '#'=>'Listado'
        );

        $obj = new Almacenamiento();
        $resultado = $obj->leer();

        $datos = array(
            'titulo'=>"Almacenamiento",
            'contenido'=>Vista::mostrar('almacenamiento/mostrar.php',$resultado,true),
            'menu'=>$menu,
            'migas'=>$migas,
            'msg'=>$msg
        );
        #var_dump($obj->leerUno());exit();
        $this->mostrarVista('template.php',$datos);
    }
    public function nuevo(){
        $menu = Celular::getMenu();
        $msg= array(
            'titulo'=>'Nuevo...',
            'cuerpo'=>'Ingrese información para nuevo Almacenamiento');
        $migas = array(
            '?'=>'Inicio',
            '?ctrl=CtrlAlmacenamiento'=>'Listado',
            '#'=>'Nuevo'
        );
        $datos1=array(
            'encabezado'=>'Nuevo Almacenamiento'
            );

        $datos = array(
                'titulo'=>'Nuevo Almacenamiento',
                'contenido'=>Vista::mostrar('almacenamiento/frmNuevo.php',$datos1,true),
                'menu'=>$menu,
                'migas'=>$migas,
                'msg'=>$msg
            );
        $this->mostrarVista('template.php',$datos);
    }

    public function guardarNuevo(){
        $obj = new Almacenamiento (
                $_POST["idalmacenamiento"],
                $_POST["capacidad"]
                );
                #var_dump($obj->leerUno());exit();
        $respuesta=$obj->nuevo();

        $this->index($respuesta['msg']);
    }
    public function eliminar(){
        if (isset($_REQUEST['idalmacenamiento'])) {
            $obj = new Almacenamiento($_REQUEST['idalmacenamiento']);
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
            'cuerpo'=>'Iniciando edición de: '.$_REQUEST['idalmacenamiento']);
            #var_dump($obj->leerUno());exit();
        $migas = array(
            '?'=>'Inicio',
            '?ctrl=CtrlAlmacenamiento'=>'Listado',
            '#'=>'Editar',
        );
        if (isset($_REQUEST['idalmacenamiento'])) {
            $obj = new Almacenamiento($_REQUEST['idalmacenamiento']);
            $miObj = $obj->leerUno();
            #var_dump($obj->leerUno());exit();
            if (is_null($miObj['data'])) {
                $this->index(array(
                    'titulo'=>'Error',
                    'cuerpo'=>'ID Requerido: '.$_REQUEST['idalmacenamiento']. ' No Existe')
                );
                
            }else{
                $datos1 = array(
                    'almacenamiento'=>$obj
                );
            $datos = array(
                'titulo'=>'Editando Almacenamiento: '. $_REQUEST['idalmacenamiento'],
                'contenido'=>Vista::mostrar('almacenamiento/frmEditar.php',$datos1,true),
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
                'titulo'=>'Editando almacenamiento... DESCONOCIDO',
                'contenido'=>'...El Id a Editar es requerido',
                'menu'=>$menu,
                'migas'=>$migas,
                'msg'=>$msg);
        }
        
        $this->mostrarVista('template.php',$datos);

        
    }
    public function guardarEditar(){
        $obj = new Almacenamiento (
                $_POST["idalmacenamiento"],    #El id que enviamos
                $_POST["capacidad"]
                );
        $respuesta=$obj->editar();
        
        $this->index($respuesta['msg']);
    }
}