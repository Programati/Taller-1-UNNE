<?=$this->extend('layouts/main')?>


<?=$this->section('title')?>
Lista de Productos
<?=$this->endSection()?>

<?=$this->section('content')?>

<div class="container mt-2">

    <div class="row">
        <div class="col">
            <h1 class="text-center">PRODUCTOS ACTIVOS</h1>
            <hr>
        </div>
    </div>
    <!-- Filtro de Nombres -->
    <div class="row my-3 d-flex justify-content-between">

        <div class="col-12 col-sm-6 g-sm-0 d-flex align-items-end">
            
            <a href="<?=base_url('productosOn') ?>" class="btn btn-custom btn-sm" type="button">
                Traer todos
            </a>
        </div>

        <div class="col-12 col-sm-6 g-sm-0">
            <div class="row g-0">
                <div class="col d-flex flex-row-reverse">
                    Filtrar por nombre de producto
                </div>
            </div>
            <div class="row g-0">
                <div class="col d-flex justify-content-end flex-fill flex-wrap">
                    <form class="d-flex" role="search" action="<?=base_url(route_to('buscarProductoActivo')) ?>" method="POST">
                        <input name="nombre" class="form-control me-2" type="search" placeholder="Buscar usuario" aria-label="Search">
                        <button class="btn btn-custom btn-sm" type="submit">Buscar</button>
                    </form>
                </div>
            </div>
        </div> 

    </div>
    <?php if($productos):?>
    <div class="row my-3">

        <div class="col">
            
            <?php if(session()->get('success')): ?>
    
                <div class="alert alert-success my-3" role="alert">
                    <?=session()->get('success')?>
                </div>
    
            <?php endif; ?> 
            
            <div class="table-responsive">
                <table class="table table-light">
                <thead class="thead table-secondary">
                    <tr>
                        <th>#</th>
                        <th>Nombre_Producto</th>
                        <th class="text-center">Stock</th>
                        <th>Precio</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                <!-- Si hay datos, mostrar -->
                <?php if($productos):?>
                    <!-- Recorremos la tabla productos -->
                    <?php foreach($productos as $key) : ?>
                        <tr class="<?php if($key['cantidad'] <= 0):?>
                                    table-danger
                                <?php endif?>"
                            >
                            <td><?=$key['id_producto']?></td>
                            <td><?=$key['nombre_producto']?></td>
                            <td class="text-center">
                                <?=$key['cantidad']?>
                            </td>
                            <td>$<?=$key['precio']?></td>
                            <td>
                                <a href="<?=base_url('editar'.$key['id_producto']) ?>" class="btn btn-primary btn-sm" type="button">
                                <i class="bi bi-pencil-fill"></i>
                                </a>
                                <a href="<?=base_url('delete'.$key['id_producto']) ?>" class="btn btn-danger btn-sm" type="button">
                                <i class="bi bi-trash-fill"></i>    
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                <?php endif;?>

                </tbody>
                </table>
            </div>

        </div>

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
                    <p class="fs-2 fw-bolder">No hay productos ACTIVOS que coincidan con tu búsqueda</p>
                    <ul>
                        <li>Revisá la ortografía de la palabra</li>
                        <li>Utilizá palabras más genericas</li>
                    </ul>
                </div>
            </div>
        </div>
    <?php endif?>
    
    
</div>


<?=$this->endSection()?>