<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Metadatos -->
    <meta charset="UTF-8"> <!-- Carácteres especiales-->
    <meta name="author" content="Martinez Matias Jose"> <!-- Autor de la página-->
    <meta name="description" content="Sitio de venta de artículos de libreria personalizados"><!-- Descripción de la página-->
    <meta name="keywords" content="BTS, Comic, Personalizado, libreria"><!-- Palabras claves-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><!-- Permite que se ajuste al tamaño del dispositivo en el que se está viendo la página-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Título -->
    <title><?php echo $titulo ?></title>
    <!-- Recibimos el array declarativo del Controller y lo volcamos en la vista, etiqueta título, ya que es la utilidad que le dimos al array -->
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/magicshopctes/logo/logo.png">
    <!-- CSS de Bootsrap -->
    <!-- Y lo hacemos con php, utilizano la base url del proyecto -->
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/bootstrap.css">
    <!-- Mi propio estilo css -->
    <link rel="stylesheet" href="assets/css/style.css">
    
    
    <!-- iconos de Bootstrap -->
    <link rel="stylesheet" href="assets/icon/bootstrap-icons-1.10.4/font/bootstrap-icons.css">
    <!-- Tipo de letra GoogleFonts online -->
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet"> -->
    <!-- <link rel="stylesheet" href="/assets/font/Poppins-Regular"> -->
</head>
<body>
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
                <!-- Enlace a la página principal -->
                <!-- <a class="navbar-brand text-white" href="<?php echo base_url() ?>">
                    <img src="assets/img/magicshopctes/logo/logo.png" width="50" alt="Logo de la página web">
                    <span class="magic">Magic</span><span class="shop">Shop</span>
                </a> -->
                <!-- Elementos del texto parte de UL -->
                <ul class="navbar-nav d-flex justify-content-center align-item-center ms-auto">
                  <li class="nav-item">
                    <a class="nav-link"  href="<?php echo base_url(); ?>">principal</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?= base_url().route_to('quienes_somos')?>">quienes somos</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?= base_url().route_to('comercializacion') ?>">comercialización</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?= base_url().route_to('contacto')?>">contacto</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?= base_url().route_to('terminos_y_usos')?>" >términos y usos</a>
                  </li>
                </ul>
              </div>
            </div>
        </nav>