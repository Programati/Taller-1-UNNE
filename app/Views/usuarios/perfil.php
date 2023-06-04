<?=$this->extend('layouts/main')?>


<?=$this->section('title')?>
Mi Perfil
<?=$this->endSection()?>

<?=$this->section('content')?>

<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5" >
                <i class="bi bi-person-vcard mt-5 display-1"></i>
                <span class="font-weight-bold"><?=session()->get('nombre')?></span>
                <span class="text-black-50"><?=session()->get('email')?></span>
            </div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Información de Usuario</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <label class="labels">Nombre</label>
                        <input disabled type="text" class="form-control" value="<?=session()->get('nombre')?>">
                    </div>
                    <div class="col-md-6">
                        <label class="labels">Apellido</label>
                        <input disabled type="text" class="form-control" value="<?=session()->get('apellido')?>">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <label class="labels">Dirección</label>
                        <input disabled type="text" class="form-control" value="<?=$domicilio['calle']." "?><?=$domicilio['numero']?>">
                    </div>
                    <div class="col-md-12">
                        <label class="labels">N° Teléfono</label>
                        <input disabled type="text" class="form-control" value="<?=session()->get('telefono')?>">
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Correo</label>
                        <input disabled type="text" class="form-control" value="<?=session()->get('email')?>">
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Codigo Postal</label>
                        <input disabled type="text" class="form-control" value="<?=$domicilio['codigo_postal']?>">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <label class="labels">Ciudad</label>
                        <input disabled type="text" class="form-control" value="<?=$domicilio['localidad']?>">
                    </div>
                    <div class="col-md-6">
                        <label class="labels">Pais</label>
                        <input disabled type="text" class="form-control" value="<?=$domicilio['pais']?>">
                    </div>
                </div>
                <div class="blockquote-footer mt-5"><cite title="Info adicional">Si desea cambiar algun dato, contactarse con el administrador en la seccion CONSULTA</cite></div>
                <cite title="Source Title"></cite>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience">
                    <span>Mis actividades</span>
                    <a href="<?= base_url('allFacturasUsuario'); ?>" class="nav-link border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Mis Facturas</a>
                </div><br>
                <div class="col-md-12"><label class="labels">Importe de última compra</label>
                <input disabled type="text" class="form-control" value="$<?=$factura['importe_total']?>"></div> <br>
                <div class="col-md-12"><label class="labels">Total general gastado</label>
                <input disabled type="text" class="form-control" value="$<?=$total?>"></div>
            </div>
            
        </div>
    </div>
</div>
</div>
</div>

<?=$this->endSection()?> 