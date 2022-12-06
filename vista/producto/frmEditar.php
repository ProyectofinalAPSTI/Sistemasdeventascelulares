<br>
<br>
<section class="content">
    <div class="container">
    <form action="?ctrl=CtrlProducto&accion=guardarEditar" method="post">
        <div class="row mb-3">
        <div class="col-md-6">
            <label for="inputID" class="form-label">Id:</label>
            <input type="text" class="form-control"
                name="idproducto" value="<?=$producto->getIdproducto()?>" id="inputID">
        </div>
        <div class="col-md-6">
            <label for="inputCiudad" class="form-label">Nombre:</label>
            <input type="text" class="form-control"
                name="nombre" value="<?=$producto->getNombre()?>" id="inputCiudad">
        </div>
        <div class="col-md-6">
            <label for="inputID" class="form-label">Descripcion:</label>
            <input type="text" class="form-control"
                name="descripcion" value="<?=$producto->getDescripcion()?>" id="inputID">
        </div>
        <div class="col-md-6">
            <label for="inputCiudad" class="form-label">Precio:</label>
            <input type="text" class="form-control"
                name="pu" value="<?=$producto->getpu()?>" id="inputpu">
        </div>
        <div class="col-md-6">
            <label for="inputCiudad" class="form-label">Stock:</label>
            <input type="text" class="form-control"
                name="stock" value="<?=$producto->getstock()?>" id="inputstock">
        </div>
        <div class="col-md-6">
            <label for="inputmarcas" class="form-label">marcas:</label>
            <select class="form-control" name="marcas" id="marcas">
                <?php
                $marcass= $producto->getmarcas()->leer()['data'];
                $marcas= $producto->getmarcas()->getidmarca();
                foreach ($marcass as $p){
                    if ($p["idmarca"]==$marcas)
                        $seleccionado="selected";
                        else
                        $seleccionado="";

                ?>
                <option <?=$seleccionado?>  value="<?=$p['idmarca']?>"><?=$p['marca']?></option>
                <?php } ?>
                <option value="0">Seleccionar</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="inputAlmacenamiento" class="form-label">Almacenamiento:</label>
            <select class="form-control" name="almacenamiento" id="almacenamiento">
                <?php
                $almacenamientos= $producto->getAlmacenamiento()->leer()['data'];
                $almacenamiento= $producto->getAlmacenamiento()->getIdalmacenamiento();
                foreach ($almacenamientos as $p){
                    if ($p["idalmacenamiento"]==$almacenamiento)
                        $seleccionado="selected";
                        else
                        $seleccionado="";

                ?>
                <option <?=$seleccionado?>  value="<?=$p['idalmacenamiento']?>"><?=$p['capacidad']?></option>
                <?php } ?>
                <option value="0">Seleccionar</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="inputRam" class="form-label">Ram:</label>
            <select class="form-control" name="ram" id="ram">
                <?php
                $rams= $producto->getRam()->leer()['data'];
                $ram= $producto->getRam()->getIdram();
                foreach ($rams as $r){
                    if ($r["idram"]==$ram)
                        $seleccionado="selected";
                        else
                        $seleccionado="";

                ?>
                <option <?=$seleccionado?>  value="<?=$r['idram']?>"><?=$r['capacidad1']?></option>
                <?php } ?>
                <option value="0">Seleccionar</option>
            </select>
        </div>
        </div>
        <div class="col-md-3">
        <button type="submit" class="form-control btn btn-primary">
            <i class="bi bi-save2"></i> Guardar</button>
        </div>
    </form>
    <br><a href="?ctrl=CtrlProducto" class="btn btn-primary">
        <i class="bi bi-arrow-90deg-left"></i>
        Retornar</a>
</div>
</section>