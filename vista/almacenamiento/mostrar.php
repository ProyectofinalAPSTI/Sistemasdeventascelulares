
<section class="content">
<div class="container-fluid">
    <!-- row para listado de productos/inventario -->
    <div class="row">
        <div class="col-lg-12">
        <a href="?ctrl=CtrlAlmacenamiento&accion=nuevo" class="btn bg-info">
        <i class="bi bi-plus-circle"></i> 
        Insertar Nuevo Almacenamiento</a>
        <br><br>
            <table id="tbl_almacenamientos" class="table table-striped w-100 shadow">
                <thead class="bg-info">
                    <tr style="font-size: 15px;">
                    <th>Id</th>
                    <th>Capacidad</th>
                        <th class="text-cetner">Opciones</th>
                    </tr>
                </thead>
                <tbody class="text-small">
                </tbody>
                <?php 
                if (is_array($data))
                    foreach ($data as $c) { ?>
                    <tr>
                        <td><?=$c["idalmacenamiento"]?></td>
                        <td><?=$c["capacidad"]?></td>
                        <td>
                    <a href="?ctrl=CtrlAlmacenamiento&accion=editar&idalmacenamiento=<?=$c["idalmacenamiento"]?>">
                    <i class="bi bi-pencil-square"></i> Editar </a>/ 
                    <a href="?ctrl=CtrlAlmacenamiento&accion=eliminar&idalmacenamiento=<?=$c["idalmacenamiento"]?>">
                    <i class="bi bi-trash"></i> Eliminar </a>
                </td>
            </tr>
        <?php }    ?>
            </table>
        </div>
    </div>

</div><!-- /.container-fluid -->

</section>