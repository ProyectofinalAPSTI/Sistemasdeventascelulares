
<section class="content">
<div class="container-fluid">
    <!-- row para listado de productos/inventario -->
    <div class="row">
        <div class="col-lg-12">
        <a href="?ctrl=CtrlRam&accion=nuevo" class="btn bg-info">
        <i class="bi bi-plus-circle"></i> 
        Insertar Nuevo Ram</a>
        <br><br>
            <table id="tbl_rams" class="table table-striped w-100 shadow">
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
                        <td><?=$c["idram"]?></td>
                        <td><?=$c["capacidad"]?></td>
                        <td>
                    <a href="?ctrl=CtrlRam&accion=editar&idram=<?=$c["idram"]?>">
                    <i class="bi bi-pencil-square"></i> Editar </a>/ 
                    <a href="?ctrl=CtrlRam&accion=eliminar&idram=<?=$c["idram"]?>">
                    <i class="bi bi-trash"></i> Eliminar </a>
                </td>
            </tr>
        <?php }    ?>
            </table>
        </div>
    </div>

</div><!-- /.container-fluid -->

</section>