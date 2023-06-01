<?=$this->extend('layouts/main')?>


<?=$this->section('title')?>
Lista de consultas
<?=$this->endSection()?>

<?=$this->section('content')?>

<div class="container">
    <!-- CABECERA -->
    <div class="row text-center">
        <div class="col">
            <p class="seccion-descripcion fs-1">Lista de consultas de usuarios</p>
            <hr>
        </div>
    </div>
    
    <div class="row mt-3" style="height:80vh">

        <div class="col">

            <div class="table-responsive">

                <table class="table table-light">

                    <thead class="thead table-secondary">
                        <tr>
                            <th>N°</th>
                            <th>Nombre</th>
                            <th>Fecha recibida</th>
                            <th class="text-center">Estado</th>
                            <th class="text-end">Accion</th>
                        </tr>
                    </thead>
                    <?php foreach ($listaConsultas as $key => $value) : ?>
                        
                        <tbody>                                                                    
                            
                            <tr>
                                
                                <td><?=$value['id_consulta']?></td>
                                <td><?=$value['nombre']?></td>
                                <td><?=$value['fecha_create']?></td>
                                <td class="text-center">
                                    <?php if($value['leido'] == 0) :?>
                                        <div class="bg-secondary border rounded py-2 text-white">
                                            <i class="bi bi-eye-slash">Sin leer</i>
                                        </div>
                                    <?php else:?>
                                        <div class="bg-success border rounded py-2 text-white">
                                            <i class="bi bi-eye">Leido el <?=$value['fecha_updated']?></i>
                                        </div>
                                    <?php endif?>
                                </td>
                                
                                <!-- BOTN LEER CONSULTA -->
                                <td class="text-center">
                                    <!-- BOTON MODAL, despliega el mensaje reibido -->
                                    <button 
                                        class="btn btn-primary"
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
                                                    <h5 class="modal-title">Consulta N° <?=$value['id_consulta']."<br>Fecha: ".$value['fecha_create']?></h5>
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

                                                    <a href="<?=base_url('consultaLeida'.$value['id_consulta']) ?>" class="btn btn-success btn-sm" type="button">
                                                        Aceptar
                                                    </a>
                                                    
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
