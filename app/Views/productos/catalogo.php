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

        <div class="row row-cols-2 row-cols-sm-3 row-cols-md-3 row-cols-lg-4 my-5 d-flex">

            <!-- Iterador de imagenes -->
            <?php foreach($productos as $key){?>

                <div class="container col text-center mb-5">
                    
                    <div class="row">

                        <div class="col ">

                            <div class="card">
        
                                <img    
                                    class="img-fluid border rounded"
                                    loading="lazy"
                                    src="<?=base_url()?>assets/img/magicshopctes/productos/uploads/<?=$key['url_imagen']?>" 
                                    alt="<?=$key['nombre_producto']?>"
                                >  
                                <div class="card-body">
                                    <h5 class="card-title"><?=$key['nombre_producto']?></h5>
                                    <p class="card-text"><small><?=$key['descripcion_producto']?></small></p>
                                    <p class="card-text fs-4 fw-bold" style="color:red">$<?=$key['precio']?></p>
                                </div>
                                <hr>
        
                                <div class="card-body d-flex justify-content-between f-direction-row">
                                    <div class="col">

                                        <div class="row mb-2">
    
                                            <div class="col-12">
                                                Codigo <?=$key['id_producto']."<br>"?>
                                                <small>STOCK: <?=$key['cantidad']?></small>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <a href="#" class="btn btn-primary btn-sm">Ver</a>
                                            </div>
                                            <div class="col-6">
                                                <?php if(session()->has('loggedUser')):?>

                                                    <a href="<?=base_url('carrito'.$key['id_producto']) ?>" class="btn btn-primary btn-sm" type="button">
                                                    Comprar
                                                    </a>
                                                
                                                <?php endif; ?>

                                            </div>
    
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