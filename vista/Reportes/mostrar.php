<br>
 <!-- Main content -->
 <div class="content">

    <div class="container-fluid">

        <!-- row Tarjetas Informativas -->
        <div class="row">
            <div class="col-lg-3">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h4 id="total">
                        <?=$data[0]?></h4>
                        <p>Productos</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-clipboard"></i>
                    </div>
                </div>
            </div>

            <!-- TARJETA TOTAL COMPRAS -->

            <!-- TARJETA TOTAL VENTAS -->
            <div class="col-lg-3">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <?php
                        $ta = new Reportes();
                        $datos = $ta->getTotalanual();
                        ?>
                        <h4 id="">S./ <?=$datos['data'][0]['TotalVentasMes']?></h4>

                        <p>Ventas Anual</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-cart"></i>
                    </div>
                </div>
            </div>

            <!-- TARJETA PRODUCTOS POCO STOCK -->
            <div class="col-lg-3">
                <!-- small box -->
                <div class="small-box bg-primary">
                    <div class="inner">
                        <?php
                        $ps = new Reportes();
                        $datos = $ps->getPoquito();
                        ?>
                        <h4><?=$datos['data'][0]['ProductosPocoStock']?></h4>
                        <p>Productos poco stock</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-remove-circle"></i>
                    </div>
                </div>
            </div>

            <!-- TARJETA TOTAL VENTAS DIA ACTUAL -->
            <div class="col-lg-3">
                <!-- small box -->
                <div class="small-box bg-secondary">
                    <div class="inner">
                        <?php
                        $tm = new Reportes();
                        $datos = $tm->getTotalmes();
                        ?>
                        <h4 id=""> S./  <?=$datos['data'][0]['TotalVentasMes']?></h4>
                        <p>Ventas del Mes</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-calendar"></i>
                    </div>
                </div>
            </div>


        </div> <!-- ./row Tarjetas Informativas -->



        <!-- row Grafico de barras -->
        <div class="row">
            <div class="col-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Cantidad de Modelos Por Marca</h3>
                    </div> <!-- ./ end card-header -->
                    <!-- /.card-body -->
                    <div class="card-body p-0">
                        <div class="position-relative mb-4">
                        <canvas id="grafModelosXMarcas" height="200"></canvas>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>

        </div><!-- ./row Grafico de barras -->

        <div class="row">
            <div class="col-lg-6">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Los 05 Celulares mas vendidos</h3>
                    </div> <!-- ./ end card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr class="text-danger ">
                                        <th>Cod. producto</th>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>SAMSUNG GALAXY S22 ULTRA 6.8</td>
                                        <td>11</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>SAMSUNG GALAXY S20 FE 6.5 6GB 128GB 12MP + 12MP + 8MP</td>
                                        <td>8</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>XIAOMI POCO X4 GT 8GB - 256GB</td>
                                        <td>6</td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>XIAOMI REDMI NOTE 10 5G 128GB</td>
                                        <td>6</td>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td>XIAOMI REDMI NOTE 11 PRO PLUS 5G 128GB 6GB </td>
                                        <td>12</td>
                                    </tr>
                                </thead>
                                <tbody class="text-small">
                                </tbody>
                            </table>
                        </div>
                    </div> <!-- ./ end card-body -->
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Listado de Celulares con poco stock</h3>
                    </div> <!-- ./ end card-header -->
                    <div class="card-body">
                    <div class="table-responsive">
                            <table class="table table-striped w-100 shadow">
                                <thead>
                                    <tr class="text-danger">
                                        <th>Id</th>
                                        <th>Producto</th>
                                        <th>Stock</th>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>HUAWEI P50 PRO 6.6'' 64MP + 50MP + 40MP + 13MP</td>
                                        <td>2</td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>XIAOMI 11 LITE 5G NE TRUFFLE BLACK 128GB 64MP + 8MP + 5MP</td>
                                        <td>4</td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>XIAOMI REDMI NOTE 10 5G 128GB</td>
                                        <td>2</td>
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td>SAMSUNG GALAXY Z FOLD4 7.6 12GB 256GB 50MP + 12MP + 10MP</td>
                                        <td>3</td>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div> <!-- ./ end card-body -->
                </div>
            </div>
            <div class="col-12 col-md-6">
            <!-- USERS LIST -->
        </div>
            

        </div>

    </div><!-- /.container-fluid -->

</div>
<!-- /.content -->

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="recursos2/lib/easing/easing.min.js"></script>
<script src="recursos2/lib/slick/slick.min.js"></script>
<!-- Template Javascript -->
<script src="recursos2/js/main.js"></script>


