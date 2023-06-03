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

        <div class="row row-cols-2 row-cols-sm-3 row-cols-md-3 row-cols-lg-4 my-5 d-flex">

            <!-- Iterador de imagenes -->
            <?php foreach($productos as $key){?>

                <div class="container col text-center mb-5">
                    
                    <div class="row ">

                        <div class="col ">

                            <div class="card ">
        
                                <img    
                                    class="img-fluid border rounded"
                                    loading="lazy"
                                    src="<?=base_url()?>assets/img/magicshopctes/productos/uploads/<?=$key['url_imagen']?>" 
                                    alt="<?=$key['nombre_producto']?>"
                                >  
                                <div class="card-body p-0 text-start">
                                    <div class="row">
                                        <div class="col">
                                            <p class="card-title p-0 ps-1 fw-bold"><?=$key['nombre_producto']?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                        <small class="card-descripcion-producto p-0 ps-1"><?=$key['descripcion_producto']?></small>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                        <p class="card-text fs-4 fw-bold text-center text-sm-end pe-1 carta-precio">$<?=$key['precio']?></p>
                                        </div>
                                    </div>
                                    
                                    
                                </div>
        
                                <div class="card-body d-flex justify-content-between f-direction-row">
                                    <div class="col">

                                        <div class="row">
                                            <div class="col-12 mb-1">
                                                <span class="badge rounded-pill text-bg-warning">
                                                    <small>STOCK <?=$key['cantidad']?></small>
                                                </span>
                                            </div>
                                            <?php if(session()->has('loggedUser')):?>
                                            <!-- <div class="d-grid gap-1">

                                                
    
                                            </div> -->
                                            <div class="col">
                                                <div class="row">
                                                    <div class="col">
                                                        <a href="<?=base_url('carrito'.$key['id_producto']) ?>" class="btn btn-sm btn-comprar fw-bold d-block d-sm-none p-0 m-0" type="button">
                                                        <i class="bi bi-bag-check-fill display-6"></i>
                                                        </a>
                                                        <a href="<?=base_url('carrito'.$key['id_producto']) ?>" class="btn btn-sm btn-comprar fw-bold d-none d-sm-block p-0 m-0" type="button">
                                                            COMPRAR AHORA
                                                        </a>
                                                        
                                                    </div>
                                                </div>
    
                                            </div>
                                            <?php endif; ?>
                                                
                                        </div>

                                    </div>

                                </div>
        
                            </div>
                        
                        </div>
                        
                    
                    </div>
                

                </div>

            <?php };?>
            
        </div>
        
    </div>

<?=$this->endSection()?>   