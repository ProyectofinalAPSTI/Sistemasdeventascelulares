<br>
<br>
<br>
<div class="container w-50 p-0">
    <form action="" method="post">
        <div class="register-logo">
            <a href="../../index2.html"><b>Registrar</b> :)</a>
        </div>
        <div class="card">
            <div class="card-body register-card-body">
            <p class="login-box-msg">Registrate en nuestra pàgina</p>
            <form action="../../index.html" method="post">
                <div class="row mb-3">
                    <div class="input-group col">
                        <input type="text" class="form-control" name="nombres" placeholder="Nombres" value="" id="inputnombres" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group col">
                        <input type="text" class="form-control" name="apellidos" placeholder="Apellidos" value="" id="inputapellidos" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="input-group col">
                        <input type="text" class="form-control" name="dni" placeholder="Escriba su DNI" value="" id="inputDNI" pattern="[0-9]{8}" minlength="8" maxlength="8" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group col">
                        <input type="email" class="form-control" name="email" placeholder="Email" value="" id="inputEmail" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="input-group col">
                        <input type="text" class="form-control" name="login" placeholder="Usuario" value="" id="inputlogin" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group col">
                        <input type="password" class="form-control" name="pasword"  placeholder="Password" value="" id="inputPassword" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="input-group col">
                        <input type="text" class="form-control" name="direccion" placeholder="Direccion" value="" id="inputDireccion" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group col">
                        <input type="text" class="form-control" name="telefono" placeholder="Telefono" value="" id="inputTelefono" minlength="9" maxlength="9" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="row mb-3">
                    <div class="input-group col">
                        <input hidden type="text" class="form-control" name="perfiles" placeholder="Perfil" value="2" id="inputPerfil">
                    </div>
                    <div class="input-group col">
                        <input hidden type="text" class="form-control" name="id" placeholder="Idcliente" value="" id="inputidcliente">
                    </div>
                    <div class="input-group col">
                        <input hidden type="text" class="form-control" name="estado" placeholder="Estado" value="0" id="inputEstado">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                            <div class="icheck-primary">
                                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                <label for="agreeTerms">
                                I agree to the <a href="#">terms</a>
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="form-control btn btn-primary"><i class="bi bi-save2"></i> Guardar</button> 
                        </div>
                    </div>
                        <!-- /.col -->
                </div>
            </form>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </form>
</div>