<?php
session_start();

abstract class Celular {
    static function getMenu(){ # Generamos el MENU de opciones
        return array(
            array(
                'icono'=>'fas fa-th',
                'enlace'=>'CtrlPrincipal',
                'texto'=>'Inicio'
            ),
            array(
                'icono'=>'fas fa-store',
                'enlace'=>'CtrlProducto',
                'texto'=>'Productos'
            ),
            array(
                'icono'=>'fa-solid fa-users',
                'enlace'=>'CtrlCliente',
                'texto'=>'Usuarios'
            ),
            array(
                'icono'=>'fa-solid fa-industry',
                'enlace'=>'CtrlReportes',
                'texto'=>'Reportes'
            ),
            array(
                'icono'=>'fa-solid fa-industry',
                'enlace'=>'CtrlMensaje',
                'texto'=>'Mensajes'
            ),

        );
        switch ($perfil) {
            case '0':   # Admin
                $menu = $menuAdmin;
                break;
            case '1':   # empleado
                $menu = $menuEmpleado;
                break;
            case '2':   # empleado
                $menu = $menuCliente;
                break;
            default:
                $menu = $menuAdmin;
                break;
        }
        return $menu;
    }
    
    static function cssGlobales(){
        return array(
                array(
                    'nombre'=>'Google Font: Source Sans Pro',
                    'url'=>'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback'
                ),
                
                array(
                    'nombre'=>'Font Awesome',
                    'url'=>'plugins/fontawesome-free/css/all.min.css'
                ),
                array(
                    'nombre'=>'Ionicons',
                    'url'=>'https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'
                ),
                array(
                    'nombre'=>'Tempusdominus Bootstrap 4',
                    'url'=>'plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css'
                ),
                array(
                    'nombre'=>'iCheck',
                    'url'=>'plugins/icheck-bootstrap/icheck-bootstrap.min.css'
                ),
                array(
                    'nombre'=>'JQVMap',
                    'url'=>'plugins/jqvmap/jqvmap.min.css'
                ),
                array(
                    'nombre'=>'Theme style',
                    'url'=>'dist/css/adminlte.min.css'
                ),
                array(
                    'nombre'=>'overlayScrollbars',
                    'url'=>'plugins/overlayScrollbars/css/OverlayScrollbars.min.css'
                ),
                array(
                    'nombre'=>'Daterange picker',
                    'url'=>'plugins/daterangepicker/daterangepicker.css'
                ),
                array(
                    'nombre'=>'summernote',
                    'url'=>'plugins/summernote/summernote-bs4.min.css'
                ),
                array(
                    'nombre'=>'jsToast',
                    'url'=>'recursos/css/jquery/jquery-toast.css'
                ),
                array(
                    'nombre'=>'iconfavi',
                    'url'=>'recursos2/img/favicon.ico'
                ),
                array(
                    'nombre'=>'fontgoogle',
                    'url'=>'https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap'
                ),
                array(
                    'nombre'=>'bootstrap44',
                    'url'=>'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css'
                ),
                array(
                    'nombre'=>'cloudflare',
                    'url'=>'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css'
                ),
                array(
                    'nombre'=>'recursos2lib',
                    'url'=>'recursos2/lib/slick/slick.css'
                ),
                array(
                    'nombre'=>'recursos2libslick',
                    'url'=>'recursos2/lib/slick/slick-theme.css'
                ),
                array(
                    'nombre'=>'recursos2style',
                    'url'=>'recursos2/css/style.css'
                )
            );
    }
    
    static function jsGlobales(){
        return array(
            array(
                'url'=>'plugins/jquery/jquery.min.js'
            ),
            array(
                'url'=>'plugins/jquery-ui/jquery-ui.min.js'
            ),
            array(
                'url'=>'plugins/bootstrap/js/bootstrap.bundle.min.js'
            ),
            array(
                'url'=>'dist/js/adminlte.js'
            ),
            array(
                'url'=>'dist/js/demo.js'
            ),
            array(
                'url'=>'dist/js/pages/dashboard3.js'
            ),
            array(
                'url'=>'recursos/js/jq-toast.min.js'
            ),
            array(
                'url'=>'plugins/chart.js/Chart.min.js'
            ),
            array(
                'url'=>'recursos/js/jspdf.debug.js'
            ),
            array(
                'url'=>'https://code.jquery.com/jquery-3.4.1.min.js'
            ),
            array(
                'url'=>'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js'
            ),
            array(
                'url'=>'recursos2/js/main.js'
            ),
            array(
                'url'=>'recursos2/lib/easing/easing.min.js'
            ),
            array(
                'url'=>'recursos2/lib/slick/slick.min.js'
            ),
        );
    }
}
