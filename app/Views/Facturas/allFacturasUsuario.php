<?=$this->extend('layouts/main')?>


<?=$this->extend('layouts/main')?>


<?=$this->section('title')?>
    Todas mis compras
<?=$this->endSection()?>

<?=$this->section('content')?>

<div class="container my-3">
    <div class="row">
        <div class="col">
            <h1 class="text-center">Todas mis compras</h1>
            <hr>
        </div>
    </div>
    <?php if( $facturas != null):?>
        <div class="table-responsive">

            <table class="table table-light">

                <thead class="thead table-secondary">
                    <tr>
                        <th>Factura#</th>
                        <th class="text-center">Fecha_emisión</th>
                        <th class="text-center">Monto_Total</th>
                        <th class="text-center">Vista rápida</th>
                        <th class="text-center">Ir a</th>
                    </tr>
                </thead>

                <?php foreach($facturas as $key => $value){?>
                <tbody>

                        <tr>
                            <td><?= $value['id_factura']?></td>
                            <td class="text-center"><?= $value['fecha_factura']?></td>
                            <td class="text-center">$<?= $value['importe_total']?></td>
                            <!-- BOTN VISTA RAPIDA -->
                            <td class="text-center">
                                <!-- BOTON MODAL, despliega el detalle de cada factura -->
                                <button 
                                    class="btn btn-success btn-sm"
                                    data-bs-toggle="modal"
                                    data-bs-target="#mi-modal-<?=$value['id_factura']?>"
                                    >
                                    <i class="bi bi-eye"></i>
                                </button>
                                <!-- MODAL, detalles de factura -->
                                <div 
                                    class="modal fade"
                                    id="mi-modal-<?=$value['id_factura']?>"
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
                                                    <i class="bi bi-receipt-cutoff"></i>
                                                    Factura N° <?=$value['id_factura']."<br>FECHA: ".$value['fecha_factura']?>
                                                </h5>
                                                <button class="btn-close" data-bs-dismiss="modal" aria-label="cerar"></button>
                                            </div>
                                            <!-- Cuerpo de la caja -->
                                            <div class="modal-body">
                                                
                                                <table class="table">
                                                    
                                                    <thead>
                                                        <tr>
                                                            <th>Descripción</th>
                                                            <th>Cantidad</th>
                                                            <th>Precio unitario</th>
                                                            <th>SubTotal</th>
                                                        </tr>
                                                    </thead>
                                                    <?php foreach ($detallesFacturas as $keyDetalles => $valueDetalles) : ?>

                                                        <?php if($valueDetalles['id_factura'] == $value['id_factura']) {?>
                                                            
                                                            <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <?php foreach ($productos as $keyProductos => $valueProductos) : ?>
                                                                                <?php if($valueProductos['id_producto'] == $valueDetalles['id_producto']) {?>
                                                                                    <?=$valueProductos['nombre_producto']?>
                                                                                <?php }?>
                                                                            <?php endforeach;?>
                                                                        </td>
                                                                        <td><?=$valueDetalles['cantidad']?></td>
                                                                        <td>$<?=$valueDetalles['subTotal']?></td>
                                                                        <td>$<?=$valueDetalles['cantidad']*$valueDetalles['subTotal']?></td>
                                                                    </tr>
                                                            </tbody>
                                                            
                                                        <?php }?>
                                                            
                                                    <?php endforeach;?>
                                                    <tfoot>
                                                        <tr>
                                                            <td colspan="3" class="text-end fw-bolder">Total a pagar:</td>
                                                            <td class="fw-bolder">$<?=$value['importe_total']?></td>
                                                        </tr>
                                                    </tfoot>

                                                </table>

                                            </div>
                                            <!-- Pie de pagina de la caja -->
                                            <div class="modal-footer">

                                                <button type="button" class="btn btn-success" data-bs-dismiss="modal">
                                                    Aceptar
                                                </button>
                                                
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </td>
                            <!-- Link a FACTURA completa -->
                            <td class="text-center">
                                <a href="<?=base_url('facturaUnicaUsuario'.$value['id_factura']) ?>">
                                    Vista completa...
                                </a>
                            </td>

                        </tr>

                        
                    </tbody>
                    <?php }?>
                    
            </table>
                
        </div>
            
    
    <?php else:?>
        <div class="row d-flex justify-content-center" style="height: 50vh">
            <div class="col-12">
                <h1>No tienes ninguna compra realizada</h1>
                <small>¡Miles de productos de esperan!, ve a la seccion catálogo</small>
            </div>
            <div class="col-12">
                <a href="<?=base_url('catalogo') ?>" class="btn btn-primary" type="button">Catalogo</a>
            </div>
        </div>
    <?php endif?>
    </div>

<?=$this->endSection()?>