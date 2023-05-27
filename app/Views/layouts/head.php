
<!-- Barra de navegación -->
<nav class="navbar navbar-expand-md sticky-top shadow">
    <!-- Contenedor interno de la barra -->
    <div class="container">

      <a class="navbar-brand text-white fs-1"  href="<?php echo base_url('/'); ?>"><!-- LOGO/NOMBRE EMPRESA-->
          <span class="magic letrasLogo">Magic</span><span class="shop letrasLogo">Shop</span>
      </a>
        <!-- Boton que se va a mostrar en los dispositivos pequeños -->
      <button class="navbar-toggler btn btn-outline-light active" type="button" data-bs-toggle="collapse" data-bs-target="#deplegarMenu" aria-controls="deplegarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <?php if(session()->has('loggedUser') && session()->get('id_rol') == 1):?>
        <!-- NAV del ADMINISTRADOR -->
        <div class="collapse navbar-collapse" id="deplegarMenu">

          <!-- Elementos del texto parte de UL -->
          <ul class="navbar-nav  ms-auto">

            <li class="nav-item">
              <a class="nav-link"  href="#">CONSULTAS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">VENTAS REALIZADAS</a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" href="#" >USUARIOS</a>
              <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="submenu-usuario">

                <li><a class="dropdown-item" href="<?=base_url(route_to('usuariosOn'))?>">ACTIVOS</a></li>
                <li><a class="dropdown-item" href="<?=base_url(route_to('usuariosOff'))?>">IN-ACIVOS</a></li>

              </ul>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" href="#" >PRODUCTOS</a>
              <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="submenu-usuario">

                <li><a class="dropdown-item" href="<?=base_url(route_to('crearproducto'))?>">CARGAR NUEVO</a></li>  
                <li><a class="dropdown-item" href="<?=base_url(route_to('productosOn'))?>">PRODUCTOS ACTIVOS</a></li>
                <li><a class="dropdown-item" href="<?=base_url(route_to('productosOff'))?>">PRODUCTOS IN-ACIVOS</a></li>

              </ul>
            </li>

          </ul>

          <ul class="navbar-nav  ms-auto">

            <li class="nav-item">
              <a class="nav-link" href="<?= base_url(route_to('logout')); ?>">Cerrar Sesion</a>
            </li>

          </ul>

        </div>

      <?php elseif(session()->has('loggedUser')):?>
        <!-- NAV de los USUARIOS logueado-->
        <div class="collapse navbar-collapse" id="deplegarMenu">

          <!-- Elementos del texto parte de UL -->
          <ul class="navbar-nav  ms-auto">

            <li class="nav-item">
              <a class="nav-link"  href="<?php echo base_url(); ?>">principal</a>
            </li>
            <li class="nav-item" >
              <a class="nav-link" href="<?= base_url(route_to('quienes_somos'))?>">quienes somos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url(route_to('comercializacion')) ?>">comercialización</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url(route_to('contacto'))?>">contacto</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="<?= base_url(route_to('terminos_y_usos'))?>" >términos y usos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url(route_to('catalogo'))?>" >Catalogo</a>
            </li>

          </ul>

          <!-- ICONO Y SUBMENU -->
          <ul class="navbar-nav ms-auto">

            <!-- LISTA DESPLEGABLE -->
            <li class="nav-item dropdown" >
              <!-- ICONO DE USUARIO -->
              <a  
                href="#"
                class="nav-link dropdown-toggle"
                role="button" 
                data-bs-toggle="dropdown" 
                aria-expanded="false"
                
                >
                <!-- ICONO -->
                <i class="bi bi-person-circle fs-3 text-white"></i>
              
              </a>
              <!-- MENU DEPLEGABLE |Nombre|Perfil|Cerrar Sesion -->
              <ul class="dropdown-menu bg-dark" aria-labelledby="submenu-usuario">
                
                <li><h6 class="dropdown-header"><?=session()->get('apellido');?></h6></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Perfil</a></li>
                <li><a class="dropdown-item" href="<?= base_url(route_to('logout')); ?>">Cerrar sesión</a></li>

              </ul>

            </li>
            <!-- CARRITO -->
            <li class="nav-item d-flex align-items-center" >
              <!-- ICONO DE USUARIO -->
              <a class="nav-link" href="<?php echo base_url('carritoCompras'); ?>">
                <!-- ICONO -->
                <i class="bi bi-cart3 fs-3"></i>
                <span class="badge bg-primary rounded-pill">
                  <?php if(session()->get('productos') != null)
                  {
                    echo "+".count(session()->get('productos'));
                  }else
                  {
                    echo "0";
                  }?> 
                </span>
              </a>

            </li>
            
          </ul>
          
        </div>

      <?php else:?>
        <!-- NAV de las personas que no estan registradas-->
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
            <li class="nav-item ">
              <a class="nav-link" href="<?= base_url(route_to('terminos_y_usos'))?>" >términos y usos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url(route_to('catalogo'))?>" >Catalogo</a>
            </li>

          </ul>

          <!-- INGRESAR | REGISTRARSE -->
          <ul class="navbar-nav ms-auto">

            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="<?=base_url(route_to('login')) ?>">Ingresar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url(route_to('formularioRegistro')) ?>">Registrarse</a>
            </li>

          </ul>
          
        </div>

      <?php endif;?>

    </div>

</nav>