<!doctype html>
<html lang="es">
  <head>
    <!-- Metadatos -->
    <meta charset="UTF-8"> <!-- Carácteres especiales-->
    <meta name="author" content="Martinez Matias Jose"> <!-- Autor de la página-->
    <meta name="description" content="Sitio de venta de artículos de libreria personalizados"><!-- Descripción de la página-->
    <meta name="keywords" content="BTS, Comic, Personalizado, libreria"><!-- Palabras claves-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><!-- Permite que se ajuste al tamaño del dispositivo en el que se está viendo la página-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Titulo de cada pestaña -->
    <title><?=$this->renderSection('title')?></title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/magicshopctes/logo/logo.svg">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap.css"> -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/icon/bootstrap-icons-1.10.4/font/bootstrap-icons.css">
    <script src="assets/js/bootstrap.bundle.js"></script>
  

</head>
    <body>
      

    <?=$this->include('layouts/head')?>
    <?=$this->renderSection('content')?>
    <?=$this->include('layouts/footer')?>
    
  </body>
</html>