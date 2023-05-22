<?=$this->extend('layouts/main')?>


<?=$this->section('title')?>
Lista de Productos
<?=$this->endSection()?>

<?=$this->section('content')?>

<div class="container">
    <div class="row my-5">
        <div class="col">
        <?php if(session()->get('success')): ?>

            <div class="alert alert-success my-3" role="alert">
                <?=session()->get('success')?>
            </div>

        <?php endif; ?> 

            <a class="btn btn-primary" href="<?=base_url(route_to('crearproducto'))?>">Nuevo Producto</a>
            <h1 class="text-center">LISTADO DE PRODUCTOS</h1>
            <hr>
            <div class="table-responsive">
                <table class="table table-light">
                <thead class="thead table-secondary">
                    <tr>
                        <th>#</th>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <!-- Si hay datos, mostrar -->
                <?php if($productos):?>
                    <!-- Recorremos la tabla productos -->
                    <?php foreach($productos as $key) : ?>
                        <tr>
                            <td><?=$key['id']?></td>
                            <td>

                                <img    class="img-thumbnail" 
                                        width="100" 
                                        src="<?=base_url()?>assets/img/magicshopctes/productos/uploads/<?=$key['imagen']?>" 
                                        alt="<?=$key['nombre']?>"
                                >    

                            </td>
                            <td><?=$key['nombre']?></td>
                            <td>
                                <a href="<?=base_url('editar'.$key['id']) ?>" class="btn btn-secondary" type="button">Editar</a>
                                <a href="<?=base_url('delete'.$key['id']) ?>" class="btn btn-danger" type="button">Borrar</a>
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