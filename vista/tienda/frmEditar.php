<section class="content">
    <div class="container">
    <form action="?ctrl=CtrlTienda&accion=guardarEditar" method="post">
        <div class="input-group mb-3">
            <span class="input-group-text">Id:</span>
            <input type="text" name="ruc" value="<?=$tienda->getruc()?>" 
                class="form-control">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Nombre:</span>
            <input type="text" name="nombre" value="<?=$tienda->getNombre()?>" 
                class="form-control">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Telefono:</span>
            <input type="text" name="telefono" value="<?=$tienda->getTelefono()?>" 
                class="form-control">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Direccion:</span>
            <input type="text" name="direccion" value="<?=$tienda->getDireccion()?>" 
                class="form-control">
        </div>
        <button type="submit" class="btn bg-info">
            <i class="bi bi-save2"></i> Guardar</button>
    </form>
    <br><a href="?ctrl=CtrlTienda" class="btn bg-info">
        <i class="bi bi-arrow-90deg-left"></i>
        Retornar</a>
</div>
</section>
