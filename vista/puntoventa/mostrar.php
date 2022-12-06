<!-- Main content -->
<section class="content">

<div class="container-fluid">

    <!-- row para criterios de busqueda -->
    <div class="row">

        <div class="col-lg-12">

            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">BÚSQUEDA DE PRODUCTO</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool text-danger" id="btnLimpiarBusqueda">
                            <i class="fas fa-times"></i>
                        </button>
                    </div> <!-- ./ end card-tools -->
                </div> <!-- ./ end card-header -->
                <div class="card-body">

                    <div class="row">

                        <div class="d-none d-md-flex col-md-12 ">

                            <div style="width: 20%;" class="form-floating mx-1">
                                <input type="text" id="iptNombre" class="form-control" data-index="5">
                                <label for="iptNombre">Nombre</label>
                            </div>

                            <div style="width: 20%;" class="form-floating mx-1">
                                <input type="text" id="iptMarca" class="form-control" data-index="5">
                                <label for="iptMarca">Marca</label>
                            </div>

                    </div>
                </div> <!-- ./ end card-body -->
            </div>

        </div>

    </div>

    <!-- row para listado de productos/inventario -->
    <div class="row">
        <div class="col-lg-12">
        <a href="?ctrl=CtrlProducto&accion=nuevo" class="btn bg-info">
        <i class="bi bi-plus-circle"></i> 
        Buscar</a>
            <br><br>
            <table id="tbl_productos" class="table table-striped w-100 shadow">
                <thead class="bg-info">
                    <tr style="font-size: 15px;">
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Marca</th>
                        <th>IMEI</th>
                        <th>Descripción</th>
                        <th>Almacenamiento</th>
                        <th>Ram</th>
                        <th>Precio_Compra</th>
                        <th>Precio_Venta</th>
                        <th>Stock</th>
                        <th class="text-cetner">Operaciones</th>
                    </tr>
                </thead>
                <tbody class="text-small">
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
        <a href="?ctrl=CtrlProducto&accion=nuevo" class="btn bg-info">
        <i class="bi bi-plus-circle"></i> 
        Agregar</a>
            <br><br>
            <table id="tbl_productos" class="table table-striped w-100 shadow">
                <thead class="bg-info">
                    <tr style="font-size: 15px;">
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Marca</th>
                        <th>IMEI</th>
                        <th>Descripción</th>
                        <th>Almacenamiento</th>
                        <th>Ram</th>
                        <th>Precio_Compra</th>
                        <th>Precio_Venta</th>
                        <th>Stock</th>
                        <th class="text-cetner">Operaciones</th>
                    </tr>
                </thead>
                <tbody class="text-small">
                </tbody>
            </table>
            <a href="?ctrl=CtrlProducto&accion=nuevo" class="btn bg-info">
        <i class="bi bi-plus-circle"></i> 
        Vender</a>
        </div>
    </div>

</div><!-- /.container-fluid -->

</section>