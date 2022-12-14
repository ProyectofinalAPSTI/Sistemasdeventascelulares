<?php
require_once SYS . DIRECTORY_SEPARATOR . 'Controlador.php';
require_once MOD .DIRECTORY_SEPARATOR . 'Producto.php';
require_once MOD .DIRECTORY_SEPARATOR . 'Boleta.php';
require_once MOD .DIRECTORY_SEPARATOR . 'Carrito.php';
require_once REC . DIRECTORY_SEPARATOR . 'celular.php';
/*
* Clase CtrlBoleta
*/
class CtrlBoleta extends Controlador {
    
    public function index($msg=array('titulo'=>'','cuerpo'=>'')){
        if(!isset($_SESSION['nombre'])){
            header("Location: ?");
            exit();
        }
        $menu= celular::getMenu();
        $migas = array(
            '?'=>'Inicio',
            '#'=>'Listado'
        );

        $obj = new Pais();
        $resultado = $obj->leer();
        // var_dump($resultado['data']);exit();
        $datos = array(
            'titulo'=>"Paises",
            'contenido'=>Vista::mostrar('pais/mostrar.php',$resultado,true),
            'menu'=>$menu,
            'migas'=>$migas,
            'msg'=>$msg,
            'data'=>$resultado['data']
        );
        
        $this->mostrarVista('template.php',$datos);
    }
    /*public function nuevo(){
        if(!isset($_SESSION['nombre'])){
            header("Location: ?");
            exit();
        }
        echo Vista::mostrar('pais/frmNuevo.php');
    }
    */

    public function guardarNuevo() {
        $obj = new Producto();
            
        $data=$obj->getProductosCarrito();
        $total=0;
        $datosDetalle=null;
        //var_dump($data);exit(); 
        foreach ($data['data'] as $p) {
            $cant = $_SESSION['carrito']->getCantidad($p['idproducto']);
            $pu = $p['pu'];
            $subTotal = $cant * $pu;
            $datosDetalle[]=array(
                'cant'=>$cant,
                'pu'=>$pu,
                'subtotal'=>$subTotal,
                'idproducto'=>$p['idproducto']
                );
            $total += $cant * $pu;
        }
        $obj = new Boleta();
        $obj->nuevo($total, $_SESSION['id'],$datosDetalle);
        //var_dump($_SESSION);exit(); 
        $this->registrarCompra();
    }
    
    public function registrarCompra(){
        $obj = new Boleta();
        $data=$obj->getUltimaBoletaCliente($_SESSION['id']);

        $menu= celular::getMenu();
        $migas = array(
            '?'=>'Inicio',
        );
        // $datosGraf= $this->getGraficoModelosXMarcas();
        unset($_SESSION['carrito']);
        
        $datos = array(
            'titulo'=>"Registro de Compra realizada",
            'contenido'=>Vista::mostrar('boleta/registroCompra.php',$data,true),
            'menu'=>$menu,
            'migas'=>$migas,
            'msg'=>array(
                    'titulo'=>'',
                    'cuerpo'=>''
            ),
            'data'=>null,
            'grafico'=>null
        );
        
        $this->mostrarVista('template.php',$datos);

    }

    public function imprimir(){
        $obj = new Boleta();
        $data=$obj->getUltimaBoletaDetalleCliente($_SESSION['id']);
        Vista::mostrar('boleta/boleta.php',$data);
    }

    /* public function guardarNuevo(){
        if(!isset($_SESSION['nombre'])){
            header("Location: ?");
            exit();
        }
        $obj = new Pais (
                $_POST["id"],
                $_POST["pais"],
                );
        $respuesta=$obj->nuevo();

        $this->index($respuesta['msg']);
    }
    
    public function eliminar(){
        if(!isset($_SESSION['nombre'])){
            header("Location: ?");
            exit();
        }
        if (isset($_REQUEST['id'])) {
            $obj = new Pais($_REQUEST['id']);
            $resultado=$obj->eliminar();
            // var_dump ($resultado);
            $this->index($resultado['msg']);
        } else {
            echo "...El Id a ELIMINAR es requerido";
        }
    }
    public function editar(){
        if(!isset($_SESSION['nombre'])){
            header("Location: ?");
            exit();
        }
        #Mostramos el Formulario de Editar
        $datos=null;
        $menu = celular::getMenu();
        $msg= array(
            'titulo'=>'Editando...',
            'cuerpo'=>'Iniciando edici??n de: '.$_REQUEST['id']);
        $migas = array(
            '?'=>'Inicio',
            '?ctrl=CtrlPais'=>'Listado',
            '#'=>'Editar',
        );
        if (isset($_REQUEST['id'])) {
            $obj = new Pais($_REQUEST['id']);
            $miObj = $obj->leerUno();
            $datos1 = array(
                    'pais'=>$obj
                );
           echo Vista::mostrar('pais/frmEditar.php',$datos1);
            }
        
    }
    public function guardarEditar(){
        if(!isset($_SESSION['nombre'])){
            header("Location: ?");
            exit();
        }
        $obj = new Pais (
                $_POST["id"],    #El id que enviamos
                $_POST["pais"]
                );
        $respuesta=$obj->editar();
        
        $this->index($respuesta['msg']);
    }
    public function getPaisesSelect(){
        $obj = new Pais();
        $datos = $obj->leer()['data'];
        $html = '<option value="0">Seleccionar...</option>';
        foreach ($datos as $d) {
            $html .= '<option value="'.$d['idpais'].'">'.$d['nombre'].'</option>';
        }
        echo $html;
    }
    */
}