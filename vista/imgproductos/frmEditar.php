<br>
<br>
<section class="content">
    <div class="container">
    <form action="?ctrl=Ctrlimagenes_producto&accion=guardarEditar" method="post">
        <div class="row mb-3">
        <div class="col-md-6">
            <label for="inputID" class="form-label">Id:</label>
            <input type="text" class="form-control"
                name="idimagen" value="<?=$imagenes_producto->getIdimagen()?>" id="inputID">
        </div>
        <div class="col-md-6">
            <label for="inputCiudad" class="form-label">Url:</label>
            <input type="text" class="form-control"
                name="url" value="<?=$imagenes_producto->geturl()?>" id="inputCiudad">
        </div>
        <div class="col-md-6">
            <label for="inputperfiles" class="form-label">Producto:</label>
            <select class="form-control" name="producto" id="producto">
                <?php
                $productos= $imagenes_producto->getproducto()->leer()['data'];
                $producto= $imagenes_producto->getproducto()->getIdproducto();
                foreach ($productos as $p){
                    if ($p["idproducto"]==$producto)
                        $seleccionado="selected";
                        else
                        $seleccionado="";

                ?>
                <option <?=$seleccionado?>  value="<?=$p['idproducto']?>"><?=$p['nombre']?></option>
                <?php } ?>
                <option value="0">Seleccionar</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="inputCiudad" class="form-label">Nombre:</label>
            <input type="text" class="form-control"
                name="nombre" value="<?=$imagenes_producto->getnombre()?>" id="inputTelefono">
        </div>
        </div>
        <div class="col-md-3">
        <button type="submit" class="form-control btn btn-primary">
            <i class="bi bi-save2"></i> Guardar</button>
        </div>
    </form>
    <br><a href="?ctrl=Ctrlimagenes_producto" class="btn btn-primary">
        <i class="bi bi-arrow-90deg-left"></i>
        Retornar</a>
</div>
</section>