<?php
require_once SYS . DIRECTORY_SEPARATOR . 'Controlador.php';
require_once MOD .DIRECTORY_SEPARATOR . 'Tienda.php';
require_once REC . DIRECTORY_SEPARATOR . 'Celular.php';
/*
* Clase CtrlCiudad
*/
class CtrlTienda extends Controlador {
    
    public function index($msg=''){
        $menu= Celular::getMenu();
        $migas = array(
            '?'=>'Inicio',
        );
        
        $obj = new Tienda();
        $resultado = $obj->leer();

        $datos = array(
            'titulo'=>"Tienda",
            'contenido'=>Vista::mostrar ('tienda/mostrar.php',$resultado,true),
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
            'cuerpo'=>'Ingrese información para nueva Tienda');
        $migas = array(
            '?'=>'Inicio',
            '?ctrl=CtrlTienda'=>'Listado',
            '#'=>'Nuevo',
        );
        $obj = new Tienda();
        $datos1=array(
            'encabezado'=>'Nueva Tienda',
            'tienda'=>$obj
            );

        $datos = array(
                'titulo'=>'Nueva Tienda',
                'contenido'=>Vista::mostrar('tienda/frmNuevo.php',$datos1,true),
                'menu'=>$menu,
                'migas'=>$migas,
                'msg'=>$msg
            );
        $this->mostrarVista('template.php',$datos);
    }

    public function guardarNuevo(){
        $obj = new Tienda (
                    $_POST["ruc"],
                    $_POST["nombre"],
                    $_POST["telefono"],
                    $_POST["direccion"]
                );
                #var_dump($obj->leerUno());exit();
        $respuesta=$obj->nuevo();

        $this->index($respuesta['msg']);
    }
    public function eliminar(){
        if (isset($_REQUEST['ruc'])) {
            $obj = new Tienda($_REQUEST['ruc']);
            $resultado=$obj->eliminar();
            $this->index($resultado['msg']);
        } else {
            echo "...El Id a ELIMINAR es requerido";
        }
    }
    public function editar(){
        #Mostramos el Formulario de Editar
        $menu = Celular::getMenu();
        $msg= array(
            'titulo'=>'Editando...',
            'cuerpo'=>'Iniciando edición para: '.$_REQUEST['ruc']);
        $migas = array(
            '?'=>'Inicio',
            '?ctrl=CtrlTienda'=>'Listado',
            '#'=>'Editar',
        );
        if (isset($_REQUEST['ruc'])) {
            $obj = new Tienda($_REQUEST['ruc']);
            $miObj = $obj->leerUno();
            if (is_null($miObj['data'])) {
                $this->index(array(
                    'titulo'=>'Error',
                    'cuerpo'=>'ID Requerido: '.$_REQUEST['ruc']. ' No Existe')
                );
            }else{

                $datos1 = array(
                        'tienda'=>$obj
                    );

                $datos = array(
                    'titulo'=>'Editando Tienda: '. $_REQUEST['ruc'],
                    'contenido'=>Vista::mostrar('tienda/frmEditar.php',$datos1,true),
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
                'titulo'=>'Editando Tienda... DESCONOCIDO',
                'contenido'=>'...El Id a Editar es requerido',
                'menu'=>$menu,
                'migas'=>$migas,
                'msg'=>$msg);
        }
        
        $this->mostrarVista('template.php',$datos);

        
    }
    public function guardarEditar(){
        $obj = new Tienda (
                $_POST["ruc"],
                $_POST["nombre"],
                $_POST["telefono"],
                $_POST["direccion"]
                );
                #var_dump($obj->leerUno());exit();
        $respuesta=$obj->editar();
        
        $this->index($respuesta['msg']);
    }
}
