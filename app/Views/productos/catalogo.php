<?=$this->extend('layouts/main')?>


<?=$this->section('title')?>
Catalogo
<?=$this->endSection()?>

<?=$this->section('content')?>

    <div class="container">

        <div class="row row-cols-2 row-cols-sm-3 row-cols-md-3 row-cols-lg-4 my-5 d-flex">

            <!-- Iterador de imagenes -->
            <?php foreach($productos as $key){?>

                <div class="container col text-center mb-5 text-break">

                    <!-- class="img-thumbnail" -->
                    <img    
                    class="img-fluid border rounded"
                                        loading="lazy"
                                        src="<?=base_url()?>assets/img/magicshopctes/productos/uploads/<?=$key['imagen']?>" 
                                        alt="<?=$key['nombre']?>"
                                >  
                    <hr>
                    <h5 class="title-prod text-wrap"><?=$key['nombre']?></h5>
                </div>

            <?php };?>

        </div>


    </div>

<?=$this->endSection()?>   