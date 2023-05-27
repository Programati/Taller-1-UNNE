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

                            <input type="hidden" name="id" value="<?=$producto['id_producto']; ?>">

                            <!-- NOMBRE Categoria Precio y Cantidad-->
                            <div class="row">

                                <div class="form-group col-12 col-md-5 mb-3">
    
                                    <label for="nombre" class="form-label">Nombre del producto</label>
                                    <input type="name" id="nombre" placeholder="Ingresar nombre" class="form-control" name="nombre" value="<?=$producto['nombre_producto']; ?>">
                                    <!-- ERRORES DE VALIDACION DEL CONTROLADOR -->
                                    <span class="text-danger">
                                        <!-- Al parecer VALIDATION es palabra reservada, cambiandole, no mostrar error -->
                                        <?=isset($validation) ? mostrar_error($validation, 'nombre') : " " ?>
                                    </span>
                                    
    
                                </div>

                                <div class="form-group col-12 col-md-3 mb-3">

                                    <label for="categoria" class="form-label">Categoria</label>
                                    <select class="form-select" aria-label="Default select example" name="categoria" id="categoria">

                                        <option value="<?=$categoriaEditar['id_categoria']?>" ><?=$categoriaEditar['nombre_categoria']?></option>
                                        <?php foreach($categorias as $key): ?>
                                        <option value="<?=$key['id_categoria']?>" > <?=$key['nombre_categoria']?></option>
                                        <?php endforeach;?>
                                    </select>
                                    <!-- ERRORES DE VALIDACION DEL CONTROLADOR -->
                                    <span class="text-danger">
                                        <!-- Al parecer VALIDATION es palabra reservada, cambiandole, no mostrar error -->
                                        <?=isset($validation) ? mostrar_error($validation, 'categoria') : " " ?>
                                    </span>                
    
                                </div>

                                <div class="form-group col-12 col-md-2 mb-3">
                                    <label for="precio" class="form-label">Precio</label>
                                    <!--SET_VALUE = Para mantener el ultimo valor ingresado al recargar la página cuando nos da el error de validacion -->
                                    <input type="number" id="precio" placeholder="$" class="form-control" name="precio" value="<?=$producto['precio']; ?>">
                                    <!-- ERRORES DE VALIDACION DEL CONTROLADOR -->
                                    <span class="text-danger">
                                        <!-- Al parecer VALIDATION es palabra reservada, cambiandole, no mostrar error -->
                                        <?=isset($validation) ? mostrar_error($validation, 'precio') : " " ?>
                                    </span>
                                </div>

                                <div class="form-group col-12 col-md-2 mb-3">
                                    <label for="cantidad" class="form-label">Cantidad</label>
                                    <!--SET_VALUE = Para mantener el ultimo valor ingresado al recargar la página cuando nos da el error de validacion -->
                                    <input type="number" id="cantidad" placeholder="" class="form-control" name="cantidad" value="<?=$producto['cantidad']; ?>">
                                    <!-- ERRORES DE VALIDACION DEL CONTROLADOR -->
                                    <span class="text-danger">
                                        <!-- Al parecer VALIDATION es palabra reservada, cambiandole, no mostrar error -->
                                        <?=isset($validation) ? mostrar_error($validation, 'cantidad') : " " ?>
                                    </span>
                                </div>

                            </div>

                            <!-- IMAGEN -->
                            <div class="row">

                                <div class="form-group col-12 col-md-10 mb-3">
    
                                    <label for="img">Imagen:</label>
                                    <br>
                                    <img    class="img-thumbnail" 
                                        width="100" 
                                        src="<?=base_url()?>assets/img/magicshopctes/productos/uploads/<?=$producto['url_imagen']?>" 
                                        alt="<?=$producto['nombre_producto']?>"
                                    >
                                    <br>

                                    <input type="file" class="form-control mb-3" name="img" id="img">
                                    <!-- ERRORES DE VALIDACION DEL CONTROLADOR -->
                                    <span class="text-danger">
                                        <!-- Al parecer VALIDATION es palabra reservada, cambiandole, no mostrar error -->
                                        <?=isset($validation) ? mostrar_error($validation, 'img') : " " ?>
                                    </span>
    
                                </div>

                                <div class="form-group col-12 col-md-2 mb-3">

                                    <label class="form-label" for="">Estado</label>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="estado" id="activo" value="1" <?php if($producto['activo'] == 1):?> checked <?php endif;?>>
                                        <label class="form-check-label" for="activo">On</label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="estado" id="inactivo" value="0" <?php if($producto['activo'] == 0):?> checked <?php endif;?>>
                                        <label class="form-check-label" for="inactivo">Off</label>
                                    </div>
    
                                </div>

                            </div>

                            <!-- Descripcion -->
                            <div class="row">
                                
                                <div class="form-group mb-3">
    
                                    <label for="descripcion" class="form-label">Descripcion del producto</label>
                                    <textarea name="descripcion" id="" cols="15" rows="5" class="form-control" ><?=$producto['descripcion_producto']; ?></textarea>
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
                                    <a href="<?=base_url('productosOn') ?>" class="btn btn-danger">CANCELAR <i class="bi bi-check"></i></a>
    
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


