<?=$this->extend('layouts/main')?>


<?=$this->section('title')?>
EDICION DE PRODUCTOS
<?=$this->endSection()?>

<?=$this->section('content')?>

<div class="container">

    <div class="row my-5">

        <div class="col">

            <div class="card ">
                    <h5 class="card-header text-center d-flex justify-content-center align-items-center">
                    <i class="bi bi-ui-checks"></i>
                        Editar datos del producto
                    </h5>

                    <div class="card-body ">
                        
                        <!-- Enviamos a la funcion check del controller -->
                        <form action="<?=base_url(route_to('actualizar')) ?>" method="POST" enctype="multipart/form-data">
                        
                            <?= csrf_field(); ?>

                            <?php if(!empty(session()->getFlashdata('fail'))) : ?>
                                <div class="alert alert-danger">
                                    <?= session()->getFlashdata('fail'); ?>
                                </div>
                            <?php endif;?>

                            <input type="hidden" name="id" value="<?=$producto['id']; ?>">

                            <div class="form-group mb-3">

                                <label for="nombre" class="form-label">Nombre del producto</label>
                                <input type="name" id="nombre" placeholder="Ingresar nombre" class="form-control" name="nombre" value="<?=$producto['nombre']; ?>">
                                <!-- ERRORES DE VALIDACION DEL CONTROLADOR -->
                                <span class="text-danger">
                                    <!-- Al parecer VALIDATION es palabra reservada, cambiandole, no mostrar error -->
                                    <?=isset($validation) ? mostrar_error($validation, 'nombre') : " " ?>
                                </span>
                                

                            </div>

                            <div class="form-group">

                                <label for="imagen">Imagen:</label>
                                <br>
                                <img    class="img-thumbnail" 
                                        width="100" 
                                        src="<?=base_url()?>assets/img/magicshopctes/productos/uploads/<?=$producto['imagen']?>" 
                                        alt="<?=$producto['nombre']?>"
                                >
                                <br>
                                <input type="file" class="form-control mb-3" name="imagen" id="imagen">
                                <!-- ERRORES DE VALIDACION DEL CONTROLADOR -->
                                <span class="text-danger">
                                    <!-- Al parecer VALIDATION es palabra reservada, cambiandole, no mostrar error -->
                                    <?=isset($validation) ? mostrar_error($validation, 'imagen') : " " ?>
                                </span>

                            </div>

                            <div class="form-group mb-3">

                                <button type="submit" class="btn btn-success">GUARDAR <i class="bi bi-check"></i></button>

                            </div>


                        </form>
                        
                    </div>

                    <div class="card-footer text-body-secondary">
                        <div class="row ">
                            <div class="col">
                                <a href="<?=base_url('productos') ?>" class=""><small>Volver a Lista</small></a>                            
                            </div>
                        </div>
                    </div>

            </div>
        
        </div>

    </div>

</div>

<?=$this->endSection()?>


