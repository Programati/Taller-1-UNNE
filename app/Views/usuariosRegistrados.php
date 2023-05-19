<?=$this->extend('layouts/main')?>


<?=$this->section('title')?>
    Tablero de Registros
<?=$this->endSection()?>

<?=$this->section('content')?>

    <div class="container mt-5 mb-5">

        <?php if(session()->get('success')): ?>

            <div class="alert alert-success" role="alert">
                <?=session()->get('success')?>
            </div>

        <?php endif; ?>

        <?php if(session()->has('loggedUser')):?>
        <div class="row">
            <div class="col d-flex justify-content-center">
                
                <div class="card mb-3" style="max-width: 540px;">
                    <img src="assets/img/magicshopctes/staff/hombre_1.png" class="img-fluid rounded-start" alt="usuarios">
                    <div class="card-body">
                        <h5 class="card-title"><?=$infoUsuarioLog['apellido']." ".$infoUsuarioLog['nombre'];?></h5>
                        <p class="card-text">
                            Mi Corro es: <?= $infoUsuarioLog['email'];?>
                        </p>
                        <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                    </div>
                </div>
                
            </div>
        </div>
        <?php endif; ?>
        
        <div class="row">

            <h1 class="text-center my-5">Lista de usuarios registrados</h1>
            <hr>
            <?php foreach($infoUsuariosReg as $key){?>
                <div class="col d-flex">
                
                <div class="card mb-3" style="max-width: 540px;">

                    <div class="row g-0">

                        <div class="col-md-4">
                            <img src="assets/img/magicshopctes/staff/hombre_1.png" class="img-fluid rounded-start" alt="usuarios">
                        </div>

                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?= $key['nombre']?></h5>
                                <p class="card-text">
                                    This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                            </div>
                        </div>

                    </div>

                </div>
                        
                </div>
            <?php };?>
            
        </div>

    </div>

<?=$this->endSection()?>