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
                                <th>Nombre_Producto</th>
                                <th class="text-center">Cantidad</th>
                                <th>Precio_Unitario</th>
                                <th>SubTotal</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach(session()->get('productosOrdenados') as $key){?>
                        <!-- Si hay datos, mostrar -->
                            <!-- Recorremos la tabla productos -->
                            <?php foreach($productosBD as $bd){?>
                                <?php if($bd['id_producto'] == $key['id']):?>
                                <tr>
                                    <td><?=$bd['nombre_producto']?></td>
                                    <td class="text-center"><?=$key['cantidad']?></td>
                                    <td>$<?=$bd['precio']?></td>
                                    <td>$<?=$key['subTotal']?></td>
                                    <td>
                                        <a href="<?=base_url('vaciarCarrito'.$key['id']) ?>" class="btn btn-danger btn-sm" type="button">
                                        <i class="bi bi-bag-dash-fill"></i>
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
                <div class="col d-flex justify-content-end">
                    <h5 class="fw-bolder fs-3">Total a pagar $<?=session()->get('SumaPrecioProductos')?></h5>
                </div>
            </div>
            <div class="row">
                <div class="col-5 col-sm-3 d-flex justify-content-stretch">
                    <a href="<?=base_url('confirmarCompra') ?>" class="btn btn-success btn-sm d-block" type="button">
                        <p class="p-0 m-0">Confirmar Compra</p>
                    </a>
                </div>
                <div class="col-5 col-sm-3 d-flex justify-content-stretch align-items-stretch">
                    <a href="<?=base_url('vacioTotalCarrito') ?>" class="btn btn-danger btn-sm d-block" type="button">
                        <p class="p-0 m-0">Vaciar Carrito</p>
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
                    <a href="<?=base_url('catalogo') ?>" class="btn btn-custom" type="button">Catalogo</a>
                </div>
            </div>
        <?php endif?>
        
            

    </div>

<?=$this->endSection()?>