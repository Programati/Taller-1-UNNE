<?=$this->extend('layouts/main')?>


<?=$this->section('title')?>
    Carrito
<?=$this->endSection()?>

<?=$this->section('content')?>

    <div class="container mt-2 mb-5">
        <div class="row">
            <div class="col">
                <h1 class="text-center">Carrito de compras</h1>
                <hr>
            </div>
        </div>
        <?php if( session()->get('productos') != null):?>

            <?php
                $result = array();
                foreach(session()->get('productos') as $t) {
                    $repeat=false;
                    for($i=0;$i<count($result);$i++)
                    {
                        if($result[$i]['id']==$t['id'])
                        {
                            $result[$i]['cantidad']+=$t['cantidad'];
                            $repeat=true;
                            break;
                        }
                    }
                    if($repeat==false)
                        $result[] = array('id' => $t['id'], 'cantidad' => $t['cantidad']);
                }
            ?>

        <div class="row my-4 bg-primary rounded d-flex align-items-center fw-bold justify-content-center">
            <div class="col-1">
                <p>Cantidad</p>
            </div>
            <div class="col-2">
                <p>Nombre</p>
            </div>
            <div class="col-1">
                <p>Precio</p>
            </div>
            <div class="col-1">
                <p>SubTotal</p>
            </div>
            <div class="col-2">
                <p>Quitar</p>
            </div>
        </div>
        <div class="row d-flex align-items-center justify-content-center">

            <?php foreach($result as $key){?>
                
                <?php foreach($productosBD as $bd){?>
                    
                    <?php if($bd['id_producto'] == $key['id']):?>
                        <div class="col-1">
                            <?=$key['cantidad']?>
                        </div>
                        <div class="col-2">
                            <?=$bd['nombre_producto']?>
                        </div>
                        <div class="col-1">
                            <?=$bd['precio']?>
                        </div>
                        <div class="col-1">
                            <?=$bd['precio']*$key['cantidad']?>
                        </div>
                        <div class="col-2">
                            <a href="<?=base_url('vaciarCarrito'.$key['id']) ?>" class="btn btn-primary btn-sm" type="button">
                                <i class="bi bi-x-circle"></i>
                            </a>
                        </div>
                        <hr>
    
                        
                        
                    <?php endif;?>
                        
                <?php };?>
                            
            <?php };?>
        
        </div>
        <div class="row">
            <div class="col">
                <h5>Total</h5>
            </div>
        </div>
        <?php else:?>
        <div class="row row-cols-1 d-flex justify-content-center">
            <div class="col">
                <h1>Tu carrito está vacío</h1>
                <small>¡Miles de productos de esperan!, ve a la seccion catálogo</small>
            </div>
            <div class="col">
                <a href="<?=base_url('catalogo') ?>" class="btn btn-primary" type="button">Catalogo</a>

            </div>
        </div>
        <?php endif?>
        
            

    </div>

<?=$this->endSection()?>