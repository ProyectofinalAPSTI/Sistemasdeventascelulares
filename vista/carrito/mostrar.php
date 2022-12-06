
    <section>
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="#">Productos</a></li>
                    <li class="breadcrumb-item active">Carrito</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Cart Start -->
        <div class="cart-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="cart-page-inner">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                <?php 
                                $total =0;
                                //var_dump($data);exit();
                                if (isset($_SESSION['carrito']))
                                    foreach ($data as $p) { 
                                        $cant = $_SESSION['carrito']->getCantidad($p['idproducto']);
                                        
                                        $pu = $p['pu'];
                                        $subTotal = number_format($cant * $pu, 2, ',', ' ');
                                        $total += $cant * $pu;
                                        ?>
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Producto</th>
                                            <th>Precio</th>
                                            <th>Cantidad</th>
                                            <th>Subtotal</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody class="align-middle">
                                        <tr>
                                            <td>
                                                <div class="img">
                                                    <a href="#"><img src="recursos/images/catalogo/<?=$p['url']?>" alt="Image"></a>
                                                    <p><?=$p['nombre']?></p>
                                                </div>
                                            </td>
                                            <td>S/ <?=number_format($pu, 2, ',', ' ');;?></td>
                                            <td>
                                                <div>
                                                    <a href="?ctrl=CtrlCarrito&accion=sacar&id=<?=$p['idproducto']?>&url=carrito"
                                                    class="btn btn-danger btn-sm">-</a>
                                                    <input type="text" value="<?=$cant;?>">
                                                    <a href="?ctrl=CtrlCarrito&accion=agregar&id=<?=$p['idproducto']?>&url=carrito"
                                                    class="btn btn-success btn-sm">+</a>
                                                </div>
                                            </td>
                                            <td><?=$subTotal;?></td>
                                            <td><a href="?ctrl=CtrlCarrito&accion=sacar&id=<?=$p['idproducto']?>&url=carrito&cant=<?=$cant?>"><i class="btn btn-danger fa fa-trash"></i></a></td>
                                        </tr>
                                    </tbody>
                                    <?php }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="cart-page-inner">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="cart-summary">
                                        <div class="cart-content">
                                            <h1>Resumen</h1>
                                            <p>Total<span>S/ <?=number_format($total, 2, ',', ' ');?></span></p>
                                            <p>IGV<span>S/ <?=number_format($total*0.18, 2, ',', ' ');?></span></p>
                                            <h2>Total a pagar<span>S/ <?=number_format($total*1.18, 2, ',', ' ');?></span></h2>
                                        </div>

                                    <div class="row">
                                        <?php if (isset($_SESSION['id'])){ ?>
                                        <div class="col-md-6 text-center">
                                                <a href="?ctrl=CtrlBoleta&accion=guardarNuevo" class="btn btn-outline-success">
                                                    <i class="fa fa-cart-arrow-down"></i>
                                                Procesar Compra</a>
                                        </div>
                                        <?php }else { ?>
                                            <!-- Button trigger modal -->
                                            <div class="col-md-6 text-center">
                                                    <a type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#exampleModalCenter">
                                                    <i class="fa fa-cart-arrow-down"></i>
                                                            Procesar Compra
                                                    </a>
                                            </div>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                    <div class="modal-header alert alert-danger">
                                                        <h5 class="modal-title" id="exampleModalLongTitle"><strong>¡ Ups Error !</strong></h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true"></span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="text-lg-center text-danger "> <h2> Inicie Sesión para continuar..</h2></div>
                                                        </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php }?>
                                        <hr>
                                        <div class="col-md-6 text-center">
                                            <a href="?ctrl=CtrlProducto&accion=getCatalogo" 
                                                class="btn btn-outline-primary">
                                                <i class="fa fa-store"></i>
                                                Seguir comprando</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Cart End -->

        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        
    </section>