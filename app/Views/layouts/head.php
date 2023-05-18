<!-- Barra de navegación -->
<nav class=" header navbar navbar-expand-md navbar-light sticky-top">
    <!-- Contenedor interno de la barra -->
    <div class="container-fluid">
      <a class="navbar-brand text-white"  href="<?php echo base_url(); ?>"><!-- LOGO/NOMBRE EMPRESA-->
          <span class="magic">Magic</span><span class="shop">Shop</span>
      </a>
        <!-- Boton que se va a mostrar en los dispositivos pequeños -->
      <button class="navbar-toggler btn btn-outline-light active" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-Toggler" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Inicio de los elementos de la barra -->
      <div class="collapse navbar-collapse" id="navbar-Toggler">
        <!-- Elementos del texto parte de UL -->
        <ul class="navbar-nav d-flex justify-content-center align-item-center ms-auto">
          <li class="nav-item">
            <a class="nav-link"  href="<?php echo base_url(); ?>">principal</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url(route_to('quienes_somos'))?>">quienes somos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url(route_to('comercializacion')) ?>">comercialización</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url(route_to('contacto'))?>">contacto</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url(route_to('terminos_y_usos'))?>" >términos y usos</a>
          </li>
        </ul>
      </div>
    </div>
</nav>