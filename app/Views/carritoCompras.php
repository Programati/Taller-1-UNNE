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
                $total = 0;
                $result = array();
                foreach(session()->get('productos') as $t) 
                {
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

            
            
            <div class="row my-5">

                <div class="col">
                    
                    <div class="table-responsive">
                        <table class="table table-light">
                        <thead class="thead table-secondary">
                            <tr>
                                <th>Cantidad</th>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>SubTotal</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($result as $key){?>
                        <!-- Si hay datos, mostrar -->
                            <!-- Recorremos la tabla productos -->
                            <?php foreach($productosBD as $bd){?>
                                <?php if($bd['id_producto'] == $key['id']):?>
                                <tr>
                                    <td><?=$key['cantidad']?></td>
                                    <td><?=$bd['nombre_producto']?></td>
                                    <td><?=$bd['precio']?></td>
                                    <td><?=$bd['precio']*$key['cantidad']?></td>
                                    <td>
                                        <a href="<?=base_url('vaciarCarrito'.$key['id']) ?>" class="btn btn-primary btn-sm" type="button">
                                            <i class="bi bi-x-circle"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php $total= $total + $bd['precio']*$key['cantidad']?>
                                <?php endif;?>
                            
                            <?php };?>
                                        
                        <?php };?>


                        </tbody>
                        </table>
                    </div>

                </div>

            </div>
            <div class="row">
                <div class="col">
                    <h5>Total $<?php echo $total?></h5>
                </div>
            </div>
            <div class="row">
                <div class="col d-flex flex-row-reverse">
                    <a href="<?=base_url('vacioTotalCarrito') ?>" class="btn btn-danger " type="button">
                        <i class="bi bi-x-octagon">Vaciar todo</i>
                    </a>
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