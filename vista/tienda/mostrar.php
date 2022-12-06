<br>
<br>
<section class="content">
<div class="container">
    <!-- row para listado de productos/inventario -->
    <div class="row">
        <div class="col-lg-12">
        <a href="?ctrl=CtrlTienda&accion=nuevo" class="btn bg-info">
        <i class="bi bi-plus-circle"></i> 
        Insertar Nuevo Tienda</a>
        <br><br>
            <table id="tbl_Tiendas" class="table table-striped w-100 shadow">
                <thead class="bg-info">
                    <tr style="font-size: 15px;">
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>Direccion</th>
                        <th class="text-cetner">Opciones</th>
                    </tr>
                </thead>
                <tbody class="text-small">
                </tbody>
                <?php 
                if (is_array($data))
                    foreach ($data as $c) { ?>
                    <tr>
                        <td><?=$c["ruc"]?></td>
                        <td><?=$c["nombre"]?></td>
                        <td><?=$c["telefono"]?></td>
                        <td><?=$c["direccion"]?></td>
                        <td>
                    <a href="?ctrl=CtrlTienda&accion=editar&ruc=<?=$c["ruc"]?>">
                    <i class="bi bi-pencil-square"></i> Editar </a>/ 
                    <a href="?ctrl=CtrlTienda&accion=eliminar&ruc=<?=$c["ruc"]?>">
                    <i class="bi bi-trash"></i> Eliminar </a>
                </td>
            </tr>
        <?php }    ?>
            </table>
        </div>
    </div>

</div><!-- /.container-fluid -->

</section>