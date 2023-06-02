<?=$this->extend('layouts/main')?>


<?=$this->section('title')?>
    Tablero de Registros
<?=$this->endSection()?>

<?=$this->section('content')?>
<?php //dd($infoPersona);?>

    <div class="container mt-2">
        <div class="row">
            <div class="col">
                <h1 class="text-center">Lista de usuarios registrados</h1>
                <hr>
            </div>
        </div>
        
        <div class="row">
            
            <div class="col">
            <?php if(session()->get('success')): ?>
    
                <div class="alert alert-success my-3" role="alert">
                    <?=session()->get('success')?>
                </div>

            <?php endif; ?> 

                <div class="table-responsive">
                    <table class="table table-light">
                    <thead class="thead table-secondary">
                        <tr>
                            <th>#</th>
                            <th>Apellido/Nombre</th>
                            <th>Telefono</th>
                            <th>Correo</th>
                            <th>Opcion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($infoUsuario as $x) {?>
                            <?php foreach($infoPersona as $key){?>
                                <?php if($key['id_persona'] == $x['id_persona']):?>

                                    <tr>
                                        <td><?=$key['id_persona']?></td>
                                        <td><?=$key['apellido']." ".$key['nombre']?></td>
                                        <td><?=$key['telefono']?></td>
                                        <td><?=$key['email']?></td>
                                        <td>
                                        <?php if($x['activo'] == 1):?>
                                            <a href="<?=base_url('deleteP'.$x['id_persona']) ?>" class="btn btn-danger btn-sm" type="button">
                                                <i class="bi bi-x-circle">Dar Baja</i>
                                            </a>
                                        <?php else:?>
                                            <a href="<?=base_url('activarP'.$x['id_persona']) ?>" class="btn btn-success btn-sm" type="button">
                                            <i class="bi bi-check-circle">Dar Alta</i>
                                            </a>
                                        <?php endif;?>
                                        </td>
                                    </tr>
                        
                                <?php endif;?>
                        
                            <?php };?>
                                    
                        <?php };?>


                    </tbody>
                    </table>
                </div>
                    
            </div>

        </div>

    </div>

<?=$this->endSection()?>