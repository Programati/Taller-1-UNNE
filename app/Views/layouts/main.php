<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$this->renderSection('title')?></title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/icon/bootstrap-icons-1.10.4/font/bootstrap-icons.css">
</head>
    <body>

    <?=$this->include('layouts/head')?>
    <?=$this->renderSection('content')?>
    <?=$this->include('layouts/footer')?>


    <script src="assets/js/bootstrap.js"></script>  
  </body>
</html>