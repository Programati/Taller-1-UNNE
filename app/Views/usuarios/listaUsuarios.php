<?=$this->extend('layouts/main')?>


<?=$this->section('title')?>
    Tablero de Registros
<?=$this->endSection()?>

<?=$this->section('content')?>
<?php //dd($infoPersona);?>

    <div class="container mt-2">

        <div class="row">
            <div class="col">
                <h1 class="text-center">Lista de usuarios registrados <?php echo ($infoUsuario['0']['activo'] == 1) ? 'Activos' : 'In-Activos' ?></h1>
                <hr>
            </div>
        </div>

        <!-- Filtro de Nombres -->
        <div class="row my-3 d-flex justify-content-between">

            <div class="col-12 col-sm-6 g-sm-0 d-flex align-items-end">
                
                <?php if($infoUsuario['0']['activo'] == 1):?>
                    <a href="<?=base_url('usuariosOn') ?>" class="btn btn-custom btn-sm" type="button">
                        Traer todos
                    </a>
                <?php else:?>
                    <a href="<?=base_url('usuariosOff') ?>" class="btn btn-custom btn-sm" type="button">
                        Traer todos
                    </a>
                <?php endif;?>
                
            </div>

            <div class="col-12 col-sm-6 g-sm-0">
                <div class="row g-0">
                    <div class="col d-flex flex-row-reverse">
                        Filtrar por NOMBRE
                    </div>
                </div>
                <div class="row g-0">
                    <div class="col d-flex justify-content-end flex-fill flex-wrap">
                        <form class="d-flex" role="search" 
                        <?php if($infoUsuario['0']['activo'] == 1):?>
                            action="<?=base_url(route_to('buscarUsuarioActivo')) ?>" 
                        <?php else:?>
                            action="<?=base_url(route_to('buscarUsuarioInActivo')) ?>" 
                        <?php endif;?>
                        
                        method="POST">
                            <input name="nombre" class="form-control me-2" type="search" placeholder="Buscar usuario" aria-label="Search">
                            <button class="btn btn-custom btn-sm" type="submit">Buscar</button>
                        </form>

                    </div>

                </div>
            </div> 

        </div>
        <?php if($infoPersona):?>
        <div class="row my-3">
            
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
                            <th>ID</th>
                            <th>Apellido</th>
                            <th>Nombre</th>
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
                                        <td><?=$key['apellido']?></td>
                                        <td><?=$key['nombre']?></td>
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
        <?php else: ?>
            <div class="container my-5" style="height:40vh">
                <div class="row">
                    <div class="col-2">
                        <p class="display-3">
                            <i class="bi bi-search"></i>
                        </p>
                    </div>
                    <div class="col-10">
                        <p class="fs-2 fw-bolder">No hay NOMBRES de usuarios que coincidan con tu búsqueda</p>
                        <ul>
                            <li>Revisá la ortografía del NOMBRE</li>
                            <li>Utilizá palabras más genericas</li>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endif?>

    </div>

<?=$this->endSection()?>