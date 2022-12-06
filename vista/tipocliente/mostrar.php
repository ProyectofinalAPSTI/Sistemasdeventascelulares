
<section class="content">
<div class="container-fluid">
    <!-- row para listado de productos/inventario -->
    <div class="row">
        <div class="col-lg-12">
        <a href="?ctrl=CtrlTipocliente&accion=nuevo" class="btn bg-info">
        <i class="bi bi-plus-circle"></i> 
        Insertar Nuevo Tipo</a>
        <br><br>
            <table id="tbl_tipoclientes" class="table table-striped w-100 shadow">
                <thead class="bg-info">
                    <tr style="font-size: 15px;">
                    <th>Id</th>
                    <th>Persona</th>
                        <th class="text-cetner">Opciones</th>
                    </tr>
                </thead>
                <tbody class="text-small">
                </tbody>
                <?php 
                if (is_array($data))
                    foreach ($data as $c) { ?>
                    <tr>
                        <td><?=$c["idtipo"]?></td>
                        <td><?=$c["persona"]?></td>
                        <td>
                    <a href="?ctrl=CtrlTipocliente&accion=editar&idtipo=<?=$c["idtipo"]?>">
                    <i class="bi bi-pencil-square"></i> Editar </a>/ 
                    <a href="?ctrl=CtrlTipocliente&accion=eliminar&idtipo=<?=$c["idtipo"]?>">
                    <i class="bi bi-trash"></i> Eliminar </a>
                </td>
            </tr>
        <?php }    ?>
            </table>
        </div>
    </div>

</div><!-- /.container-fluid -->

</section>