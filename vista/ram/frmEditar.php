<section class="content">
    <div class="container-fluid">
    <form action="?ctrl=CtrlRam&accion=guardarEditar" method="post">
        <div class="input-group mb-3">
            <span class="input-group-text">Id:</span>
            <input type="text" name="idram" value="<?=$ram->getidram()?>" 
                class="form-control">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Capacidad:</span>
            <input type="text" name="capacidad" value="<?=$ram->getCapacidad()?>" 
                class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">
            <i class="bi bi-save2"></i> Guardar</button>
    </form>
    <br><a href="?ctrl=CtrlRam" class="btn btn-primary">
        <i class="bi bi-arrow-90deg-left"></i>
        Retornar</a>
</div>
</section>