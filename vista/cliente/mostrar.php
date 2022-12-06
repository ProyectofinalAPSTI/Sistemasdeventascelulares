
<style>
    .filtro{
        display:none !important;
    }

</style>

<script>
    document.addEventListener("keyup", e=>{

if (e.target.matches("#buscador")){

    if (e.key ==="Escape")e.target.value = ""

    document.querySelectorAll(".articulo").forEach(fruta =>{

        fruta.textContent.toLowerCase().includes(e.target.value.toLowerCase())
          ?fruta.classList.remove("filtro")
          :fruta.classList.add("filtro")
    })

}


})
</script>
<!-- Main content -->
    <!-- Content Header (Page header) -->
 <div class="content-header">
     <div class="container-fluid">
         <div class="row mb-2">
             <div class="col-sm-6">
                 <h1 class="m-0">Usuarios Registrados</h1>
             </div><!-- /.col -->
         </div><!-- /.row -->
     </div><!-- /.container-fluid -->
 </div>
 <!-- /.content-header -->
 <!-- Main content -->
 <div class="content">
     <div class="container-fluid">
      <div class="row">
                 <!-- row para criterios de busqueda -->
             <div class="col-lg-6">
                 <div class="card card-info">
                     <div class="card-header">
                         <h3 class="card-title">CRITERIOS DE BÚSQUEDA</h3>
                     </div> <!-- ./ end card-header -->
                     <div class="card-body">
                         <div class="row">
                            <div class="col-lg-12 d-lg-flex">
                                <div style="width: 50%;" class="form-floating mx-1">
                                    <input 
                                            type="text" 
                                            class="form-control"
                                            name="buscador" id="buscador"
                                            data-index="5">
                                </div>
                                <div>
                                  <button class="btn">Buscar</button>
                                </div>
                            </div>
                         </div>
                     </div> <!-- ./ end card-body -->
                 </div>
              </div>
                  <!-- row para criterios de busqueda -->
             <div class="col-lg-6">
                 <div class="card card-info">
                     <div class="card-header">
                         <h3 class="card-title">Ingresar Nuevo Cliente</h3>
                     </div> <!-- ./ end card-header -->
                     <div class="card-body">
                         <div class="row">
                            <div class="col-lg-12 d-lg-flex">
                                <div style="width: 40%;" class="form-floating mx-1">
                                  <a href="?ctrl=CtrlCliente&accion=nuevo" class="btn btn-primary">
                                    <i class="bi bi-plus-circle"></i> 
                                    Insertar Nuevo Cliente</a>
                                </div>
                                <br>
                            </div>
                         </div>
                     </div> <!-- ./ end card-body -->
                 </div>
              </div>
             
      </div>
         <!-- row para listado-->
         <div class="row">
             <div class="col-lg-12">
                 <table id="tbl_productos" class="table table-striped w-100 shadow">
                     <thead class="bg-info">
                         <tr style="font-size: 15px;">
                          <th>Id</th>
                          <th>Usuario</th>
                          <th>DNI</th>
                          <th>Estado</th>
                          <th>telefono</th>
                          <th>Perfil</th>
                          <th>Operaciones</th>
                         </tr>
                     </thead>
                     <tbody class="text-small">
                     </tbody>
                     <?php 
                if (is_array($data))
                    foreach ($data as $c) { ?>
                <tr  class="articulo">
                    <td><?=$c["idcliente"]?></td>
                    <td><?=$c["nombrecliente"]?></td>
                    <td><?=$c["dni"]?></td>
                    <td><?=$c["estado"]?></td>
                    <td><?=$c["telefono"]?></td>
                    <td><?=$c["perfil"]?></td>
                    <td>
                      <a href="?ctrl=CtrlCliente&accion=editar&id=<?=$c["idcliente"]?>">
                      <i class="bi bi-pencil-square"></i> Editar </a>
                      / 
                      <a href="?ctrl=CtrlCliente&accion=eliminar&id=<?=$c["idcliente"]?>">
                          <i class="bi bi-trash"></i> Eliminar </a>
                  </td>
                </tr>
              <?php }    ?>
                 </table>
             </div>
         </div>
     </div><!-- /.container-fluid -->
 </div>
 <!-- /.content -->