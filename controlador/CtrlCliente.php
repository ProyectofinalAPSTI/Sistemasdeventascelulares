<?php
require_once SYS . DIRECTORY_SEPARATOR . 'Controlador.php';
require_once MOD .DIRECTORY_SEPARATOR . 'Cliente.php';
require_once MOD .DIRECTORY_SEPARATOR . 'Carrito.php';
require_once REC . DIRECTORY_SEPARATOR . 'celular.php';

/*
* Clase CtrlCliente
*/
class CtrlCliente extends Controlador {
    
    public function index($msg=null){
        $menu= celular::getMenu();
        
        $obj = new Cliente();
        $resultado = $obj->leer();
        $msg = ($msg==null)?$this->_getMsg():$msg;
        $datos = array(
            'titulo'=>"Clientes",
            'contenido'=>Vista::mostrar('cliente/mostrar.php',$resultado,true),
            'menu'=>$menu,
            'migas'=>$this->_getMigas(),
            'msg'=>$msg
        );
        
        $this->mostrarVista('template.php',$datos);
    }
    public function nuevo(){
        $menu = celular::getMenu();
        
        $obj = new Cliente();
        $datos1=array(
            'encabezado'=>'Nueva Cliente',
            'cliente'=>$obj
            );
        $jsVista = array(
                array(
                'url'=>'recursos/js/jsPais.js'
                )
            );

        $datos = array(
                'titulo'=>'Nueva Cliente',
                'contenido'=>Vista::mostrar('cliente/frmNuevo.php',$datos1,true),
                'menu'=>$menu,
                'migas'=>$this->_getMigas('nuevo'),
                'msg'=>$this->_getMsg('Nuevo...','Ingrese información para nueva Cliente'),
                'js'=>$jsVista
            );
        $this->mostrarVista('template.php',$datos);
    }

    public function guardarNuevo(){
        $obj = new Cliente (
                $_POST["idcliente"],
                $_POST["nombres"],
                $_POST["apellidos"],
                $_POST["dni"],
                $_POST["login"],
                $_POST["pasword"],
                $_POST["estado"],
                $_POST["email"],
                $_POST["direccion"],
                $_POST["telefono"],
                $_POST["perfiles"]
                );
        $respuesta=$obj->nuevo();
        //var_dump($obj);exit();
        $this->mostrarVista('enviarcorreo.php',$obj);
        header("Location: ?");
        exit();
    }
    public function eliminar(){
        if (isset($_REQUEST['id'])) {
            $obj = new Cliente($_REQUEST['id']);
            $resultado=$obj->eliminar();
            $this->index($resultado['msg']);
        } else {
            echo "...El Id a ELIMINAR es requerido";
        }
    }
    public function editar(){
        #Mostramos el Formulario de Editar
        $menu = celular::getMenu();
        $jsVista = array(
                array(
                'url'=>'recursos/js/jsPais.js'
                )
            );
        if (isset($_REQUEST['id'])) {
            $obj = new Cliente($_REQUEST['id']);
            $miObj = $obj->leerUno();
            if (is_null($miObj['data'])) {
                $this->index($this->_getMsg('Error',
                        'ID Requerido: '.$_REQUEST['id']. ' No Existe')
                    );
            }else{
                $datos1 = array(
                        'cliente'=>$obj
                    );

                $datos = array(
                    'titulo'=>'Editando Cliente: '. $_REQUEST['id'],
                    'contenido'=>Vista::mostrar('cliente/frmEditar.php',$datos1,true),
                    'menu'=>$menu,
                    'migas'=>$this->_getMigas('editar'),
                    'msg'=>$this->_getMsg('Editando...','Iniciando edición para: '.$_REQUEST['id']),
                    'js'=>$jsVista
                );
            }
        }else {
            $datos = array(
                'titulo'=>'Editando Cliente... DESCONOCIDO',
                'contenido'=>'...El Id a Editar es requerido',
                'menu'=>$menu,
                'migas'=>$this->_getMigas('editar'),
                'msg'=>$this->_getMsg('Error','No se encontró al ID requerido')
            );
        }
        
        $this->mostrarVista('template.php',$datos);
    }
    public function guardarEditar(){
        $obj = new Cliente (
                $_POST["id"],
                $_POST["nombre"],
                $_POST["apellido"],
                $_POST["dni"],
                $_POST["estado"],
                $_POST["telefono"],
                $_POST["perfiles"]
                );
        $respuesta=$obj->editar();
        $this->index($respuesta['msg']);
    }
    private function _getMigas($operacion=null)     {
        $retorno=null;
        switch ($operacion) {
            case 'nuevo':
                $retorno = array(
                    '?'=>'Inicio',
                    '?ctrl=CtrlCliente'=>'Listado',
                    '#'=>'Nuevo',
                );
                break;
            case 'editar':
                $retorno = array(
                    '?'=>'Inicio',
                    '?ctrl=CtrlCliente'=>'Listado',
                    '#'=>'Editar',
                );
                break;
            
            default:
                $retorno = array(
                    '?'=>'Inicio',
                );
                break;
        }
        return $retorno;
    }
    private function _getMsg($titulo=null,$msg=null){
        return array(
            'titulo'=>$titulo,
            'cuerpo'=>$msg
        );
    }
    public function validar(){
        if (isset($_POST['usuario']) && isset($_POST['clave'])) {
            $obj = new Cliente();
           /* $obj->setLogin($_POST['usuario']);
            $obj->setClave($_POST['clave']);
            */
            $datos=$obj->validar($_POST['usuario'],$_POST['clave'],$_POST['estado']!='1');
            //var_dump($datos);exit();
            if (isset($datos['data']))
                if($datos['data']!=null){
                    $_SESSION['nombre']=$datos['data'][0]['nombres'] .' '. $datos['data'][0]['apellidos'];
                    $_SESSION['email']=$datos['data'][0]['email'];
                    $_SESSION['id']=$datos['data'][0]['idcliente'];
                    $_SESSION['dni']=$datos['data'][0]['dni'];
                    $_SESSION['estado']=$datos['data'][0]['estado']!='1';
                    $_SESSION['perfil']=$datos['data'][0]['idperfil']!='1';
                }
        }
        header("Location: ?");
        exit();
    }
    public function cerrarSesion()     {
        session_destroy();
        header("Location: ?");
        exit();
    }
    public function Confirmar(){
        $obj = new Cliente ();
        $respuesta=$obj->Confirmarcuenta();
        header("Location: ?");
        exit();
    }
    public function perfil($msg=null)     {
        $menu= celular::getMenu();
        $obj = new Cliente();
        $resultado = $obj->leer();
        $msg = ($msg==null)?$this->_getMsg():$msg;
        $datos = array(
            'titulo'=>"Perfil",
            'contenido'=>Vista::mostrar('cliente/perfil.php',$resultado,true),
            'menu'=>$menu,
            'migas'=>$this->_getMigas(),
            'msg'=>$msg
        );
        
        $this->mostrarVista('template.php',$datos);
    }
    public function contra($msg=''){
        $menu= Celular::getMenu();
        $migas = array(
            '?'=>'Inicio',
        );
        //$datosres= $this->getCambiarcontra();
        $datos = array(
            'titulo'=>"",
            'contenido'=>Vista::mostrar ('cliente/recuperar.php','',true),
            'menu'=>$menu,
            'migas'=>$migas,
            'msg'=>$msg
        );
        //var_dump($datos);exit();
        $this->mostrarVista('template.php',$datos);
    }
    /*private function getCambiarcontra(){
        $r = new Cliente();
        $datos = $r->restablecer();
        return $datos;
    }*/
    

}
