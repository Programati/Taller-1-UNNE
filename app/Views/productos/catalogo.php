<?=$this->extend('layouts/main')?>


<?=$this->section('title')?>
Catalogo
<?=$this->endSection()?>

<?=$this->section('content')?>

    <div class="container">

        <div class="row text-center">
            <div class="col">
                <p class="seccion-descripcion fs-1">Catálogo de productos</p>
                <hr>
            </div>
        </div>
        <?php if(session()->get('success')): ?>
    
            <div class="alert alert-success my-3" role="alert">
                <?=session()->get('success')?>
            </div>

        <?php endif; ?>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 my-1">

            <!-- Iterador de imagenes -->
            <?php foreach($productos as $key){?>

                <div class="container col text-center p-5 p-sm-1 mb-sm-2 m-0 d-flex align-content-stretch">
                    
                    <div class="row ">

                        <div class="col d-flex align-items-stretch">

                            <div class="card">
        
                                <img    
                                    class="img-fluid border rounded"
                                    loading="lazy"
                                    src="<?=base_url()?>assets/img/magicshopctes/productos/uploads/<?=$key['url_imagen']?>" 
                                    alt="<?=$key['nombre_producto']?>"
                                >  
                                <div class="card-body p-0 text-start">

                                    <div class="row ps-1">
                                        <div class="col">
                                            <p class="card-title fw-bold"><?=$key['nombre_producto']?></p>
                                        </div>
                                    </div>
                                    <!-- DESCRIPCION -->
                                    <div class="row ps-1">
                                        <div class="col">
                                            <small class="card-descripcion-producto"><?=$key['descripcion_producto']?></small>
                                        </div>
                                    </div>

                                    
                                    
                                </div>
                                <!-- STOCK PRECIO y BOTON -->
                                <div class="row d-block">

                                    <div class="col mb-1 d-flex justify-content-between align-items-center">
                                        <span class="stock-badge badge rounded-pill text-bg-warning">
                                            <small>STOCK <?=$key['cantidad']?></small>
                                        </span>
                                        <p class="card-text fw-bold text-center text-sm-end pe-1 carta-precio">$<?=$key['precio']?></p>
                                    </div>

                                    <?php if(session()->has('loggedUser')):?>
                                    
                                        <div class="col">
                                            <a href="<?=base_url('carrito'.$key['id_producto']) ?>" class="btn btn-sm btn-comprar fw-bold d-block d-sm-none py-2 px-0 m-0" type="button">
                                                <i class="bi bi-bag-check-fill display-6"></i>
                                            </a>
                                            <a href="<?=base_url('carrito'.$key['id_producto']) ?>" class="btn btn-sm btn-comprar fw-bold d-none d-sm-block py-2 px-0 m-0" type="button">
                                                COMPRAR AHORA
                                            </a>
                                            
                                        </div>

                                    <?php endif; ?>
                                        
                                </div>
        
                            </div>
                        
                        </div>
                        
                    
                    </div>
                

                </div>

            <?php };?>
            
        </div>
        
    </div>

<?=$this->endSection()?>   