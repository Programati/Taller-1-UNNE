<?=$this->extend('layouts/main')?>


<?=$this->section('title')?>
    Carrito
<?=$this->endSection()?>

<?=$this->section('content')?>

    <div class="container mt-2 mb-5">

        <div class="row">
            <div class="col">
                <h1 class="text-center">Carrito de compras</h1>
                <hr>
            </div>
        </div>

        <?php if( session()->get('productos') != null):?>
            
            <div class="row my-5">

                <div class="col">
                    
                    <div class="table-responsive">
                        <table class="table table-light">
                        <thead class="thead table-secondary">
                            <tr>
                                <th>Cantidad</th>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>SubTotal</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach(session()->get('productosOrdenados') as $key){?>
                        <!-- Si hay datos, mostrar -->
                            <!-- Recorremos la tabla productos -->
                            <?php foreach($productosBD as $bd){?>
                                <?php if($bd['id_producto'] == $key['id']):?>
                                <tr>
                                    <td><?=$key['cantidad']?></td>
                                    <td><?=$bd['nombre_producto']?></td>
                                    <td><?=$bd['precio']?></td>
                                    <td><?=$key['subTotal']?></td>
                                    <td>
                                        <a href="<?=base_url('vaciarCarrito'.$key['id']) ?>" class="btn btn-danger btn-sm" type="button">
                                        <i class="bi bi-x"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php endif;?>
                            
                            <?php };?>
                                        
                        <?php };?>


                        </tbody>
                        </table>
                    </div>

                </div>

            </div>
            <div class="row">
                <div class="col">
                    <h5>Total $<?=session()->get('SumaPrecioProductos')?></h5>
                </div>
            </div>
            <div class="row">
                <div class="col d-flex flex-row-reverse">
                    <a href="<?=base_url('confirmarCompra') ?>" class="btn btn-success" type="button">
                        <i class="bi bi-cart-check-fill">Comprar Carrito</i>
                    </a>
                </div>
                <div class="col">
                    <a href="<?=base_url('vacioTotalCarrito') ?>" class="btn btn-danger" type="button">
                        <i class="bi bi-cart-x-fill"> Vaciar Carrito</i>
                    </a>
                </div>
            </div>

        <?php else:?>
            <div class="row d-flex justify-content-center" style="height: 50vh">
                <div class="col-12">
                    <h1>Tu carrito está vacío</h1>
                    <small>¡Miles de productos de esperan!, ve a la seccion catálogo</small>
                </div>
                <div class="col-12">
                    <a href="<?=base_url('catalogo') ?>" class="btn btn-primary" type="button">Catalogo</a>
                </div>
            </div>
        <?php endif?>
        
            

    </div>

<?=$this->endSection()?>