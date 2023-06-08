<?=$this->extend('layouts/main')?>


<?=$this->section('title')?>
Lista de consultas
<?=$this->endSection()?>

<?=$this->section('content')?>

<div class="container">
    <!-- CABECERA -->
    <div class="row text-center">
        <div class="col">
            <p class="seccion-descripcion fs-1">Lista de consultas de usuarios registrados</p>
            <hr>
        </div>
    </div>
    <!-- Filtro de Fecha -->
    <div class="row my-3 d-flex justify-content-between">

        <div class="col g-sm-0 d-flex align-items-end">
            <a class="btn btn-sm btn-custom" href="<?=base_url(route_to('listaConsultasUsuarios')) ?>">Traer todas</a>
        </div>

        <div class="col g-sm-0">
            <div class="row g-0">
                <div class="col d-flex flex-sm-row-reverse">
                    Filtrar por fecha
                </div>
            </div>
            <div class="row g-0">
                <div class="col d-flex justify-content-end flex-fill">
                    <form class="d-flex flex-wrap" role="search" action="<?=base_url(route_to('buscarConsultaUsuarios')) ?>" method="POST">
                        <button class="btn btn-sm btn-custom me-sm-3" type="submit">Buscar</button>
                        <input type="date" name="fecha" id="fecha">
                    </form>

                </div>

            </div>
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
                                <td><?php $dt = new DateTime($value['fecha_create']);?><?=$dt->format('d/m/Y')?></td>
                                <?php if($value['leido'] == 0) :?>
                                    <td class="text-center text-secondary fw-bolder">
                                        <i class="bi bi-eye-slash"></i>&nbsp;Sin leer
                                    </td>
                                <?php else:?>
                                    <td class="text-center text-success fw-bolder">
                                        <i class="bi bi-eye"></i>&nbsp;Leido el <?php $du = new DateTime($value['fecha_updated']);?><?=$du->format('d/m/Y')?>
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
                                                    <?php $dt = new DateTime($value['fecha_create']);?>
                                                        Consulta N° <?=$value['id_consulta']."<br>Fecha: ".$dt->format('d/m/Y')?>
                                                    </h5>
                                                    <button class="btn-close" data-bs-dismiss="modal" aria-label="cerar"></button>
                                                </div>
                                                <!-- Cuerpo de la caja -->
                                                <div class="modal-body">
                                                    <div class="row mb-2">
                                                        <div class="col text-start d-flex align-items-end">
                                                            <p class="p-0 m-0 fw-bold fs-5">Asunto:&nbsp;</p>
                                                            <?=$value['asunto']?>
                                                            <hr>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col text-start d-flex align-items-end">
                                                            <p class="p-0 m-0 fw-bold fs-5">Correo:&nbsp;</p>
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
                                                        <a href="<?=base_url('listaConsultasUsuarios')?>" class="btn btn-primary btn-sm" type="button">
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
