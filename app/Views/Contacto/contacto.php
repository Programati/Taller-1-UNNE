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
    <!-- CUERPO -->
    <div class="row align-items-center m-2">
        <!-- DUEÑO Y MAPA -->
        <div class="col-12 col-lg-6 container mb-5">
            <div class="row">
                <!-- CARD DUEÑO -->
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="assets/img/magicshopctes/staff/mujer_1.png" class="img-fluid rounded-start" alt="...">
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
            <div class="row ratio ratio-4x3">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3540.130209415391!2d-58.8492372264757!3d-27.465205364163896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94456cba732018df%3A0x6bd1c7906478f9a3!2sParque%20Camba%20Cua!5e0!3m2!1ses-419!2sar!4v1682105672808!5m2!1ses-419!2sar" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

        </div>
        <!-- FORMULARIO -->
        <div class="formulario-contenedor container col-12 col-lg-6 mb-5">
            <div class="row mb-3">
                <p class="fs-3 text-center"><i class="bi bi-envelope-paper"></i>Contáctenos via correo</p>
            </div>
            <form class="p-3" method="post" action="<?= base_url().route_to('envioMensaje') ?>">
                <!-- Nombre y Apellido -->
                <div class="row mb-3">
                    <div class="col-12 col-lg-6">
                        <div class="row mb-3">
                            <div class="col-12 col-md-4">
                                <label for="nombre" class="col-form-label">Nombre</label>
                            </div>
                            <div class="col-12 col-md-8">
                                <input type="text" class="form-control" placeholder="Nombre" id="nombre" name="nombre">
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="row mb-3">
                            <div class="col-12 col-md-4">
                                <label for="apellido" class="col-form-label">Apellido</label>
                            </div>
                            <div class="col-12 col-md-8">
                                <input type="text" class="form-control" placeholder="Apellido" id="apellido" name="apellido">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Ciudad telefono -->
                <div class="row mb-3">
                    <div class="col-12 col-lg-6">
                        <div class="row mb-3">
                            <div class="col-12 col-md-4">
                                <label for="ciudad" class="col-form-label">Ciudad</label>
                            </div>
                            <div class="col-12 col-md-8">
                                <input type="text" class="form-control" placeholder="Ciudad" id="ciudad" name="ciudad">
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="row mb-3">
                            <div class="col-12 col-md-4">
                                <label for="telefono" class="col-form-label">Telefono</label>
                            </div>
                            <div class="col-12 col-md-8">
                                <input type="text" class="form-control" placeholder="+(54)" id="telefono" name="telefono">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- MAIL -->
                <div class="row mb-3">
                    <div class="col-12 col-md-2">
                        <label for="email" class="col-form-label">Email</label>
                    </div>
                    <div class="col-12 col-md-10">
                        <input type="email" class="form-control" id="email" placeholder="nombre@email.com" name="email">
                    </div>
                </div>
                <!-- AREA DE MENSAJE -->
                <div class="row mb-3">
                    <div class="col-12">
                        <label for="mensaje" class="form-label">Mensaje</label>
                    </div>
                    <div class="col-12">
                        <textarea class="form-control" id="mensaje" rows="4" name="mensaje"></textarea>
                    </div>
                </div>
                <!-- BOTON ENVIAR -->
                <div class="row mb-3">
                    <div class="col">
                    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#myModal">Enviar</button>
                    </div>
                </div>

                <!-- The Modal -->
                <div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                
                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title" id="staticBackdropLabel">Se ah enviado el mensaje</h4>
                        <button type="post" class="btn-close" data-bs-dismiss="modal"></button>
                      </div>
                
                      <!-- Modal body -->
                      <div class="modal-body">
                        Gracias por contactarnos!
                      </div>
                
                      <!-- Modal footer -->
                      <div class="modal-footer">
                        <button type="post" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                      </div>
                
                    </div>
                  </div>
                </div>
            </form>

        </div>
        

    </div>

</div>
