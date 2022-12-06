<?php
require_once SYS . DIRECTORY_SEPARATOR . 'Controlador.php';
require_once MOD .DIRECTORY_SEPARATOR . 'Puntoventa.php';
require_once REC . DIRECTORY_SEPARATOR . 'Celular.php';
/*
* Clase CtrlCiudad
*/
class CtrlPuntoventa extends Controlador {
    
    public function index($msg=''){
        $menu= Celular::getMenu();
        $migas = array(
            '?'=>'Inicio',
        );

        $obj = new Puntoventa();
        $resultado = $obj->leer();

        $datos = array(
            'titulo'=>"Punto de Venta",
            'contenido'=>Vista::mostrar ('puntoventa/mostrar.php',$resultado,true),
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
            'cuerpo'=>'Ingrese información para nuevo Producto');
        $migas = array(
            '?'=>'Inicio',
            '?ctrl=CtrlPuntoventa'=>'Listado',
            '#'=>'Nuevo',
        );
        $obj = new Puntoventa();
        $datos1=array(
            'encabezado'=>'Nueva Puntoventa',
            'puntoventa'=>$obj
            );

        $datos = array(
                'titulo'=>'Nueva Puntoventa',
                'contenido'=>Vista::mostrar('puntoventa/frmNuevo.php',$datos1,true),
                'menu'=>$menu,
                'migas'=>$migas,
                'msg'=>$msg
            );
        $this->mostrarVista('template.php',$datos);
    }

    public function guardarNuevo(){
        $obj = new Puntoventa (
                    $_POST["idpuntoventa"],
                    $_POST["almacenamiento"],
                    $_POST["ram"],
                    $_POST["stock"]
                );
                #var_dump($obj->leerUno());exit();
        $respuesta=$obj->nuevo();

        $this->index($respuesta['msg']);
    }
    public function eliminar(){
        if (isset($_REQUEST['idpuntoventa'])) {
            $obj = new Puntoventa($_REQUEST['idpuntoventa']);
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
            'cuerpo'=>'Iniciando edición para: '.$_REQUEST['idpuntoventa']);
        $migas = array(
            '?'=>'Inicio',
            '?ctrl=CtrlPuntoventa'=>'Listado',
            '#'=>'Editar',
        );
        if (isset($_REQUEST['idpuntoventa'])) {
            $obj = new Puntoventa($_REQUEST['idpuntoventa']);
            $miObj = $obj->leerUno();
            if (is_null($miObj['data'])) {
                $this->index(array(
                    'titulo'=>'Error',
                    'cuerpo'=>'ID Requerido: '.$_REQUEST['idpuntoventa']. ' No Existe')
                );
            }else{

                $datos1 = array(
                        'puntoventa'=>$obj
                    );

                $datos = array(
                    'titulo'=>'Editando puntoventa: '. $_REQUEST['idpuntoventa'],
                    'contenido'=>Vista::mostrar('puntoventa/frmEditar.php',$datos1,true),
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
                'titulo'=>'Editando puntoventa... DESCONOCIDO',
                'contenido'=>'...El Id a Editar es requerido',
                'menu'=>$menu,
                'migas'=>$migas,
                'msg'=>$msg);
        }
        
        $this->mostrarVista('template.php',$datos);

        
    }
    public function guardarEditar(){
        $obj = new Puntoventa (
                $_POST["idpuntoventa"],
                $_POST["nombre"],
                $_POST["Marca"],
                $_POST["Imei"],
                $_POST["descripcion"],
                $_POST["almacenamiento"],
                $_POST["ram"],
                $_POST["preciocompra"],
                $_POST["precioventa"],
                $_POST["stock"]
                );
                #var_dump($obj->leerUno());exit();
        $respuesta=$obj->editar();
        
        $this->index($respuesta['msg']);
    }
}
