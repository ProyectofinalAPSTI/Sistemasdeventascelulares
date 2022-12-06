<section class="content">
    <div class="container">
    <form action="?ctrl=CtrlTienda&accion=guardarNuevo" method="post">
        <div class="row mb-3">
        <div class="col-md-6">
            <label for="inputruc" class="form-label">RUC:</label>
            <input type="text" class="form-control"
                name="ruc" value="" id="inputruc">
            </div>
        <div class="col-md-6">
            <label for="inputNombre" class="form-label">Nombre:</label>
            <input type="text" class="form-control"
                name="nombre" value="" id="inputNombre">
        </div>
        <div class="col-md-6">
            <label for="inputTelefono" class="form-label">Telefono:</label>
            <input type="text" class="form-control"
                name="telefono" value="" id="inputTelefono">
        </div>
        <div class="col-md-6">
            <label for="inputDireccion" class="form-label">Direccion:</label>
            <input type="text" class="form-control"
                name="direccion" value="" id="inputDireccion">
        </div>
        </div>
        <div class="col-md-3">
        <button type="submit" class="form-control btn bg-info">
            <i class="bi bi-save2"></i> Guardar</button>
        </div>
    </form>
    <br><a href="?ctrl=CtrlTienda" class="btn bg-info">
        <i class="bi bi-arrow-90deg-left"></i>
        Retornar</a>
</div>
</section>