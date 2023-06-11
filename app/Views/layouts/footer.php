<!-- PIE DE PAGINA -->
<footer class="">
    
    <?php if(session()->has('loggedUser') && session()->get('id_rol') == 1):?>
        <div class="container-fluid">
            <div class="row footer-admin">
                <div class="col">
                    <div class="row">
                        <div class="col d-flex justify-content-center">
                            <p class="display-3"><span class="magic">Magic</span><span class="shop">Shop</span></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col d-flex justify-content-end">
                            <p>
                                <i class="bi bi-c-circle"></i><small> COPYRIGHT <?=date('Y')?> |MartinezMatiasDevelop|</small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    <?php else:?>
    <div class="footer-usuario container-fluid">

        <div class="footer-superior row justify-content-center">
            <!-- ENLACES DEL MENU -->
            <div class="col-md-3 seccion-izquierda mt-4 mt-md-0">
                    <div class="row">
                        <p class="text-uppercase fw-bold fs-5">navegación</p>
                    </div>
                    <hr class="m-0">
                    <div class="row ms-1">
                        <a href="<?php echo base_url(); ?>" class="nav-link mt-1 p-1 text-uppercase">Principal</a>
                        <a href="<?= base_url(route_to('quienes_somos')) ?>" class="nav-link mt-1 p-1 text-uppercase">Quienes Somos</a>
                        <a href="<?= base_url(route_to('comercializacion')) ?>" class="nav-link mt-1 p-1 text-uppercase">Comercialización</a>
                        <a href="<?= base_url(route_to('contacto')) ?>" class="nav-link mt-1 p-1 text-uppercase">Contacto</a>
                        <a href="<?= base_url(route_to('terminos_y_usos'))?>" class="nav-link mt-1 p-1 text-uppercase">Términos y usos</a>
                        <a href="<?= base_url(route_to('terminos_y_usos'))?>" class="nav-link mt-1 p-1 text-uppercase">Términos y usos</a>
                        <a href="<?= base_url(route_to('catalogo'))?>" class="nav-link mt-1 p-1 text-uppercase">Catalogo</a>
                    </div>
                </div>
            
            <!-- PARTE DEL MEDIO -->
            <div class="col-md-6 seccion-medio mt-4 mt-md-0">
            <p class="display-3"><span class="magic">Magic</span><span class="shop">Shop</span></p>
            </div>
            <!-- PARTE DERECHA -->
            <div class="col-md-3 seccion-derecha mt-4 mt-md-0">
                <div class="row">
                    <p class="text-uppercase fw-bold fs-5">REDES SOCIALES</p>
                </div>
                <hr class="m-0">
                <div class="row iconos-redes-sociales d-flex flex-wrap justify-content-center">
                    <a href="#" class="nav-link">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="#" class="nav-link">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="#" class="nav-link">
                        <i class="bi bi-whatsapp"></i>
                    </a>
                </div>
            </div>
        </div>
        <hr>
        <!-- COPY - AÑO - DEVELOP -->
        <div class="footer-inferior row text-break">
            <div class="col col-md-3 offset-md-9 text-wrap">
                <p>
                    <i class="bi bi-c-circle"></i><small> COPYRIGHT 2023 |MartinezMatiasDevelop|</small>
                </p>
            </div>
        </div>
    </div>
    <?php endif;?>
    

</footer>