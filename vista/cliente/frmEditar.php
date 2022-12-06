<br>
<br>
<section class="content">
    <div class="container">
    <form action="?ctrl=CtrlCliente&accion=guardarEditar" method="post">
        <div class="row mb-3">
        <div class="col-md-6">
            <label for="inputID" class="form-label">Id:</label>
            <input type="text" class="form-control"
                name="id" value="<?=$cliente->getId()?>" id="inputID">
        </div>
        <div class="col-md-6">
            <label for="inputCiudad" class="form-label">Nombre:</label>
            <input type="text" class="form-control"
                name="nombre" value="<?=$cliente->getNombre()?>" id="inputCiudad">
        </div>
        <div class="col-md-6">
            <label for="inputID" class="form-label">Apellido:</label>
            <input type="text" class="form-control"
                name="apellido" value="<?=$cliente->getApellido()?>" id="inputID">
        </div>
        <div class="col-md-6">
            <label for="inputCiudad" class="form-label">DNI:</label>
            <input type="text" class="form-control"
                name="dni" value="<?=$cliente->getDni()?>" id="inputCiudad">
        </div>
        <div class="col-md-6">
            <label for="inputCiudad" class="form-label">Telefono:</label>
            <input type="text" class="form-control"
                name="telefono" value="<?=$cliente->getTelefono()?>" id="inputTelefono">
        </div>
        <div class="col-md-6">
            <label for="inputperfiles" class="form-label">Perfiles:</label>
            <select class="form-control" name="perfiles" id="perfil">
                <?php
                $perfiless= $cliente->getperfiles()->leer()['data'];
                $perfiles= $cliente->getperfiles()->getIdperfil();
                foreach ($perfiless as $p){
                    if ($p["idperfil"]==$perfiles)
                        $seleccionado="selected";
                        else
                        $seleccionado="";

                ?>
                <option <?=$seleccionado?>  value="<?=$p['idperfil']?>"><?=$p['perfil']?></option>
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
    <br><a href="?ctrl=CtrlCliente" class="btn btn-primary">
        <i class="bi bi-arrow-90deg-left"></i>
        Retornar</a>
</div>
</section>