<?=$this->extend('layouts/main')?>


<?=$this->section('title')?>
Lista de consultas
<?=$this->endSection()?>

<?=$this->section('content')?>

<div class="container">
    <!-- CABECERA -->
    <div class="row text-center">
        <div class="col">
            <p class="seccion-descripcion fs-1">Lista de consultas</p>
            <hr>
        </div>
    </div>
    
    <div class="row mt-3" >

        <div class="col">

            <div class="table-responsive">

                <table class="table table-light">

                    <thead class="thead table-secondary">
                        <tr>
                            <th>N°</th>
                            <th>Nombre</th>
                            <th>Fecha_recibida</th>
                            <th class="text-center">Estado/Fecha</th>
                            <th class="text-end">Accion</th>
                        </tr>
                    </thead>
                    <?php foreach ($listaConsultas as $key => $value) : ?>
                        
                        <tbody>                                                                    
                            
                            <tr>
                                
                                <td><?=$value['id_consulta']?></td>
                                <td><?=$value['nombre']?></td>
                                <td><?=$value['fecha_create']?></td>
                                <?php if($value['leido'] == 0) :?>
                                    <td class="text-center text-secondary fw-bolder">
                                        <i class="bi bi-eye-slash"></i>&nbsp;Sin leer
                                    </td>
                                <?php else:?>
                                    <td class="text-center text-success fw-bolder">
                                        <i class="bi bi-eye"></i>&nbsp;Leido el <?=$value['fecha_updated']?>
                                    </td>
                                <?php endif?>
                                
                                <!-- BOTN LEER CONSULTA -->
                                <td class="text-end">
                                    <!-- BOTON MODAL, despliega el mensaje reibido -->
                                    <button 
                                        class="btn btn-primary btn-sm"
                                        data-bs-toggle="modal"
                                        data-bs-target="#mi-modal-<?=$value['id_consulta']?>"
                                        >
                                        Leer mensaje
                                    </button>
                                    <!-- MODAL, Leer mensaje -->
                                    <div 
                                        class="modal fade"
                                        id="mi-modal-<?=$value['id_consulta']?>"
                                        tabindex="-1"
                                        aria-hidden="true"
                                        aria-labelledby="label-modal-2"
                                        data-bs-backdrop="static"
                                        >
                                        <!-- Caja de dialogo -->
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                            <!-- Contenido de la caja -->
                                            <div class="modal-content">
                                                <!-- Encabezado de la caja -->
                                                <div class="modal-header">
                                                
                                                    <h5 class="modal-title">
                                                    <i class="bi bi-megaphone"></i>
                                                        Consulta N° <?=$value['id_consulta']."<br>Fecha: ".$value['fecha_create']?>
                                                    </h5>
                                                    <button class="btn-close" data-bs-dismiss="modal" aria-label="cerar"></button>
                                                </div>
                                                <!-- Cuerpo de la caja -->
                                                <div class="modal-body">
                                                    <div class="row mb-2">
                                                        <div class="col text-start d-flex align-items-end">
                                                            <p class="p-0 m-0 fw-bold fs-5">Asunto: </p>
                                                            <?=$value['asunto']?>
                                                            <hr>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col text-start d-flex align-items-end">
                                                            <p class="p-0 m-0 fw-bold fs-5">Correo: </p>
                                                            <?=$value['email']?>
                                                            <hr>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col text-start">
                                                            <p class="p-0 m-0 fw-bold fs-5">Mensaje:</p>
                                                            <?=$value['mensaje']?>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <!-- Pie de pagina de la caja -->
                                                <div class="modal-footer">
                                                <?php if($value['leido'] == 0): ?>
                                                    <a href="<?=base_url('consultaLeida'.$value['id_consulta']) ?>" class="btn btn-danger btn-sm" type="button">
                                                        Marcar como leido<i class="bi bi-check-lg"></i>
                                                    </a>
                                                    <?php else: ?>
                                                        <a href="<?=base_url('consultaLeida'.$value['id_consulta']) ?>" class="btn btn-primary btn-sm" type="button">
                                                            Aceptar
                                                        </a>
                                                <?php endif ?>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </td>
                                
                            </tr>
                            
                        </tbody>
                    <?php endforeach?>

                </table>

            </div>

        </div>

    </div>

</div>

<?=$this->endSection()?>
