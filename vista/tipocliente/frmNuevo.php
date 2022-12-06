<section class="content">
    <div class="container-fluid">
    <form action="?ctrl=CtrlTipocliente&accion=guardarNuevo" method="post">
        <div class="row mb-3">
        <div class="col-md-6">
            <label for="inputIdtipo" class="form-label">Id:</label>
            <input type="text" class="form-control"
                name="idtipo" value="" id="inputidtipo">
        </div>
        <div class="col-md-6">
            <label for="inputPersona" class="form-label">Tipo:</label>
            <input type="text" class="form-control"
                name="persona" value="" id="inputPersona">
        </div>
        </div>
        <div class="col-md-3">
        <button type="submit" class="form-control btn bg-info">
            <i class="bi bi-save2"></i> Guardar</button>
        </div>
    </form>
    <br><a href="?ctrl=CtrlTipocliente" class="btn bg-info">
        <i class="bi bi-arrow-90deg-left"></i>
        Retornar</a>
</div>
</section>