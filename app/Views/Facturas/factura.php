<?=$this->extend('layouts/main')?>


<?=$this->section('title')?>
Facturas
<?=$this->endSection()?>

<?=$this->section('content')?>

<?php if($facturaUsuario):?>
<?php for($i=0;$i<count($detalleFactura);$i++){?>
    <div class="container my-5">

        <div class="card">
            <div class="card-header">
                FACTURA
            </div>
            <div class="card-body">
                <div class="row border border-primary-subtle">
                    <div class="col-12 col-md-5 order-2 order-md-1">
                        <div class="row">
                            <div class="col-12 text-center">
                                <img src="assets/img/magicshopctes/logo/logo.png"  width="50" alt="Logo de la página web">
                            </div>
                            <div class="col-12 text-center">
                                <p class="display-6">
                                    <span class="magic">Magic</span><span class="shop">Shop</span>
                                </p>

                            </div>
                        </div>
                    </div>
                        
                    <div class="col-12 col-md-2 d-flex justify-content-center order-1 order-md-2">
                        <div class="col-4 col-md-6 text-center">
                            <p class="border border-primary-subtle fw-bold m-0 p-0 display-3">
                                A
                            </p>
                            <small>COD. 01</small>
                        </div>
                    </div>
                    <div class="col-12 col-md-5 text-md-end text-center order-3">
                        <h4>ORIGINAL</h4>
                        <p>Número de factura: <?=$facturaUsuario[$i]['id_factura']?></p>
                        <p>Fecha de emision: <?=$facturaUsuario[$i]['fecha_factura']?></p>
                        <p>MagicShop</p>
                        
                        <p>CUIT: 20-28717013-1</p>
                        
                        
                    </div>
                </div>
                <div class="row mb-2 border border-primary-subtle">
                    <div class="col-12 d-flex justify-content-around align-items-center">
                        <p>Dirección: B° Laguna Seca</p>
                        <p>Telefono: 3794-112233</p>
                        <p>Inicio Actividad: 01/01/2010</p>
                    </div>
                </div>

                <div class="row border border-primary-subtle">
                    <div class="col-md-12">
                        <div class="row ">
                            <div class="col-12 d-flex justify-content-between">
                                <p>Cliente:  <?=session()->get('nombre')?><?=" "?><?=session()->get('apellido')?></p>
                                <p>Tel:  <?=session()->get('telefono')?></p>
                                <p>Dirección: <?=$domicilioUsuario['calle']." ",$domicilioUsuario['numero']." ",$domicilioUsuario['localidad']?></p>
                            </div>
                            <div class="col-12 d-flex justify-content-between">
                                <p>Provincia: <?=$domicilioUsuario['provincia']?></p>
                                <p>Codigo Postal: <?=$domicilioUsuario['codigo_postal']?></p>
                                <p>Pais: <?=$domicilioUsuario['pais']?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>
                <div class="table-responsive">

                    <table class="table mt-4">
                        <thead>
                            <tr>
                                <th>Descripción</th>
                                <th>Cantidad</th>
                                <th>Precio unitario</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <?php foreach ($detalleFactura[$i] as $key => $v) : ?>
                        <tbody>
                            <!-- echo "N° Factura ".$v['id_factura']." subTotal ".$v['subTotal']."<br>"; -->
                                <tr>
                                <td><?=$v['nombre_producto']?></td>
                                <td><?=$v['cantidad']?></td>
                                <td>$<?=$v['subTotal']?></td>
                                <td>$<?=(float)$v['cantidad']*(float)$v['subTotal']?></td>
                                </tr>
                        </tbody>
                        <?php endforeach;?>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="text-end">Total a pagar:</td>
                                <td>$<?=$facturaUsuario[$i]['importe_total']?></td>
                            </tr>
                            <tr>
                                <td>Gracias por confiar en nosotros</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>    

    </div>

<?php };?>
<?php else:?>
    <div class="container">
        <div class="row mt-5" style="height: 80vh">
            <div class="col-12">
                <h1>Aquí se mostraran las facturas de tus compras</h1>
                <small>¡Miles de productos de esperan!, ve a la seccion catálogo</small>
            </div>
            <div class="col-12">
                <a href="<?=base_url('catalogo') ?>" class="btn btn-primary" type="button">Catalogo</a>
            </div>
        </div>
    </div>
<?php endif;?>


        
<?=$this->endSection()?>
