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
        <!-- Filtro de categorias -->
        <div class="row my-3 d-flex flex-wrap flex-sm-row-reverse">
            <div class="col-12 col-sm-6 mb-3 mb-md-0">
                <form class="d-flex" role="search" action="<?=base_url(route_to('buscarProducto')) ?>" method="post">
                    <input name="nombre" class="form-control me-2" type="search" placeholder="Buscar producto" aria-label="Search">
                    <button class="btn btn-custom" type="submit">Buscar</button>
                </form>
            </div>    
            <div class="col-12 col-sm-6">
                <div class="row d-flex flex-wrap">
                    <div class="col d-flex justify-content-stretch flex-wrap">
                        <p class="p-0 m-0 fs-5 fw-bolder">Filtrar por categorias: &nbsp;</p>
                        <ul class="navbar-nav nav-categoria">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" href="#">
                                    <?php if($numFiltro == 0) : ?>
                                        Todas
                                    <?php else:?>
                                        <?php foreach ($categorias as $key ) : ?>
                                            <?php if($numFiltro == $key['id_categoria']) : ?>
                                            
                                                <?=$key['nombre_categoria']?>
                                                
                                            <?php endif?>
                                        <?php endforeach ?>
                                    <?php endif?>
                                </a>
                                <ul class="dropdown-menu sub-menu-categoria" aria-labelledby="submenu-consultas">
                                    <li>
                                        <a class="dropdown-item" href="<?=base_url('filtrado'.$a=0) ?>">
                                        Todas
                                        </a>
                                    </li>
                                    <?php foreach ($categorias as $key ) : ?>
                                        <li>
                                            <a class="dropdown-item" href="<?=base_url('filtrado'.$a=$key['id_categoria']) ?>">
                                            <?=$key['nombre_categoria']?>
                                            </a>
                                        </li>
                                    <?php endforeach ?>
        
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            
        </div>
        <?php if(session()->get('success')): ?>
    
            <div class="alert alert-success my-3" role="alert">
                <?=session()->get('success')?>
            </div>

        <?php endif; ?>

        <?php if($productos):?>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 my-3 d-flex justify-content-center">
            
            <!-- Iterador de imagenes -->
            <?php foreach($productos as $key){?>

                <div class="col text-center p-2 p-sm-1 mb-sm-2 m-0 d-flex align-content-stretch contenedor-card">
                    
                    <div class="row">

                        <div class="col d-flex align-items-stretch">

                            <div class="card card-productos">
        
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

                                    <div class="col mb-1 d-flex justify-content-between align-items-center flex-wrap">
                                        <span class="stock-badge badge rounded-pill text-bg-warning">
                                            <small>STOCK <?=$key['cantidad']?></small>
                                        </span>
                                        <p class="card-text fw-bold text-center text-sm-end pe-1 carta-precio">$<?=$key['precio']?></p>
                                    </div>

                                    <?php if(session()->has('loggedUser')):?>
                                    
                                        <div class="col">
                                            <a href="<?=base_url('carrito/'.$key['id_producto'].'/'.$numFiltro) ?>" class="btn btn-sm btn-comprar fw-bold d-block d-sm-none py-2 px-0 m-0" type="button">
                                                <i class="bi bi-bag-check-fill display-6"></i>
                                            </a>
                                            <a href="<?=base_url('carrito/'.$key['id_producto'].'/'.$numFiltro) ?>" class="btn btn-sm btn-comprar fw-bold d-none d-sm-block py-2 px-0 m-0" type="button">
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
        <?php else: ?>
            <div class="container my-5" style="height:40vh">
                <div class="row">
                    <div class="col-2">
                        <p class="display-3">
                            <i class="bi bi-search"></i>
                        </p>
                    </div>
                    <div class="col-10">
                        <p class="fs-2 fw-bolder">No hay publicaciones que coincidan con tu búsqueda</p>
                        <ul>
                            <li>Revisá la ortografía de la palabra</li>
                            <li>Utilizá palabras más genericas</li>
                            <li>Navegá por otras categrias</li>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endif?>
        
    </div>

<?=$this->endSection()?>   