<h1>Carrito de compra</h1> 
<div class="text-right"><a href="<?=base_url?>carrito/delete_all" class="btn btn-danger btn-sm">Vaciar Carrito <i class="fas fa-trash"></i> </a></div>
<hr>
<?php if(!isset($_SESSION['carrito']) OR count($_SESSION['carrito'])==0): ?>
    <div class="alert alert-primary">Su carrito esta Vacio</div>
<?php else: ?>
    <table class="table table-bordered text-center">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th scope="col">Imagen</th>

            <th scope="col">Nombre</th>
            <th scope="col">categoria</th>
            <th scope="col">precio</th>
            <th scope="col">unidades</th>
           
            <th scope="col">acciones</th>


        </tr>
    </thead>
    <tbody>

        <?php

        foreach ($_SESSION['carrito'] as $indice=>$prod) :
            $producto= $prod['producto'];
           
       ?><tr>
                <th scope="row"> <?= $prod['id_producto']; ?>)</th>
                <td><img src="<?= base_url ?>uploads/images/<?= $producto->img; ?>" class="rounded-circle" width="40" ></td>
                <td><a href="<?= base_url?>/producto/ver&id=<?= $prod['id_producto']; ?>">  <?= $producto->nombre; ?>  </a></td>
                <td><?= $producto->categoria; ?></td>
                <td><?= $producto->precio; ?>$</td>
                <td>  
                <a href="<?=base_url?>carrito/disminuir&index=<?=$indice?>" class="btn btn-danger btn-sm mr-2"><i class="fas fa-minus"></i></a>  
                <?= $prod['unidades']; ?>  
                <a href="<?=base_url?>carrito/aumentar&index=<?=$indice?>" class="btn btn-sm btn-primary text-center ml-2"> <i size="3x" class="fas fa-plus "></i></a>
                </td>
               

                <td>
               
                <a href="<?=base_url?>carrito/remove&index=<?=$indice?>" class="btn btn-danger btn-sm">Borrar <i class="fas fa-trash"></i> </a></td>


        <?php endforeach; ?>
            </tr>

    </tbody>
   
    


</table>
<div class="text-right">
        <h3>
        Total a pagar: <?=helpers::getTotal()?>$  <a href="<?=base_url?>pedido/hacer" class="btn btn-success"> hacer pedido </a>
    </h3> 
    
    </div>
<?php endif; ?>
