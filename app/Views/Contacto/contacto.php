<?=$this->extend('layouts/main')?>


<?=$this->section('title')?>
Contacto
<?=$this->endSection()?>

<?=$this->section('content')?>

<div class="container">
    <!-- CABECERA -->
    <div class="row m-5 align-items-center text-wrap">

        <div class="col-12 container titulo-contacto text-center">
            <div class="row">
                <div class="col-12 col-md-5 text-center text-md-end">
                <img src="assets/img/magicshopctes/logo/logo.png"  width="100" alt="Logo de la página web">
                </div>
                <div class="col-12 col-md-7 text-md-start text-center">
                    <p class="display-2">
                        <span class="magic">Magic</span><span class="shop">Shop</span>
                    </p>
                </div>
            </div>
        </div>

        <hr>

        <div class="col-12 col-md-6 info-contacto">
            <p class="fs-4"><i class="bi bi-geo-alt"></i> Corrientes Capital</p>
            <p class="fs-4"><i class="bi bi-house-door"></i> B° Laguna Seca</p>
            <p class="fs-4"><i class="bi bi-whatsapp"></i> 3794-112233</p>
            <p class="fs-4"><i class="bi bi-instagram"></i> @magicshopctes</p>
        </div>

        <div class="col-12 col-md-6 descripcion-contacto">
            <p class="fs-6 fst-italic">
                Para envios a domicilio dentro de la ciudad tenés que contacterte vía <strong>wahtsapp</strong> para coordinar el precio del envío. No dudes en consultarnos en redes sociales o via correo electronico.
            </p>
        </div>

        <hr>
    </div>
    <?php if(session()->get('success')): ?>

        <div class="alert alert-success" role="alert">
            <?=session()->get('success')?>
        </div>

    <?php endif; ?> 
    <!-- CUERPO -->
    <div class="row container d-flex align-items-stretch">
        <!-- DUEÑO Y MAPA -->
        <div class="col-12 col-lg-6 col-xl-6 mb-5">
            <div class="row">
                <!-- CARD DUEÑO -->
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="assets/img/magicshopctes/staff/mujer_1.jpg" class="img-fluid rounded-start" alt="...">
                        </div>

                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Cristina Betancourt</h5>
                                <p class="card-text">Hola soy la dueña de <span class="magic">Magic</span><span class="shop">Shop</span> deseo que encuentres lo que buscas, o simplemente, pedi tu diseño y lo plasmamos en lo que vos quieras.</p>
                                <p class="card-text"><small class="text-body-secondary">Creatividad, experiencia y elegancia</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- MAPA -->
            <div class="row">
                <div class="card text-center">

                    <div class="card-header">
                        Feria a la que siempre asistimos
                    </div>
                    <div class="card-body">

                        <div class="ratio ratio-4x3">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3540.130209415391!2d-58.8492372264757!3d-27.465205364163896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94456cba732018df%3A0x6bd1c7906478f9a3!2sParque%20Camba%20Cua!5e0!3m2!1ses-419!2sar!4v1682105672808!5m2!1ses-419!2sar" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            
                        </div>

                    </div>
                </div>
            </div>

        </div>

        <!-- CARD que encierra el formulario -->
        <div class="col-12 col-lg-6 col-xl-6 mb-5 d-flex align-items-stretch">

            <div class="card col-12">
                <div class="card-header">
                    <p class="fs-3 text-center"><i class="bi bi-envelope-paper"></i>Contáctate con nosotros</p>
                </div>
                <div class="card-body">
                    
                    <?php if(session()->has('loggedUser')):?>
                        <!-- FORMULARIO PERSONAS LOGUEADAS-->
                        <p class="card-text"><i class="bi bi-braces-asterisk"> </i>Recibirás una respuesta fiable y de calidad.</p>
                        <p class="card-text"><i class="bi bi-braces-asterisk"> </i>Tu consulta será respondida en máximo 48hs.</p>
                        <p class="card-text"><i class="bi bi-braces-asterisk"> </i>Checka tu correo, recibiras una notificación cuando te contestemos.</p>

                        <form action="<?=base_url('consulta') ?>" method="POST">
                            <!-- Asunto  -->
                            <div class="row mb-1">
                                <div class="col-12">
                                    <label for="asunto" class="col-form-label">Asunto</label>
                                </div>
                                <div class="col-12">
                                    <input type="text" class="form-control" id="asunto" name="asunto" value="<?=set_value('asunto')?>">
                                </div>
                                <!-- ERRORES DE VALIDACION DEL CONTROLADOR -->
                                <span class="text-danger">
                                    <!-- Al parecer VALIDATION es palabra reservada, cambiandole, no mostrar error -->
                                    <?=isset($validation) ? mostrar_error($validation, 'asunto') : " " ?>
                                </span>
                            </div>
                            <!-- AREA DE MENSAJE -->
                            <div class="row mb-3">
                                <div class="col-12">
                                    <label for="mensaje" class="form-label">Mensaje</label>
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control" id="mensaje" rows="5" name="mensaje" value="<?=set_value('mensaje'); ?>"></textarea>
                                    <!-- ERRORES DE VALIDACION DEL CONTROLADOR -->
                                    <span class="text-danger">
                                        <!-- Al parecer VALIDATION es palabra reservada, cambiandole, no mostrar error -->
                                        <?=isset($validation) ? mostrar_error($validation, 'mensaje') : " " ?>
                                    </span>
                                </div>
                            </div>
                            <!-- BOTON ENVIAR -->
                            <div class="row mb-1">
                                <div class="col">
                                    <button type="submit" class="btn btn-custom mb-3">Enviar</button>
                                </div>
                            </div>
            
                        </form>
                    <?php else:?>
                        <!-- FORMULARIO NORMAL-->
                        <form action="<?=base_url('consulta') ?>" method="POST">
                            <!-- Nombre  -->
                            <div class="row mb-1">
                                <div class="col-12">
                                    <label for="nombre" class="col-form-label">Nombre</label>
                                </div>
                                <div class="col-12">
                                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?=set_value('nombre')?>">
                                </div>
                                <!-- ERRORES DE VALIDACION DEL CONTROLADOR -->
                                <span class="text-danger">
                                    <!-- Al parecer VALIDATION es palabra reservada, cambiandole, no mostrar error -->
                                    <?=isset($validation) ? mostrar_error($validation, 'nombre') : " " ?>
                                </span>
                            </div>
                            <!-- Asunto  -->
                            <div class="row mb-1">
                                <div class="col-12">
                                    <label for="asunto" class="col-form-label">Asunto</label>
                                </div>
                                <div class="col-12">
                                    <input type="text" class="form-control" id="asunto" name="asunto" value="<?=set_value('asunto')?>">
                                </div>
                                <!-- ERRORES DE VALIDACION DEL CONTROLADOR -->
                                <span class="text-danger">
                                    <!-- Al parecer VALIDATION es palabra reservada, cambiandole, no mostrar error -->
                                    <?=isset($validation) ? mostrar_error($validation, 'asunto') : " " ?>
                                </span>
                            </div>
                            <!-- MAIL -->
                            <div class="row mb-1">
                                <div class="col-12">
                                    <label for="email" class="col-form-label">Email</label>
                                </div>
                                <div class="col-12">
                                    <input type="email" class="form-control" id="email"  name="email" value="<?=set_value('email')?>">
                                </div>
                                <!-- ERRORES DE VALIDACION DEL CONTROLADOR -->
                                <span class="text-danger">
                                    <!-- Al parecer VALIDATION es palabra reservada, cambiandole, no mostrar error -->
                                    <?=isset($validation) ? mostrar_error($validation, 'email') : " " ?>
                                </span>
                            </div>
                            <!-- AREA DE MENSAJE -->
                            <div class="row mb-3">
                                <div class="col-12">
                                    <label for="mensaje" class="form-label">Mensaje</label>
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control" id="mensaje" rows="5" name="mensaje" value="<?=set_value('mensaje'); ?>"></textarea>
                                    <!-- ERRORES DE VALIDACION DEL CONTROLADOR -->
                                    <span class="text-danger">
                                        <!-- Al parecer VALIDATION es palabra reservada, cambiandole, no mostrar error -->
                                        <?=isset($validation) ? mostrar_error($validation, 'mensaje') : " " ?>
                                    </span>
                                </div>
                            </div>
                            
                            <!-- BOTON ENVIAR -->
                            <div class="row mb-1">
                                <div class="col">
                                    <button type="submit" class="btn btn-custom mb-3">Enviar</button>
                                </div>
                            </div>
            
                        </form>
                    <?php endif;?>
                
                </div>
                <div class="card-footer">Su consulta no nos molesta</div>
            </div>
        
        </div>
        

    </div>

</div>

<?=$this->endSection()?>
