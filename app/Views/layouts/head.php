
<!-- Barra de navegación -->
<nav class="navbar navbar-expand-md sticky-top shadow">
    <!-- Contenedor interno de la barra -->
    <div class="container-fluid">

      <a class="navbar-brand text-white fs-1"  href="<?php echo base_url('productos'); ?>"><!-- LOGO/NOMBRE EMPRESA-->
          <span class="magic letrasLogo">Magic</span><span class="shop letrasLogo">Shop</span>
      </a>
        <!-- Boton que se va a mostrar en los dispositivos pequeños -->
      <button class="navbar-toggler btn btn-outline-light active" type="button" data-bs-toggle="collapse" data-bs-target="#deplegarMenu" aria-controls="deplegarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <!-- Inicio de los elementos de la barra -->
      <div class="collapse navbar-collapse" id="deplegarMenu">
        <!-- Elementos del texto parte de UL -->
        <ul class="navbar-nav  ms-auto">

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
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url(route_to('catalogo'))?>" >Catalogo</a>
          </li>

        </ul>

        <ul class="navbar-nav ms-auto">
          <?php if(!session()->has('loggedUser')):?>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="<?=base_url(route_to('login')) ?>">Ingresar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url(route_to('formularioRegistro')) ?>">Registrarse</a>
                </li>

            <?php else:?>
              
                <li class="nav-item dropstart" >

                  <a  
                      href="#"
                      class="nav-link dropdown-toggle"
                      role="button" 
                      data-bs-toggle="dropdown" 
                      aria-expanded="false"
                      id="submenu-usuario"
                      >
                      <i class="bi bi-person-circle fs-1 text-white"></i>
                      
                    
                    </a>
                  <ul class="dropdown-menu  desplegable bg-dark"
                      aria-labelledby="submenu-usuario"
                  >
                    <li><a class="dropdown-item" href="#"><?=$infoUsuarioLog['nombre'];?></a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Perfil</a></li>
                    <li><a class="dropdown-item" href="<?= base_url(route_to('logout')); ?>">Cerrar sesión</a></li>
                  </ul>

                </li>
              

          <?php endif;?>
          
        </ul>
        
      </div>

    </div>

</nav>