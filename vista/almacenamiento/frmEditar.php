    <section class="content">
    <div class="container-fluid">
    <form action="?ctrl=CtrlAlmacenamiento&accion=guardarEditar" method="post">
        <div class="input-group mb-3">
            <span class="input-group-text">Id:</span>
            <input type="text" name="idalmacenamiento" value="<?=$almacenamiento->getidalmacenamiento()?>" 
                class="form-control">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Capacidad:</span>
            <input type="text" name="capacidad" value="<?=$almacenamiento->getCapacidad()?>" 
                class="form-control">
        </div>
        <button type="submit" class="btn bg-info">
            <i class="bi bi-save2"></i> Guardar</button>
    </form>
    <br><a href="?ctrl=CtrlAlmacenamiento" class="btn bg-info">
        <i class="bi bi-arrow-90deg-left"></i>
        Retornar</a>
</div>
</section>
