<!-- Mostramos BARRA DE PROPAGANDA amarilla sólo si no es ADMINISTRADOR-->
<?php if( !session()->has('loggedUser') || (session()->has('loggedUser') && session()->get('id_rol') != 1) ):?>
  <div class="container-fluid m-0 d-none d-md-block" id="propaganda">
    <div class="col container d-flex justify-content-between align-items-center">
      <div class="row">
        <p class="m-0 p-0">TIENDA ONLINE DE K-POP ARGENTINA / CORRIENTES</p>
      </div>
      <div class="row iconos-redes-sociales-top">
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
<?php endif;?>
<!-- Barra de navegación -->
<nav class="navbar navbar-expand-md sticky-top shadow" id="navGeneral">
    <!-- Contenedor interno de la barra -->
    <div class="container d-md-flex flex-wrap">
      <div class=" text-center col-12">
        <?php if(session()->has('loggedUser') && session()->get('id_rol') == 1):?>
          <a class="navbar-brand text-white fs-1"  href="<?php echo base_url('dashboard'); ?>"><!-- LOGO/NOMBRE EMPRESA-->
              <span class="magic letrasLogo">Magic</span><span class="shop letrasLogo">Shop</span>
          </a>
        <?php else:?>
          <a class="navbar-brand text-white fs-1"  href="<?php echo base_url('/'); ?>"><!-- LOGO/NOMBRE EMPRESA-->
              <span class="magic letrasLogo">Magic</span><span class="shop letrasLogo">Shop</span>
          </a>
        <?php endif;?>
      </div>

      
        <!-- Boton que se va a mostrar en los dispositivos pequeños -->
        <button class="navbar-toggler btn btn-outline-light active" type="button" data-bs-toggle="collapse" data-bs-target="#deplegarMenu" aria-controls="deplegarMenu" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <?php if(session()->has('loggedUser') && session()->get('id_rol') == 1):?>
          <!-- NAV del ADMINISTRADOR -->
          <div class="collapse navbar-collapse d-lg-flex align-items-end" id="deplegarMenu">

            <!-- Elementos del texto parte de UL -->
            <ul class="navbar-nav">

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" href="#">
                  CONSULTAS
                  <?php if(session()->get('consultas') != null):?>
                    <i class="bi bi-bell notificacion">
                        <span class="campana badge rounded-pill position-absolute top-1 start-1 translate-middle bg-danger">
                          <?=count(session()->get('consultas'))?>
                        </span>
                      </i>
                  <?php endif?>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="submenu-consultas">

                  <li><a class="dropdown-item" href="<?=base_url(route_to('listaConsultasUsuarios'))?>">USUARIOS REGISTRADOS</a></li>
                  <li><a class="dropdown-item" href="<?=base_url(route_to('listaConsultasNoUsuarios'))?>">USUARIOS NO REGISTRADOS</a></li>

                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?=base_url('allFacturas')?>">VENTAS REALIZADAS</a>
              </li>
                <!-- USUARIOS -->
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" href="#" >USUARIOS</a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="submenu-usuario">

                  <li><a class="dropdown-item" href="<?=base_url(route_to('usuariosOn'))?>">ACTIVOS</a></li>
                  <li><a class="dropdown-item" href="<?=base_url(route_to('usuariosOff'))?>">IN-ACIVOS</a></li>

                </ul>
              </li>
              <!-- PRODUCTOS -->
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" href="#" >PRODUCTOS</a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="submenu-usuario">

                  <li><a class="dropdown-item" href="<?=base_url(route_to('crearproducto'))?>">CARGAR NUEVO</a></li>  
                  <li><a class="dropdown-item" href="<?=base_url(route_to('productosOn'))?>">PRODUCTOS ACTIVOS</a></li>
                  <li><a class="dropdown-item" href="<?=base_url(route_to('productosOff'))?>">PRODUCTOS IN-ACIVOS</a></li>

                </ul>
              </li>
              <!-- CATEGORIAS -->
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" href="#" >CATEGORIAS</a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="submenu-usuario">

                  <li><a class="dropdown-item" href="<?=base_url(route_to('crearCategoria'))?>">CARGAR NUEVA</a></li>  
                  <li><a class="dropdown-item" href="<?=base_url(route_to('categoriasOn'))?>">CATEGORIAS ACTIVAS</a></li>
                  <li><a class="dropdown-item" href="<?=base_url(route_to('categoriasOff'))?>">CATEGORIAS IN-ACIVAS</a></li>

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
          <div class="collapse navbar-collapse d-lg-flex align-items-end" id="deplegarMenu">

            <!-- Elementos del texto parte de UL -->
            <ul class="navbar-nav">

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
                <a class="nav-link" href="<?= base_url(route_to('contacto'))?>">Consulta</a>
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
              <!-- <li class="nav-item dropdown dropstart" > -->
              <li class="nav-item  dropdown" >
                <!-- ICONO DE USUARIO -->
                <a  
                  href="#"
                  class="nav-link dropdown-toggle d-flex align-items-center"
                  role="button" 
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                  
                  >
                  
                  <!-- ICONO -->
                  <i class="bi bi-person-circle fs-3 text-white me-1"></i>
                  
                  <small class="d-sm-block d-md-none d-lg-block" ><?=session()->get('apellido');?></small>
                
                </a>
                
                <!-- MENU DEPLEGABLE |Nombre|Perfil|Cerrar Sesion -->
                <ul class="dropdown-menu dropdown-menu-start bg-dark" aria-labelledby="submenu-usuario">
                  
                  <li><h6 class="dropdown-header"><?=session()->get('apellido')." "?><?=session()->get('nombre');?></h6></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="<?= base_url('perfil'); ?>">Mi Perfil</a></li>
                  <li><a class="dropdown-item" href="<?= base_url('allFacturasUsuario'); ?>">Mis Compras</a></li>
                  <li><a class="dropdown-item" href="<?= base_url(route_to('logout')); ?>">Salir</a></li>

                </ul>

              </li>
              <!-- BARRA SEPARADORA PERFIL | CARRITO -->
              <div class="vr text-white d-none d-md-block"></div>
              <!-- CARRITO -->
              <li class="nav-item d-flex align-items-center" >
                <!-- LINK DE CARRITO -->
                <a class="nav-link position-relative" href="<?=base_url('carritoCompras')?>">
                  <!-- ICONO -->
                  <i class="bi bi-cart3 fs-3"></i>
                    <span class="num badge rounded-pill position-absolute top-1 start-1 translate-middle bg-danger">
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

        <?php else:?>
          <!-- NAV de las personas que no estan registradas-->
          <div class="collapse navbar-collapse" id="deplegarMenu">

            <!-- Elementos del texto parte de UL -->
            <ul class="navbar-nav nav-pills ms-auto" id="ulGeneral">

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
    </div>

</nav>