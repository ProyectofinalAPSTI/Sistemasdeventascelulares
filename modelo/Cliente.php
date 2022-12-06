<?php
require_once SYS . DIRECTORY_SEPARATOR . 'Modelo.php';
require_once PER . DIRECTORY_SEPARATOR . "BaseDeDatos.php";
require_once "perfiles.php";
class Cliente extends Modelo {
    private $_id;
    private $_nombre;
    private $_apellido;
    private $_dni;
    private $_login;
    private $_pasword;
    private $_estado;
    private $_email;
    private $_direccion;
    private $_telefono;
    private $_perfiles;
    private $_tabla="clientes";
    private $_vista="v_clientes1";
    private $_bd;

    public function __construct($id=null, $nombre=null,$apellido=null,
                        $dni=null, $login=null, $pasword=null, $estado=null, $email=null, $direccion=null,  $telefono=null, $perfiles=null){
        $this->_bd = new BaseDeDatos(new MySQL());
        $this->_id = $id;
        $this->_nombre= $nombre;
        $this->_apellido= $apellido;
        $this->_dni= $dni;
        $this->_login= $login;
        $this->_pasword= $pasword;
        $this->_estado= $estado;
        $this->_email= $email;
        $this->_direccion= $direccion;
        $this->_telefono= $telefono;
        $this->_perfiles= new Perfiles($perfiles);
    }
    public function setperfiles (Perfiles $p){
        $this->_perfiles= $p;
    }
    public function getperfiles(){
        return $this->_perfiles;
    }
    public function leer(){
        $sql ="SELECT * FROM ". $this->_vista .";";
        return $this->_bd->ejecutar($sql);
    }
     public function leerUno(){
        $sql= "SELECT * FROM ". $this->_vista 
            . " WHERE idcliente=".$this->_id;
        
        $datos= $this->_bd->ejecutar($sql);  
        // var_dump($datos);exit();
        if (is_array($datos['data'])){
            $this->_id = $datos['data'][0]["idcliente"];
            $this->_nombre = $datos['data'][0]["nombres"];
            $this->_apellido = $datos['data'][0]["apellidos"];
            $this->_dni = $datos['data'][0]["dni"];
            $this->_login = $datos['data'][0]["login"];
            $this->_pasword = $datos['data'][0]["pasword"];
            $this->_estado = $datos['data'][0]["estado"];
            $this->_email = $datos['data'][0]["email"];
            $this->_direccion = $datos['data'][0]["direccion"];
            $this->_telefono = $datos['data'][0]["telefono"];
            $this->_perfiles = new Perfiles ($datos['data'][0]["perfil"]);
        }
        return $datos; 
    }

    public function eliminar(){
        $sql= "Delete FROM ". $this->_tabla 
            . " WHERE idcliente=".$this->_id;
        return $this->_bd->ejecutar($sql);    
    }
    public function editar(){
        $sql ="UPDATE ". $this->_tabla 
            . " SET nombres='".$this->_nombre."',"
            . " apellidos='".$this->_apellido ."',"
            . " dni='".$this->_dni ."',"
            . " telefono='".$this->_telefono ."',"
            . " idperfil=".$this->_perfiles->getidperfil() 
            ." WHERE idcliente=".$this->_id;
        //var_dump($sql); exit();
        return $this->_bd->ejecutar($sql);
    }

    public function nuevo(){
        $sql = "INSERT INTO ". $this->_tabla 
            ." (idcliente, nombres, apellidos, dni, login, pasword, estado, email, direccion, telefono, idperfil) VALUES (
                '".''."','"
                . $this->_nombre ."','"
                . $this->_apellido ."','"
                . $this->_dni ."','"
                . $this->_login ."','"
                . $this->_pasword ."','"
                . $this->_estado ."','"
                . $this->_email ."','"
                . $this->_direccion ."','"
                . $this->_telefono ."',"
                . $this->_perfiles->getidperfil()
            .");";
        //var_dump($sql); exit();
        return $this->_bd->ejecutar($sql);
    }
    public function getId(){
        return $this->_id;
    }
    public function getNombre(){
        return $this->_nombre;
    }
    public function getApellido(){
        return $this->_apellido;
    }
    public function getDni(){
        return $this->_dni;
    }
    public function getEstado(){
        return $this->_estado;
    }
    public function getEmail(){
        return $this->_email;
    }
    public function getTelefono(){
        return $this->_telefono;
    }
    public function validar($login,$clave){
        $sql= "SELECT * FROM ". $this->_tabla 
            . " WHERE login='".$login ."' and pasword='".$clave ."'and estado=1";
        return $this->_bd->ejecutar($sql);
        //var_dump($sql);exit();
    }
    public function Confirmarcuenta(){
        $sql = "UPDATE  ".$this->_tabla. " SET estado = 1";
        //var_dump($sql);exit();
        return $this->_bd->ejecutar($sql);
        header("Location: ?");
        exit();
    }
    /* 
    public function restablecer(){
        $logitudPass = 4;
        $miPassword  = substr( md5(microtime()), 1, $logitudPass);
        $pasword       = $miPassword;

        $sql= "SELECT * FROM ". $this->_tabla ." WHERE email='mabelleonjanampa45@gmail.com'";
        $datos = $this->_bd->ejecutar($sql);
        //var_dump($sql);exit();
        return $this->getArray($datos['data']); 
        var_dump($sql);exit();
    } 
    -->
    
    private function getArray($datos){
        if($datos ==0){ 
            echo "Error";
        } else { 
            $updateClave= "UPDATE cliente SET pasword='123456789' WHERE email='mabelleonjanampa45@gmail.com'";
            return $datos; 
            //var_dump($updateClave);exit();

            $destinatario = 'mabelleonjanampa45@gmail.com'; 
            $asunto       = "Recuperando Clave - WebDeveloper";
            $cuerpo = '
                <!DOCTYPE html>
                <html lang="es">
                <head>
                <title>Recuperar Clave de Usuario</title>';
            $cuerpo .= ' 
            <style>
                * {
                    margin: 0;
                    padding: 0;
                    box-sizing: border-box;
                }
                body {
                    font-family: "Roboto", sans-serif;
                    font-size: 16px;
                    font-weight: 300;
                    color: #888;
                    background-color:rgba(230, 225, 225, 0.5);
                    line-height: 30px;
                    text-align: center;
                }
                .contenedor{
                    width: 80%;
                    min-height:auto;
                    text-align: center;
                    margin: 0 auto;
                    background: #ececec;
                    border-top: 3px solid #E64A19;
                }
                .btnlink{
                    padding:15px 30px;
                    text-align:center;
                    background-color:#cecece;
                    color: crimson !important;
                    font-weight: 600;
                    text-decoration: blue;
                }
                .btnlink:hover{
                    color: #fff !important;
                }
                .imgBanner{
                    width:100%;
                    margin-left: auto;
                    margin-right: auto;
                    display: block;
                    padding:0px;
                }
                .misection{
                    color: #34495e;
                    margin: 4% 10% 2%;
                    text-align: center;
                    font-family: sans-serif;
                }
                .mt-5{
                    margin-top:50px;
                }
                .mb-5{
                    margin-bottom:50px;
                }
                </style>
            ';

            $cuerpo .= '
            </head>
            <body>
                <div class="contenedor">
                <img class="imgBanner" src="https://permutasalcuadrado.com/Como-recuperar-clave-de-usuario-usando-PHP-y-MYSQL/assets/images/banner2.png">
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                <table style="max-width: 600px; padding: 10px; margin:0 auto; border-collapse: collapse;">
                <tr>
                    <td style="padding: 0">
                        <img style="padding: 0; display: block" src="https://permutasalcuadrado.com/Como-recuperar-clave-de-usuario-usando-PHP-y-MYSQL/assets/images/banner.jpg" width="100%">
                    </td>
                </tr>
                
                <tr>
                    <td style="background-color: #ffffff;">
                        <div class="misection">
                            <h2 style="color: red; margin: 0 0 7px">Hola, '.$dataConsulta['fullName'].'</h2>
                            <p style="margin: 2px; font-size: 18px">te hemos creado una nueva clave temporal para que puedas iniciar sesión, la clave temporal es: <strong>'.$clave.'</strong> </p>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                            <a href="https://permutasalcuadrado.com/Como-recuperar-clave-de-usuario-usando-PHP-y-MYSQL/" class="btnlink">Iniciar Sesión </a>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                            <img style="padding: 0;" src="https://permutasalcuadrado.com/Como-recuperar-clave-de-usuario-usando-PHP-y-MYSQL/assets/images/welltow.gif" width="50%">
                            <p>&nbsp;</p>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="background-color: #ffffff;">
                    <div class="misection">
                        <h2 style="color: red; margin: 0 0 7px">Visitar Canal de Youtube</h2>
                        <img style="padding: 0; display: block" src="https://permutasalcuadrado.com/Como-recuperar-clave-de-usuario-usando-PHP-y-MYSQL/assets/images/canal.png" width="100%">
                    </div>
                    
                    <div class="mb-5 misection">  
                    <p>&nbsp;</p>
                        <a href="https://www.youtube.com/channel/UCodSpPp_r_QnYIQYCjlyVGA" class="btnlink">Visitar Canal </a>
                    </div>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 0;">
                        <img style="padding: 0; display: block" src="https://permutasalcuadrado.com/Como-recuperar-clave-de-usuario-usando-PHP-y-MYSQL/assets/images/footer.png" width="100%">
                    </td>
                </tr>
            </table>'; 

            $cuerpo .= '
                </div>
                </body>
            </html>';
                
                $headers  = "MIME-Version: 1.0\r\n"; 
                $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
                $headers .= "From: WebDeveloper\r\n"; 
                $headers .= "Reply-To: "; 
                $headers .= "Return-path:"; 
                $headers .= "Cc:"; 
                $headers .= "Bcc:"; 
                (mail($destinatario,$asunto,$cuerpo,$headers));

                header("Location:index.php?email=1");
                exit();
                }
        }*/

}
