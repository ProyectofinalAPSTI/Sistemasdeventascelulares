
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href=".?">Inicio</a></li>
                    <li class="breadcrumb-item active">Contacto</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Contact Start -->
        <div class="contact">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="contact-info">
                            <h2>Nuestra Oficina</h2>
                            <h3><i class="fa fa-map-marker"></i>132 Oficina, Lima, Peru </h3>
                            <h3><i class="fa fa-envelope"></i>smarthphone@gmail.com</h3>
                            <h3><i class="fa fa-phone"></i>+51 946-981-358</h3>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="contact-info">
                            <h2>Nuestra Tienda</h2>
                            <h3><i class="fa fa-map-marker"></i>Calle jurin 24, Moquegua , Peru</h3>
                            <h3><i class="fa fa-envelope"></i>smarthphone@gmail.com</h3>
                            <h3><i class="fa fa-phone"></i>+51 945-960-745</h3>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="contact-form">
                            <form action="?ctrl=CtrlMensaje&accion=guardarNuevo" method="post">
                                <div class="row">
                                    <?php if (isset($_SESSION['nombre'])){ ?>
                                    <div class="col-md-6">
                                        <input type="text" name="nombre" class="form-control" value="<?=$_SESSION['nombre']?>" placeholder="Tu nombre" hidden/>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="email" name="email" class="form-control" value="<?=$_SESSION['email']?>"  placeholder="Tu correo" hidden/>
                                    </div>
                                    <?php }else { ?>
                                    <div class="col-md-6">
                                            <input type="email" name="email" class="form-control" value=""  placeholder="Tu correo" />
                                    </div>
                                    <div class="col-md-6">
                                            <input type="text" name="nombre" class="form-control" value="" placeholder="Tu nombre"/>
                                    </div>
                                    <?php }?>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="tema" class="form-control" placeholder="Tema" />
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="msm" rows="5" placeholder="Mensaje"></textarea>
                                </div>
                                <div class="input-group">
                                    <input hidden type="text" class="form-control" name="idmensaje" placeholder="Idmensaje" value="" id="inputidmensaje">
                                </div>
                                <div><button class="btn" type="submit">Enviar Mensaje</button></div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="contact-map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3811.5591062980498!2d-70.95112363329959!3d-17.191645370354696!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1c1ead49080e2eb7!2zMTfCsDExJzI5LjkiUyA3MMKwNTYnNTguNSJX!5e0!3m2!1ses-419!2spe!4v1669776177062!5m2!1ses-419!2spe" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->

        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>