        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="#">Productos</a></li>
                    <li class="breadcrumb-item active">Producto Detalle</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Product Detail Start -->
        <div class="product-detail">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="product-detail-top">
                            <div class="row align-items-center">
                                <div class="col-md-5">
                                    <div class="product-slider-single normal-slider">
                                        <?php 
                                            $imagen= (is_array($imagenes['data']))?$imagenes['data'][0]['url']:'SIN_IMAGEN.jpg' ;
                                        ?>
                                        <img src="recursos/images/catalogo/<?=$imagen?>" alt="Product Image">
                                    </div>
                                    <div class="product-slider-single-nav normal-slider">
                                    <?php 
                                      if(is_array($imagenes['data']))
                                      foreach ($imagenes['data'] as $img) { ?>
                                        <div class="slider-nav-img"><img src="recursos/images/catalogo/<?=$img['url']?>" alt="Product Image"></div>
                                        <?php 
                                            }
                                        ?>    
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="product-content">
                                        <div class="title"><h2><?=$data[0]['nombre']?></h2></div>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="price">
                                          <h6> <b>Marca:</b> <?=$data[0]['marca']?></h6>
                                        </div>
                                        <div class="price">
                                          <h6> <b>Almacenamiento:</b>  <?=$data[0]['capacidad']?></h6>
                                        </div>
                                        <div class="price">
                                          <h6> <b>Memoria Ram:</b> <?=$data[0]['capacidad1']?></h6>
                                        </div>
                                        <div class="price">
                                          <h6> <b>Stock:</b> <?= $data[0]['stock']?> Unidades Disponibles</h6>
                                        </div>
                                        <div class="price">
                                            <h4>Precio:</h4>
                                            <p>S/ <?=number_format($data[0]['pu'], 2, ',', ' ')?></p>
                                        </div>
                                        <div class="action">
                                            <a class="btn" href="?ctrl=CtrlCarrito&accion=agregar&id=<?=$data[0]['idproducto']?>&url=detalles"><i class="fa fa-shopping-cart"></i>Agregar al Carrito</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row product-detail-bottom">
                            <div class="col-lg-12">
                                <ul class="nav nav-pills nav-justified">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="pill" href="#description">Descripcion</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="description" class="container tab-pane active">
                                        <h4><?=$data[0]['nombre']?></h4>
                                        <p> <?=$data[0]['descripcion']?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Side Bar Start -->
                    <div class="col-lg-4 sidebar">
                        <div class="sidebar-widget category">
                            <div class="section-header">
                                <h2>Nuestras Marcas</h2>
                            </div>
                            <div class="sidebar-widget brands">
                            <ul>
                                <li><a href="#">Samsung </a><span>(15)</span></li>
                                <li><a href="#">LG </a><span>(10)</span></li>
                                <li><a href="#">Xiaomi </a><span>(28)</span></li>
                                <li><a href="#">Huawei</a><span>(25)</span></li>
                            </ul>
                        </div>
                        </div>
                        
                        <div class="sidebar-widget widget-slider">
                            <div class="sidebar-slider normal-slider">
                            <?php
                            if (is_array($data)){
                            foreach ($data as $d) {
                                ?>
                                <div class="product-item">
                                    <div class="product-title">
                                        <a><?=$d['nombre']?></a>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="product-image">
                                        <a>
                                        <?php 
                                             $img = (!is_null($d['url']))?$d['url']:'SIN_IMAGEN.jpg';
                                                ?>
                                            <img src="recursos/images/catalogo/<?=$img?>" alt="Product Image">
                                        </a>
                                    </div>
                                    <div class="product-price">
                                        <h3>S/ <?=number_format($d['pu'], 2, ',', ' ');?></h3>
                                        <a class="btn" href="?ctrl=CtrlCarrito&accion=agregar&id=<?=$data[0]['idproducto']?>&url=detalles"><i class="fa fa-shopping-cart"></i>Agregar al Carrito</a>
                                    </div>
                                </div>
                                <?php
                                }  
                                }else{
                                    echo "no hay productos";
                                }
                            ?>
                            </div>
                        </div>
                    </div>
                    <!-- Side Bar End -->
                </div>
            </div>
        </div>
        <!-- Product Detail End -->

        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    </body>
