<?php if (isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'complete') : ?>
    <h1 class="alert alert-success">Pedido confirmado</h1>
    <p>Tu pedido se ha confirmado exitosamente, una vez sea realizado el pago via transferencia se procesara el pedido</p>
    <br>
    <?php if (isset($pedido)) : ?>
        <h3>Datos del pedido</h3>
        <pre>
        Numero de pedido: <?= $pedido->id ?>
        Total a pagar: <?= $pedido->total_pedido ?>
        <br>
        Productos: 
        <table class="table table-bordered text-center">
    <thead class="thead-dark">
        <tr>
          
            <th scope="col">Imagen</th>

            <th scope="col">Nombre</th>
            
            <th scope="col">precio</th>
            <th scope="col">unidades</th>
           
       


        </tr>
    </thead>
    <tbody>

            <?php while ($producto = $productos->fetch_object()) : ?>
           

                <tr>
                
                <td><img src="<?= base_url ?>uploads/images/<?= $producto->img; ?>" class="rounded-circle" width="40" ></td>
                <td><a href="<?= base_url ?>/producto/ver&id=<?= $producto->id ?>">  <?= $producto->nombre; ?>  </a></td>
               
                <td><?= $producto->precio; ?>$</td>
                <td><?= $producto->unidades; ?></td>
               

        
            </tr>

            <?php endwhile; ?>
    </tbody>
        </table>    
        
    </pre>



    <?php endif; ?>




<?php elseif (isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'failed') : ?>
    <h1 class="alert alert-warning">Tu pedido no ha podido ser procesado</h1>
<?php endif ?>