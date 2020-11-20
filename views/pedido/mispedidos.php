<?php if(isset($gestion) && $gestion): ?>
    <h1>Gestion de pedidos:</h1>
<?php else: ?>
<h1>Mis pedidos:</h1>
<?php endif; ?>


<hr>
<table class="table table-bordered text-center">
    <thead class="thead-dark">
        <tr>
           
            <th scope="col">Identificador</th>
            <th scope="col">Costo del pedido</th>
            
            <th scope="col">fecha de pedido</th>
            <th scope="col">Status del pedido</th>
           
            


        </tr>
    </thead>
    <tbody>

        <?php

        while ($ped= $pedidos->fetch_object()) :?>
        <tr>
                <th scope="row"> <a href="<?=base_url?>pedido/detalle_pedido&id=<?=$ped->id?>"><?= $ped->id ?></a></th>
                <td><?=$ped->total_pedido?>$</td>
                <td><?=$ped->fecha?></td>
                <td><?= helpers::showStatus($ped->estado_pedido) ?></td>
                

        <?php endwhile; ?>
            </tr>

    </tbody>
   
    


</table>