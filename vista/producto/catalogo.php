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
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href=".?">Inicio</a></li>
                    <li class="breadcrumb-item active">Productos</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->

        <!-- Product List Start -->
        <div class="product-view">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="product-view-top">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="product-search">
                                                <input name="buscador" id="buscador" placeholder="Busqueda">
                                                <button><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            if (is_array($data)){
                            foreach ($data as $d) {
                                ?>
                            <div class="articulo col-md-4">
                                <div class="product-item">
                                    <div class="product-title">
                                        <a href="#"><?=$d['nombre']?></a>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="product-image">
                                        <a href="product-detail.html">
                                                    <?php 
                                                    $img = (!is_null($d['url']))?$d['url']:'SIN_IMAGEN.jpg';
                                                        ?>
                                            <img src="recursos/images/catalogo/<?=$img?>" alt="Product Image">
                                        </a>
                                        <div class="product-action">
                                            <a href="?ctrl=CtrlProducto&accion=verDetalles&id=<?=$d['idproducto']?>&url=catalogo"> Ver Detalles</a>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <h3><span>S/ <?=number_format($d['pu'], 2, ',', ' ');?></h3>
                                        </a>
                                        <a class="btn" href="?ctrl=CtrlCarrito&accion=agregar&id=<?=$d['idproducto']?>&url=catalogo">
                                            <i class="fa fa-shopping-cart">&nbsp;</i> Agregar al Carrito
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php
                                }  
                                }else{
                                    echo "no hay productos";
                                }
                            ?>
                        </div>
                        
                        <!-- Pagination Start -->
                        <div class="col-md-12">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <!-- Pagination Start -->
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

                        <div class="sidebar-widget widget-slider">
                            <div class="sidebar-slider normal-slider">
                            <?php
                                if (is_array($data)){
                                foreach ($data as $d) {
                                    ?>
                                <div class="product-item">
                                    <div class="product-title">
                                        <a href="#"><?=$d['nombre']?></a>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="product-image">
                                        <a href="product-detail.html">
                                        <?php 
                                            $img = (!is_null($d['url']))?$d['url']:'SIN_IMAGEN.jpg';
                                            ?>
                                            <img src="recursos/images/catalogo/<?=$img?>" alt="Product Image">
                                        </a>
                                        <div class="product-action">
                                        <a href="?ctrl=CtrlProducto&accion=verDetalles&id=<?=$d['idproducto']?>&url=catalogo"> Ver Detalles</a>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <h3>S/ <?=number_format($d['pu'], 2, ',', ' ');?></h3>
                                        <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                    </div>
                                </div>
                                <?php
                            }  
                            }else{ echo "no hay productos";
                                        }
                                    ?>
                            </div>
                        </div>
                    </div>
                    <!-- Side Bar End -->
                </div>
            </div>
        </div>
        <!-- Product List End -->  
        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>


