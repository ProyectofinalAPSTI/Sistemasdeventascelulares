<?php
require_once SYS . DIRECTORY_SEPARATOR . 'Controlador.php';
require_once MOD .DIRECTORY_SEPARATOR . 'Mensaje.php';
require_once REC . DIRECTORY_SEPARATOR . 'Celular.php';
/*
* Clase CtrlCiudad
*/
class CtrlMensaje extends Controlador {
    
    public function index($msg=''){
        $menu= Celular::getMenu();
        $migas = array(
            '?'=>'Inicio',
        );
        $obj = new Mensaje();
        $resultado = $obj->leer();
        $datos = array(
            'titulo'=>"Mensaje",
            'contenido'=>Vista::mostrar ('contacto/Mensajes.php',$resultado,true),
            'menu'=>$menu,
            'migas'=>$migas,
            'msg'=>$msg
        );
        #var_dump($obj->leerUno());exit();
        $this->mostrarVista('template.php',$datos);
    }
    public function guardarNuevo(){
        $obj = new Mensaje (
                    $_POST["idmensaje"],
                    $_POST["nombre"],
                    $_POST["email"],
                    $_POST["tema"],
                    $_POST["msm"]
                );
                #var_dump($obj->leerUno());exit();
        $respuesta=$obj->nuevo();
        header("Location: ?");
        exit();

    }
    public function eliminar(){
        if (isset($_REQUEST['idmensaje'])) {
            $obj = new Mensaje($_REQUEST['idmensaje']);
            $resultado=$obj->eliminar();
            $this->index($resultado['msg']);
        } else {
            echo "...El Id a ELIMINAR es requerido";
        }
    }
}
