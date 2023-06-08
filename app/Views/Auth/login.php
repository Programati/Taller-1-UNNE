<?= $this->extend('layouts/main') ?>


<?= $this->section('title') ?>
Login
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container my-5">

    <div class="row d-flex justify-content-center">
        <div class="col-12 col-md-7 col-lg-6">


            <div class="card ">
                <h5 class="card-header text-center d-flex justify-content-center align-items-center">
                    <i class="bi bi-person-circle display-6">&nbsp;INGRESAR</i>
                </h5>

                <div class="card-body ">

                    <!-- Enviamos a la funcion check del controller -->
                    <form action="<?= base_url(route_to('controlUsuario')) ?>" method="POST">

                        <?= csrf_field(); ?>

                        <?php if (!empty(session()->getFlashdata('fail'))): ?>
                            <div class="alert alert-danger">
                                <?= session()->getFlashdata('fail'); ?>
                            </div>
                        <?php endif; ?>

                        <div class="form-group mb-3">

                            <label for="email" class="form-label">Correo Electronico</label>
                            <input type="email" id="email" placeholder="ejemplo@email.com" class="form-control"
                                name="email" value="<?= set_value('email'); ?>">
                            <!-- ERRORES DE VALIDACION DEL CONTROLADOR -->
                            <span class="text-danger">
                                <!-- Al parecer VALIDATION es palabra reservada, cambiandole, no mostrar error -->
                                <?= isset($validation) ? mostrar_error($validation, 'email') : " " ?>
                            </span>


                        </div>

                        <div class="form-group mb-3">

                            <label for="password">Contraseña</label>
                            <input type="password" class="form-control mb-3" name="password">
                            <!-- ERRORES DE VALIDACION DEL CONTROLADOR -->
                            <span class="text-danger">
                                <!-- Al parecer VALIDATION es palabra reservada, cambiandole, no mostrar error -->
                                <?= isset($validation) ? mostrar_error($validation, 'password') : " " ?>
                            </span>

                        </div>

                        <div class="form-group mb-3">

                            <button type="submit" class="btn btn-custom">Ingresar</button>

                        </div>


                    </form>

                </div>
                <div class="card-footer text-body-secondary">
                    <div class="row ">
                        <div class="col">
                            <a href="<?= base_url(route_to('formularioRegistro')) ?>" class=""><small>Aun no tienes
                                    cuenta? Ir a crear</small></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection() ?>