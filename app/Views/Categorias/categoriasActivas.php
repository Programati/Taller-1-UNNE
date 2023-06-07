<?=$this->extend('layouts/main')?>


<?=$this->section('title')?>
Categorias
<?=$this->endSection()?>

<?=$this->section('content')?>

<div class="container">

    <div class="row my-3">

        <div class="col">
            
            <h1 class="text-center">CATEGORIAS ACTIVAS</h1>
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
                        <th>#</th>
                        <th>Nombre_Categoria</th>
                        <th>Descripcion</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                <!-- Si hay datos, mostrar -->
                <?php if($categorias):?>
                    <!-- Recorremos la tabla productos -->
                    <?php foreach($categorias as $key) : ?>
                        <tr>
                            <td><?=$key['id_categoria']?></td>
                            <td><?=$key['nombre_categoria']?></td>
                            <td><?=$key['descripcion_categoria']?></td>
                            <td>
                                <a href="<?=base_url('editarCategoria'.$key['id_categoria']) ?>" class="btn btn-primary btn-sm" type="button">
                                <i class="bi bi-pencil-fill"></i>
                                </a>
                                <a href="<?=base_url('borrarCategoria'.$key['id_categoria']) ?>" class="btn btn-danger btn-sm" type="button">
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
    
    
</div>


<?=$this->endSection()?>