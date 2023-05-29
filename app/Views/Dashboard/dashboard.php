<?=$this->extend('layouts/main')?>


<?=$this->section('title')?>
Inicio | Magic Shop
<?=$this->endSection()?>

<?=$this->section('content')?>

<section class="container mt-1">

    <!-- Mensaje de INICIO SESSION cuando se loguea -->
    <?php if(session()->get('success')): ?>

        <div class="alert alert-success" role="alert">
            <?=session()->get('success')?>
        </div>

    <?php endif; ?>
    
    <div class="row">
        <div class="col d-flex justify-content-center align-items-center" style="height: 80vh">
            <h1>AREA ADMINISTRATIVA</h1>
        </div>
    </div>


</section>

<?=$this->endSection()?>