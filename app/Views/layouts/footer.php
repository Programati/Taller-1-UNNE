<!-- PIE DE PAGINA -->
<footer class="container-fluid">
    <!-- NAVEGACION - EMPRESA - REDES -->
    <div class="footer-superior row justify-content-center">
        <!-- ENLACES DEL MENU -->
        <?php if(session()->has('loggedUser') && session()->get('id_rol') == 1):?>
            <div class="col-md-3 seccion-izquierda mt-4 mt-md-0">
                <div class="row">
                    <p class="text-uppercase fw-bold fs-5">navegación</p>
                </div>
                <hr class="m-0">
                <div class="row ms-1">
                    <a href="<?php echo base_url('dashboard'); ?>" class="nav-link mt-1 p-1 text-uppercase">Principal</a>
                    <a href="#" class="nav-link mt-1 p-1 text-uppercase">Consultas</a>
                    <a href="#" class="nav-link mt-1 p-1 text-uppercase">Ventas Realizadas</a>
                    <a href="<?=base_url(route_to('usuariosOn'))?>" class="nav-link mt-1 p-1 text-uppercase">Usuarios Activos</a>
                    <a href="<?=base_url(route_to('usuariosOff'))?>" class="nav-link mt-1 p-1 text-uppercase">Usuarios In-Activos</a>
                    <a href="<?=base_url(route_to('crearproducto'))?>" class="nav-link mt-1 p-1 text-uppercase">Crear Prodcutos</a>
                    <a href="<?=base_url(route_to('productosOn'))?>" class="nav-link mt-1 p-1 text-uppercase">Productos Activos</a>
                    <a href="<?=base_url(route_to('productosOff'))?>" class="nav-link mt-1 p-1 text-uppercase">Productos In-Activos</a>
                </div>
            </div>
        <?php else:?>
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
        <?php endif;?>
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

</footer>