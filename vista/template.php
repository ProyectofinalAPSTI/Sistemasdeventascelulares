<?php 
 $dataCSS =
      array ('cssGbl'=> Celular::cssGlobales()
    );
    $dataJS = 
      array('jsGbl'=>Celular::jsGlobales(),
          'msg'=>$datos['msg'],
          'data'=>isset($data)?$data:''
    );
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$titulo?></title>
    <?php echo Vista::mostrar('./plantilla/css.php',$dataCSS,true); ?>
</head>
<body  class="hold-transition sidebar-collapse">
    <?php echo Vista::mostrar('./plantilla/nav.php',$datos,true); ?>
    <?php  echo Vista::mostrar('./plantilla/aside.php',$datos,true); ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <?php echo Vista::mostrar('./plantilla/wrapper.php',$datos,true); ?>
    <?php echo $contenido; ?>
  </div>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
    <?php echo Vista::mostrar('./plantilla/footer.php',$datos,true); ?>
    <?php echo Vista::mostrar('./plantilla/js.php',$dataJS,true); 
    if (isset($grafico))
    echo Vista::mostrar('./plantilla/jsEstadisticas.php',$grafico,true); 
   
    // var_dump($js);exit();
    if (isset($js))
      foreach ($js as $j) { ?>
        <script src="<?=$j['url']?>"></script>
     <?php }
    ?>
<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="recursos2/lib/easing/easing.min.js"></script>
<script src="recursos2/lib/slick/slick.min.js"></script>
<!-- Template Javascript -->
<script src="recursos2/js/main.js"></script>
</body>
</html>