<div class="content-header">
     <div class="container-fluid">
         <div class="row mb-2">
             <div class="col-sm-6">
                 <h1 class="m-0">Mensajes Registrados</h1>
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
             <div class="col-lg-12">
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
             
      </div>
         <!-- row para listado-->
         <div class="row">
             <div class="col-lg-12">
                 <table id="" class="table table-striped w-100 shadow">
                     <thead class="bg-info">
                         <tr style="font-size: 15px;">
                          <th>Id</th>
                          <th>Nombre</th>
                          <th>Email</th>
                          <th>Mensaje</th>
                          <th>Operaciones</th>
                         </tr>
                     </thead>
                     <tbody class="text-small">
                     </tbody>
                     <?php 
                if (is_array($data))
                    foreach ($data as $c) { ?>
                <tr  class="articulo">
                    <td><?=$c["idmensaje"]?></td>
                    <td><?=$c["nombre"]?></td>
                    <td><?=$c["email"]?></td>
                    <td><?=$c["msm"]?></td>
                    <td>
                      <a href="?ctrl=CtrlMensaje&accion=eliminar&idmensaje=<?=$c["idmensaje"]?>">
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