<?=$this->extend('layouts/main')?>


<?=$this->section('title')?>
Lista de Productos
<?=$this->endSection()?>

<?=$this->section('content')?>

<div class="container">

    <div class="row my-5">

        <div class="col">
            
            <h1 class="text-center">PRODUCTOS ACTIVOS</h1>
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
                        <th>Nombre</th>
                        <th>Stock</th>
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
                            <td><?=$key['cantidad']?></td>
                            <td><?=$key['precio']?></td>
                            <td>
                                <a href="<?=base_url('editar'.$key['id_producto']) ?>" class="btn btn-primary btn-sm" type="button">Editar</a>
                                <a href="<?=base_url('delete'.$key['id_producto']) ?>" class="btn btn-danger btn-sm" type="button">Borrar</a>
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

<img    
    class="img-thumbnail" 
    width="50" 
    src="<?=base_url()?>assets/img/magicshopctes/productos/uploads/<?=$key['url_imagen']?>" 
    alt="<?=$key['nombre_producto']?>"
>  