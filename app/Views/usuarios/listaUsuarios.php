<?=$this->extend('layouts/main')?>


<?=$this->section('title')?>
    Tablero de Registros
<?=$this->endSection()?>

<?=$this->section('content')?>
<?php //dd($infoPersona);?>

    <div class="container mt-2 mb-5">
        <div class="row">
            <div class="col">
                <h1 class="text-center">Lista de usuarios registrados</h1>
                <hr>
            </div>
        </div>
        
        <div class="row">

            
            <?php foreach($infoPersona as $key){?>
                <div class="col d-flex">
                
                    <div class="card mb-3" style="max-width: 540px;">

                        <div class="row g-0">

                            <div class="col-md-4">
                                <img src="assets/img/magicshopctes/staff/hombre_1.png" class="img-fluid rounded-start" alt="usuarios">
                            </div>

                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Mi id es: <?= $key['id_persona']?></h5>
                                    <p class="card-text">
                                    Mi rol es: <?=$key['id_rol']?> EN LA BD.</p>
                                    <p class="card-text"><small class="text-body-secondary">Valor de ACTIVO: <?= $key['activo']?></small></p>
                                </div>
                            </div>

                        </div>

                    </div>
                        
                </div>
            <?php };?>
            
        </div>

    </div>

<?=$this->endSection()?>