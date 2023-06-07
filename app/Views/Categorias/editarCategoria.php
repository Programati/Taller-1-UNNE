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
                        <form action="<?=base_url(route_to('actualizarCategoria')) ?>" method="POST" >
                        
                            <?= csrf_field(); ?>

                            <?php if(!empty(session()->getFlashdata('fail'))) : ?>
                                <div class="alert alert-danger">
                                    <?= session()->getFlashdata('fail'); ?>
                                </div>
                            <?php endif;?>

                            <input type="hidden" name="id" value="<?=$categoria['id_categoria']; ?>">

                            <!-- NOMBRE Categoria Precio y Cantidad-->
                            <div class="row">
                                <!-- NOMBRE -->
                                <div class="form-group col-12 col-md-5 mb-3">
    
                                    <label for="nombre" class="form-label">Nombre de la categoria</label>
                                    <input type="name" id="nombre" placeholder="Ingresar nombre" class="form-control" name="nombre" value="<?=$categoria['nombre_categoria']; ?>">
                                    <!-- ERRORES DE VALIDACION DEL CONTROLADOR -->
                                    <span class="text-danger">
                                        <!-- Al parecer VALIDATION es palabra reservada, cambiandole, no mostrar error -->
                                        <?=isset($validation) ? mostrar_error($validation, 'nombre') : " " ?>
                                    </span>
                                    
                                    <div class="form-group col-12 col-md-2 mb-3">

                                        <label class="form-label" for="">Estado</label>

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="estado" id="activo" value="1" <?php if($categoria['activo'] == 1):?> checked <?php endif;?>>
                                            <label class="form-check-label" for="activo">On</label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="estado" id="inactivo" value="0" <?php if($categoria['activo'] == 0):?> checked <?php endif;?>>
                                            <label class="form-check-label" for="inactivo">Off</label>
                                        </div>

                                    </div>
                                </div>
                                

                            </div>


                            <!-- Descripcion -->
                            <div class="row">
                                
                                <div class="form-group mb-3">
    
                                    <label for="descripcion" class="form-label">Descripcion de la categoria</label>
                                    <textarea name="descripcion" id="" cols="15" rows="5" class="form-control" ><?=$categoria['descripcion_categoria']; ?></textarea>
                                    <!-- ERRORES DE VALIDACION DEL CONTROLADOR -->
                                    <span class="text-danger">
                                        <!-- Al parecer VALIDATION es palabra reservada, cambiandole, no mostrar error -->
                                        <?=isset($validation) ? mostrar_error($validation, 'descripcion') : " " ?>
                                    </span>
                                    
                                </div>
                            
                            </div>

                            <!-- BOTON GUARDAR -->
                            <div class="row">

                                <div class="form-group mb-3">

                                    <button type="submit" class="btn btn-success">GUARDAR <i class="bi bi-check"></i></button>
                                    <a 
                                        href="<?php if($categoria['activo'] == 1):?> 
                                                <?=base_url('categoriasOn')?> 
                                            <?php else:?>
                                                <?=base_url('categoriasOff')?>
                                            <?php endif ?>" 
                                        class="btn btn-danger"
                                        >
                                        CANCELAR
                                        <i class="bi bi-x"></i>
                                    </a>
    
                                </div>

                            </div>


                        </form>
                        
                    </div>

                    <div class="card-footer text-body-secondary">
                        <div class="row ">
                            <div class="col">
                                <small>Controlar todos los campos</small></a>
                            </div>
                        </div>
                    </div>

            </div>
        
        </div>

    </div>

</div>

<?=$this->endSection()?>


