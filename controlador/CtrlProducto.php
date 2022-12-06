<?php
require_once SYS . DIRECTORY_SEPARATOR . 'Controlador.php';
require_once MOD .DIRECTORY_SEPARATOR . 'Producto.php';
require_once MOD .DIRECTORY_SEPARATOR . 'Carrito.php';
require_once REC . DIRECTORY_SEPARATOR . 'Celular.php';
/*
* Clase CtrlCiudad
*/
class CtrlProducto extends Controlador {
    
    public function index($msg=''){
        $menu= Celular::getMenu();
        $migas = array(
            '?'=>'Inicio',
        );
        
        $obj = new Producto();
        $resultado = $obj->leer();

        $datos = array(
            'titulo'=>"Productos",
            'contenido'=>Vista::mostrar ('producto/mostrar.php',$resultado,true),
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
            '?ctrl=CtrlProducto'=>'Listado',
            '#'=>'Nuevo',
        );
        $obj = new Producto();
        $datos1=array(
            'encabezado'=>'Nueva Producto',
            'producto'=>$obj
            );

        $datos = array(
                'titulo'=>'Nueva Producto',
                'contenido'=>Vista::mostrar('producto/frmNuevo.php',$datos1,true),
                'menu'=>$menu,
                'migas'=>$migas,
                'msg'=>$msg
            );
        $this->mostrarVista('template.php',$datos);
    }

    public function guardarNuevo(){
        $obj = new Producto (
                    $_POST["idproducto"],
                    $_POST["nombre"],
                    $_POST["marcas"],
                    $_POST["Imei"],
                    $_POST["descripcion"],
                    $_POST["almacenamiento"],
                    $_POST["ram"],
                    $_POST["preciocompra"],
                    $_POST["precioventa"],
                    $_POST["stock"]
                );
                #var_dump($obj->leerUno());exit();
        $respuesta=$obj->nuevo();

        $this->index($respuesta['msg']);
    }
    public function eliminar(){
        if (isset($_REQUEST['idproducto'])) {
            $obj = new Producto($_REQUEST['idproducto']);
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
            'cuerpo'=>'Iniciando edición para: '.$_REQUEST['idproducto']);
        $migas = array(
            '?'=>'Inicio',
            '?ctrl=CtrlProducto'=>'Listado',
            '#'=>'Editar',
        );
        if (isset($_REQUEST['idproducto'])) {
            $obj = new producto($_REQUEST['idproducto']);
            $miObj = $obj->leerUno();
            if (is_null($miObj['data'])) {
                $this->index(array(
                    'titulo'=>'Error',
                    'cuerpo'=>'ID Requerido: '.$_REQUEST['idproducto']. ' No Existe')
                );
            }else{
                $datos1 = array(
                        'producto'=>$obj
                    );
                $datos = array(
                    'titulo'=>'Editando Producto: '. $_REQUEST['idproducto'],
                    'contenido'=>Vista::mostrar('producto/frmEditar.php',$datos1,true),
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
                'titulo'=>'Editando Producto... DESCONOCIDO',
                'contenido'=>'...El Id a Editar es requerido',
                'menu'=>$menu,
                'migas'=>$migas,
                'msg'=>$msg);
        }
        
        $this->mostrarVista('template.php',$datos);

        
    }
    public function guardarEditar(){
        $obj = new Producto (
                $_POST["idproducto"],
                $_POST["nombre"],
                $_POST["marcas"],
                $_POST["descripcion"],
                $_POST["almacenamiento"],
                $_POST["ram"],
                $_POST["pu"],
                $_POST["stock"]
                );
                //var_dump($obj->leerUno());exit();
        $respuesta=$obj->editar();
        
        $this->index($respuesta['msg']);
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
            'contenido'=>Vista::mostrar('producto/catalogo.php',$resultado,true),
            'menu'=>$menu,
            'migas'=>$migas,
            'msg'=>$msg
        );
        
        $this->mostrarVista('template.php',$datos);
    }
    public function verDetalles(){
        $menu= Celular::getMenu();
        $migas = array(
            '?'=>'Inicio',
            '?ctrl=CtrlProducto&accion=getCatalogo'=>'Catálogo',
            '#'=>'Detalles',
        );
        $id = $_GET['id'];
        $jsVista = array(
                array(
                'url'=>'recursos/js/jsImagenes.js'
                )
            );

        $obj = new Producto($id);
        $resultado = $obj->getDetalles();

        $msg=array('titulo'=>'','cuerpo'=>'');
        $datos = array(
            'titulo'=>"Detalles",
            'contenido'=>Vista::mostrar('producto/detalles.php',$resultado,true),
            'menu'=>$menu,
            'migas'=>$migas,
            'msg'=>$msg,
            'js'=>$jsVista
        );
        
        $this->mostrarVista('template.php',$datos);
    }
}
