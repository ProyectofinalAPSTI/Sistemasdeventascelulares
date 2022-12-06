<style>

.reg {
  cursor: pointer;
  border: 0;
  border-radius: 4px;
  font-weight: 600;
  margin: 0 10px;
  width: 500px;
  padding: 10px 10px;
  box-shadow: 0 0 20px rgba(104, 85, 224, 0.2);
  transition: 0.4s;
  color: white;
  background-color: rgba(255, 111, 97, 1);
}

.log {
  cursor: pointer;
  border: 0;
  border-radius: 4px;
  font-weight: 600;
  margin: 0 10px;
  width: 500px;
  padding: 10px 10px;
  box-shadow: 0 0 20px rgba(104, 85, 224, 0.2);
  transition: 0.4s;
  color: white !important;
  background-color: rgba(255, 111, 97, 1) ;
}
.reg:hover {
  color: white;
  width:;
  box-shadow: 0 0 20px rgba(104, 85, 224, 0.6);
  background-color: rgba(104, 85, 224, 1);
}
.log:hover {
  color: white;
  width:;
  box-shadow: 0 0 20px rgba(104, 85, 224, 0.6);
  background-color: rgba(104, 85, 224, 1);
}

.contenedor0{
	display: flex;
	justify-content: center;
	align-items: center;
	min-height: 100vh;
	font-family: 'Jost', sans-serif;
}

.contenedor{
	width: 500px;
	height: 590px;
	background: linear-gradient(to bottom, #0f0c29, #302b63, #24243e);
	overflow: hidden;
	border-radius: 10px;
	box-shadow: 5px 20px 50px #000;
}
#chk{
	display: none;
}
.signup{
	position: relative;
	width:100%;
	height: 100%;
}
.label1{
	color: #fff;
	font-size: 2.3em;
	justify-content: center;
	display: flex;
	margin: 60px;
	font-weight: bold;
	cursor: pointer;
	transition: .5s ease-in-out;
}
.input1{
	width: 80%;
	height: 40px;
	background: #e0dede;
	justify-content: center;
	display: flex;
	margin: 5px auto;
	padding: 10px;
	border: none;
	outline: none;
	border-radius: 5px;
}
.boton{
	width: 60%;
	height: 50px;
	margin: 10px auto;
	justify-content: center;
	display: block;
	color: #fff;
	background: #573b8a;
	font-size: 1em;
	font-weight: bold;
	margin-top: 20px;
	outline: none;
	border: none;
	border-radius: 5px;
	transition: .2s ease-in;
	cursor: pointer;
}
.boton:hover{
	background: #6d44b8;
}
.login1{
	height: 500px;
	background: #eee;
	border-radius: 60% / 10%;
	transform: translateY(-190px);
	transition: .8s ease-in-out;
}
.login1 .label1{
	color: #573b8a;
	transform: scale(.6);
}

#chk:checked ~ .login1{
	transform: translateY(-590px);
}
#chk:checked ~ .login1 .label1{
	transform: scale(1);	
}
#chk:checked ~ .signup .label1{
	transform: scale(.6);
}
</style>

<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="recursos/images/loading-13.gif" alt="iconcarga" height="60" width="90">
</div>
  <div class="wrapper sticky-top">
        <!-- Nav Bar Start -->
        <div class="nav main-header"> 
                <div class="container-fluid">
                    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                        <a href=".?" class="navbar-brand">MENU</a>
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                            <div class="navbar-nav mr-auto">
                                <?php if (isset($_SESSION['perfil'])) 
                                if($_SESSION['perfil']!='1') { ?>
                                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                                <?php }?>
                                <a href=".?" class="nav-item nav-link">Inicio</a>
                                <a href="?ctrl=CtrlProducto&accion=getCatalogo" class="nav-item nav-link">Productos</a>
                                <a href="?ctrl=CtrlContacto" class="nav-item nav-link">Contactos</a>
                                <a href="?ctrl=CtrlAcerca"  class="nav-item nav-link">Acerca De..</a>
                            </div>
                            
                        </div>
                    </nav>
                </div>
        </div>
        <!-- Nav Bar End -->      

        <!-- Bottom Bar Start -->
        <div class="bottom-bar main-header">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <div class="logo">
                            <a href=".?">
                                <img src="recursos/images/logosmart.png" alt="Logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-5">
                    </div>
                    <?php 
                      if (isset($_SESSION['nombre'])){ 
                          ?>
                            <div>
                              <a class="log" data-toggle="dropdown" href="#" title=" <?=$_SESSION['nombre'];?>">
                              <i class="far fa-user"></i>&nbsp; <?=$_SESSION['nombre'];?>
                              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                  <a href="#" class="dropdown-item">
                                    <!-- Message Start -->
                                    <div class="media">
                                      <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                                      <div class="media-body">
                                        <h3 class="dropdown-item-title">
                                          <?= (isset($_SESSION['nombre']))?$_SESSION['nombre']:'Visitante';?>
                                          <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                        </h3>
                                        <p class="text-sm">
                                          <i class="far fa-envelope"></i> : <?= (isset($_SESSION['email']))?$_SESSION['email']:'-';?>
                                        </p>
                                        <p class="text-sm">
                                          <i class="far fa-clock mr-1"></i> Hace 4 hrs.
                                        </p>
                                      </div>
                                    </div>
                                    <!-- Message End -->
                                  </a>
                                  <div class="dropdown-divider"></div>
                                    <a href="?ctrl=CtrlCliente&accion=perfil" 
                                      class="dropdown-item dropdown-footer">Perfil...</a>
                                  <div class="dropdown-divider"></div>
                                  <a href="?ctrl=CtrlUsuario&accion=cerrarSesion" class="dropdown-item dropdown-footer">Cerrar Sesión</a>
                                </div>
                              </li>
                            </div>
                            <?php
                                } else {
                                  ?>
                                <div>
                                  <a class="log"
                                      data-toggle="modal" data-target="#modal-login" title="Ingresar ...">
                                      <i class="far fa-user"></i> &nbsp; Iniciar Sesión</a>
                                </div>
                                  <?php
                                }
                                $cantProductos =isset($_SESSION['carrito'])?$_SESSION['carrito']->getNroProductos():0;
                              ?>
                              &nbsp; &nbsp;
                                <div>
                                  <a class="reg" href="?ctrl=CtrlCarrito&accion=mostrar"
                                    title="Tiene <?= $cantProductos?> Elementos en el Carrito">
                                      <span class="badge bg-warning"><?= $cantProductos?></span>
                                        <i class="fa fa-cart-plus"></i> &nbsp; Carrito</a>
                                </div>
                            </a>
                      </div>
                </div>
            </div>
        </div>
        <!-- Bottom Bar End -->  
        
        <div class="modal fade" id="modal-login">
            <div class="contenedor0">
                <div class="contenedor">  	
                  <a href=".?" type="button" style="margin: 0 auto">X</a> 
                  <input class="input1"  type="checkbox" id="chk" aria-hidden="true">
                    <div class="signup">
                      <form action="?ctrl=CtrlCliente&accion=guardarNuevo" method="post">
                                  <label class="label1" for="chk" aria-hidden="true">Registrate</label>
                                      <div class="row mb-3">
                                          <div class="input-group col">
                                              <input class="input1" type="text" name="nombres" placeholder="Nombres" value="" id="inputnombres" required>
                                          </div>
                                          <div class="input-group col">
                                              <input class="input1" type="text" name="apellidos" placeholder="Apellidos" value="" id="inputapellidos" required>
                                          </div>
                                      </div>
                                      <div class="row mb-3">
                                          <div class="input-group col">
                                              <input class="input1" type="text" name="dni" placeholder="Escriba su DNI" value="" id="inputDNI" pattern="[0-9]{8}" minlength="8" maxlength="8" required>
                                          </div>
                                          <div class="input-group col">
                                              <input class="input1" type="email" name="email" placeholder="Email" value="" id="inputEmail" required>
                                          </div>
                                      </div>
                                      <div class="row mb-3">
                                          <div class="input-group col">
                                              <input class="input1" type="text" name="login" placeholder="Usuario" value="" id="inputlogin" required>
                                          </div>
                                          <div class="input-group col">
                                              <input class="input1" type="password" name="pasword"  placeholder="Password" value="" id="inputPassword" required>
                                          </div>
                                      </div>
                                      <div class="row mb-3">
                                          <div class="input-group col">
                                              <input class="input1" type="text"  name="direccion" placeholder="Direccion" value="" id="inputDireccion" required>
                                          </div>
                                          <div class="input-group col">
                                              <input class="input1" type="text" name="telefono" placeholder="Telefono" value="" id="inputTelefono" minlength="9" maxlength="9" required>
                                          </div>
                                      </div>
                                      <div class="row mb-3">
                                          <div class="input-group col">
                                              <input class="input1" hidden type="text" name="perfiles" placeholder="Perfil" value="2" id="inputPerfil">
                                          </div>
                                          <div class="input-group col">
                                              <input class="input1" hidden type="text" name="id" placeholder="Idcliente" value="" id="inputidcliente">
                                          </div>
                                          <div class="input-group col">
                                              <input class="input1" hidden type="text" name="estado" placeholder="Estado" value="0" id="inputEstado">
                                          </div>
                                      </div>
                                  <button class="boton">Guardar</button>
                      </form>
                    </div>

                    <div class="login1">
                          <form action="?ctrl=CtrlCliente&accion=validar" method="post">
                            <label class="label1" for="chk" aria-hidden="true">Iniciar Sesion</label>
                            <input class="input1" type="text" name="usuario" placeholder="Usuario" required="">
                            <input class="input1" type="password" name="clave" placeholder="Contraseña" required="">
                            <button class="boton">Iniciar Session</button>
                          </form>
                    </div>
                    
              </div>
            </div>
        </div>
  </div>
<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="recursos2/lib/easing/easing.min.js"></script>
<script src="recursos2/lib/slick/slick.min.js"></script>
<!-- Template Javascript -->
<script src="recursos2/js/main.js"></script>