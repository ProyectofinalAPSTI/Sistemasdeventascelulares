<section class="content">
    <div class="container-fluid">
    <form action="?ctrl=CtrlTipocliente&accion=guardarEditar" method="post">
        <div class="input-group mb-3">
            <span class="input-group-text">Id:</span>
            <input type="text" name="idtipo" value="<?=$tipocliente->getidtipo()?>" 
                class="form-control">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Tipo:</span>
            <input type="text" name="persona" value="<?=$tipocliente->getpersona()?>" 
                class="form-control">
        </div>
        <button type="submit" class="btn bg-info">
            <i class="bi bi-save2"></i> Guardar</button>
    </form>
    <br><a href="?ctrl=CtrlTipocliente" class="btn bg-info">
        <i class="bi bi-arrow-90deg-left"></i>
        Retornar</a>
</div>
</section>