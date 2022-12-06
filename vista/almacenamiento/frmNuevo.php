<section class="content">
    <div class="container-fluid">
    <form action="?ctrl=CtrlAlmacenamiento&accion=guardarNuevo" method="post">
        <div class="row mb-3">
        <div class="col-md-6">
            <label for="inputIdalmacenamiento" class="form-label">Id:</label>
            <input type="text" class="form-control"
                name="idalmacenamiento" value="" id="inputIdalmacenamiento">
            </div>
        <div class="col-md-6">
            <label for="inputCapacidad" class="form-label">Capacidad:</label>
            <input type="text" class="form-control"
                name="capacidad" value="" id="inputCapacidad">
        </div>
        </div>
        <div class="col-md-3">
        <button type="submit" class="form-control btn bg-info">
            <i class="bi bi-save2"></i> Guardar</button>
        </div>
    </form>
    <br><a href="?ctrl=CtrlAlmacenamiento" class="btn bg-info">
        <i class="bi bi-arrow-90deg-left"></i>
        Retornar</a>
</div>
</section>