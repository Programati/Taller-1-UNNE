<?=$this->extend('layouts/main')?>


<?=$this->section('title')?>
Registrarse
<?=$this->endSection()?>

<?=$this->section('content')?>


<section>

    <div class="container mb-5">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-8 g-3">                
                
                <div class="card ">
                    <h5 class="card-header text-center d-flex justify-content-center align-items-center">
                        <i class="bi bi-person-vcard display-6"> &nbsp;REGISTRARSE</i>
                        
                    </h5>

                    <div class="card-body ">
                        <form action="<?=base_url(route_to('guardar')) ?>" method="POST">
                        
                            <?= csrf_field(); ?>

                            <?php if(!empty(session()->getFlashdata('fail'))) : ?>
                                <div class="alert alert-danger">
                                    <?= session()->getFlashdata('fail'); ?>
                                </div>
                            <?php endif;?>

                            <?php if(!empty(session()->getFlashdata('success'))) : ?>
                                <div class="alert alert-success">
                                    <?= session()->getFlashdata('success'); ?>
                                </div>
                            <?php endif;?>

                            <!-- Nombre y Apellido -->
                            <div class="row">

                                <div class="form-group col-12 col-md-6 mb-3">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <!--SET_VALUE = Para mantener el ultimo valor ingresado al recargar la página cuando nos da el error de validacion -->
                                    <input type="text" id="nombre" placeholder="Nombre" class="form-control" name="nombre" value="<?=set_value('nombre'); ?>">
                                    <!-- ERRORES DE VALIDACION DEL CONTROLADOR -->
                                    <span class="text-danger">
                                        <!-- Al parecer VALIDATION es palabra reservada, cambiandole, no mostrar error -->
                                        <?=isset($validation) ? mostrar_error($validation, 'nombre') : " " ?>
                                    </span>
                                </div>

                                <div class="form-group col-12 col-md-6 mb-3">
                                    <label for="apellido" class="form-label">Apellido</label>
                                    <!--SET_VALUE = Para mantener el ultimo valor ingresado al recargar la página cuando nos da el error de validacion -->
                                    <input type="text" id="apellido" placeholder="Apellido" class="form-control" name="apellido" value="<?=set_value('apellido'); ?>">
                                    <!-- ERRORES DE VALIDACION DEL CONTROLADOR -->
                                    <span class="text-danger">
                                        <!-- Al parecer VALIDATION es palabra reservada, cambiandole, no mostrar error -->
                                        <?=isset($validation) ? mostrar_error($validation, 'apellido') : " " ?>
                                    </span>
                                </div>

                            </div>
                            
                            <!-- Telefono y DNI -->
                            <div class="row">

                                <div class="form-group col-12 col-md-6 mb-3">
                                    <label for="telefono" class="form-label">Teléfono</label>
                                    <!--SET_VALUE = Para mantener el ultimo valor ingresado al recargar la página cuando nos da el error de validacion -->
                                    <input type="text" id="telefono" placeholder="numeros sin guiones" class="form-control" name="telefono" value="<?=set_value('telefono'); ?>">
                                    <!-- ERRORES DE VALIDACION DEL CONTROLADOR -->
                                    <span class="text-danger">
                                        <!-- Al parecer VALIDATION es palabra reservada, cambiandole, no mostrar error -->
                                        <?=isset($validation) ? mostrar_error($validation, 'telefono') : " " ?>
                                    </span>
                                </div>

                                <div class="form-group col-12 col-md-6 mb-3">
                                    <label for="dni" class="form-label">DNI</label>
                                    <!--SET_VALUE = Para mantener el ultimo valor ingresado al recargar la página cuando nos da el error de validacion -->
                                    <input type="text" id="dni" placeholder="numeros sin puntos" class="form-control" name="dni" value="<?=set_value('dni'); ?>">
                                    <!-- ERRORES DE VALIDACION DEL CONTROLADOR -->
                                    <span class="text-danger">
                                        <!-- Al parecer VALIDATION es palabra reservada, cambiandole, no mostrar error -->
                                        <?=isset($validation) ? mostrar_error($validation, 'dni') : " " ?>
                                    </span>
                                </div>

                            </div>

                            <!-- Calle y Numero -->
                            <div class="row">

                                <div class="form-group col-12 col-md-6 mb-3">
                                    <label for="calle" class="form-label">Calle</label>
                                    <!--SET_VALUE = Para mantener el ultimo valor ingresado al recargar la página cuando nos da el error de validacion -->
                                    <input type="text" id="calle" placeholder="Calle" class="form-control" name="calle" value="<?=set_value('calle'); ?>">
                                    <!-- ERRORES DE VALIDACION DEL CONTROLADOR -->
                                    <span class="text-danger">
                                        <!-- Al parecer VALIDATION es palabra reservada, cambiandole, no mostrar error -->
                                        <?=isset($validation) ? mostrar_error($validation, 'calle') : " " ?>
                                    </span>
                                </div>

                                <div class="form-group col-12 col-md-6 mb-3">
                                    <label for="alturaCalle" class="form-label">Altura</label>
                                    <!--SET_VALUE = Para mantener el ultimo valor ingresado al recargar la página cuando nos da el error de validacion -->
                                    <input type="text" id="alturaCalle" placeholder="Altura / Mz-Casa" class="form-control" name="alturaCalle" value="<?=set_value('alturaCalle'); ?>">
                                    <!-- ERRORES DE VALIDACION DEL CONTROLADOR -->
                                    <span class="text-danger">
                                        <!-- Al parecer VALIDATION es palabra reservada, cambiandole, no mostrar error -->
                                        <?=isset($validation) ? mostrar_error($validation, 'alturaCalle') : " " ?>
                                    </span>
                                </div>

                            </div>

                            <!-- Codigo Postal y Localidad -->
                            <div class="row">

                                <div class="form-group col-12 col-md-6 mb-3">
                                    <label for="codigoPostal" class="form-label">Codigo Postal</label>
                                    <!--SET_VALUE = Para mantener el ultimo valor ingresado al recargar la página cuando nos da el error de validacion -->
                                    <input type="text" id="codigoPostal" placeholder="Podigo Postal" class="form-control" name="codigoPostal" value="<?=set_value('codigoPostal'); ?>">
                                    <!-- ERRORES DE VALIDACION DEL CONTROLADOR -->
                                    <span class="text-danger">
                                        <!-- Al parecer VALIDATION es palabra reservada, cambiandole, no mostrar error -->
                                        <?=isset($validation) ? mostrar_error($validation, 'codigoPostal') : " " ?>
                                    </span>
                                </div>

                                <div class="form-group col-12 col-md-6 mb-3">
                                    <label for="localidad" class="form-label">Localidad/Ciudad</label>
                                    <!--SET_VALUE = Para mantener el ultimo valor ingresado al recargar la página cuando nos da el error de validacion -->
                                    <input type="text" id="localidad" placeholder="Localidad/Ciudad" class="form-control" name="localidad" value="<?=set_value('localidad'); ?>">
                                    <!-- ERRORES DE VALIDACION DEL CONTROLADOR -->
                                    <span class="text-danger">
                                        <!-- Al parecer VALIDATION es palabra reservada, cambiandole, no mostrar error -->
                                        <?=isset($validation) ? mostrar_error($validation, 'localidad') : " " ?>
                                    </span>
                                </div>

                            </div>

                            <!-- Provincia y Pais -->
                            <div class="row">

                                <div class="form-group col-12 col-md-6 mb-3">
                                    <label for="provincia" class="form-label">Provincia</label>
                                    <!--SET_VALUE = Para mantener el ultimo valor ingresado al recargar la página cuando nos da el error de validacion -->
                                    <input type="text" id="provincia" placeholder="Provincia" class="form-control" name="provincia" value="<?=set_value('provincia'); ?>">
                                    <!-- ERRORES DE VALIDACION DEL CONTROLADOR -->
                                    <span class="text-danger">
                                        <!-- Al parecer VALIDATION es palabra reservada, cambiandole, no mostrar error -->
                                        <?=isset($validation) ? mostrar_error($validation, 'provincia') : " " ?>
                                    </span>
                                </div>

                                <div class="form-group col-12 col-md-6 mb-3">
                                    <label for="pais" class="form-label">Pais</label>
                                    <!--SET_VALUE = Para mantener el ultimo valor ingresado al recargar la página cuando nos da el error de validacion -->
                                    <input type="text" id="pais" placeholder="Pais" class="form-control" name="pais" value="<?=set_value('pais'); ?>">
                                    <!-- ERRORES DE VALIDACION DEL CONTROLADOR -->
                                    <span class="text-danger">
                                        <!-- Al parecer VALIDATION es palabra reservada, cambiandole, no mostrar error -->
                                        <?=isset($validation) ? mostrar_error($validation, 'pais') : " " ?>
                                    </span>
                                </div>

                            </div>

                            <!-- Correo -->
                            <div class="row">

                                <!-- Correo -->
                                <div class="form-group col-12 mb-3">
                                    <label for="email" class="form-label">Correo Electronico</label>
                                    <!--SET_VALUE = Para mantener el ultimo valor ingresado al recargar la página cuando nos da el error de validacion -->
                                    <input type="email" id="email" placeholder="ejemplo@email.com" class="form-control" name="email" value="<?=set_value('email'); ?>" >
                                    <!-- ERRORES DE VALIDACION DEL CONTROLADOR -->
                                    <span class="text-danger">
                                        <!-- Al parecer VALIDATION es palabra reservada, cambiandole, no mostrar error -->
                                        <?=isset($validation) ? mostrar_error($validation, 'email') : " " ?>
                                    </span>
                                </div>

                            </div>

                            <!-- Contraseña -->
                            <div class="row">

                                <div class="form-group col-12 col-md-6 mb-3">
                                    <label for="password" class="form-label">Contraseña</label>
                                    <input type="password" id="password" class="form-control" name="password">
                                    <!-- ERRORES DE VALIDACION DEL CONTROLADOR -->
                                    <span class="text-danger">
                                        <!-- Al parecer VALIDATION es palabra reservada, cambiandole, no mostrar error -->
                                        <?=isset($validation) ? mostrar_error($validation, 'password') : " " ?>
                                    </span>
                                </div>
                                
                                <div class="form-group col-12 col-md-6 mb-3">
                                    <label for="password_confirm" class="form-label">Confirmar contraseña</label>
                                    <input type="password" id="password_confirm" class="form-control" name="password_confirm" >
                                    <!-- ERRORES DE VALIDACION DEL CONTROLADOR -->
                                    <span class="text-danger">
                                        <!-- Al parecer VALIDATION es palabra reservada, cambiandole, no mostrar error -->
                                        <?=isset($validation) ? mostrar_error($validation, 'password_confirm') : " " ?>
                                    </span>
                                </div>
                                
                            </div>

                            <div class="row">

                                <div class="form-group col-12 d-flex justify-content-center">

                                    <div class="form-check mb-3 text-center">
                                        <input type="checkbox" name="terminos" id="terminos" class="form-check-input" >
                                        <label for="terminos" class="form-check-label mb-3">Acepto los terminos y condiciones</label>
                                        <!-- ERRORES DE VALIDACION DEL CONTROLADOR -->
                                        <br>
                                        <span class="text-danger">
                                            
                                            <?=isset($validation) ? mostrar_error($validation, 'terminos') : " " ?>
                                        </span>
                                        <br>
                                        <button type="submit" class="btn btn-custom col-12">Enviar</button>
                                    </div>

                                </div>

                            </div>
                            
                        </form>

                    </div>

                    <div class="card-footer text-body-secondary d-flex justify-content-between">
                        <a href="<?=base_url(route_to('login')) ?>" class=""><small>Ya tienes cuenta? Entrar ahora</small></a>
                    </div>
                </div>

            </div>
        </div>
    </div>

</section>

<?=$this->endSection()?>