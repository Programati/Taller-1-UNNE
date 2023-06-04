<?=$this->extend('layouts/main')?>


<?=$this->section('title')?>
Lista de Productos
<?=$this->endSection()?>

<?=$this->section('content')?>

<div class="container">
    <div class="row my-3">
        <div class="col">
            
            <h1 class="text-center">PRODUCTOS DESACTIVADOS</h1>
            <hr>

            <?php if(session()->get('success')): ?>
    
                <div class="alert alert-success my-3" role="alert">
                    <?=session()->get('success')?>
                </div>
    
            <?php endif; ?> 

            <div class="table-responsive">
                <table class="table table-light">
                <thead class="thead table-secondary">
                    <tr>
                        <th>N°</th>
                        <th>Nombre/Producto</th>
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
                        <tr>
                        <td><?=$key['id_producto']?></td>
                            <td><?=$key['nombre_producto']?></td>
                            <td class="text-center"><?=$key['cantidad']?></td>
                            <td>$<?=$key['precio']?></td>
                            <td>
                                <a href="<?=base_url('editar'.$key['id_producto']) ?>" class="btn btn-primary btn-sm" type="button">
                                <i class="bi bi-pencil-fill"></i>
                                </a>
                                <a href="<?=base_url('activar'.$key['id_producto']) ?>" class="btn btn-success btn-sm" type="button">
                                <i class="bi bi-plus-lg"></i>
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
</div>


<?=$this->endSection()?>