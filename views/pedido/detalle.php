<h1>Detalle del pedido </h1>
<hr>
<?php if (isset($pedido)) : ?>
            <?php if(isset($_SESSION['admin'])): ?>
            <h3>Cambiar el estado del pedido</h3>
            <form action="<?=base_url?>pedido/estado" method="post">
            <input type="hidden" name="pedido_id" value="<?=$pedido->id?>"/>
                <select name="estado" id="">
                    <option value="confirmado" <?=$pedido->estado_pedido=='confirmado' ? 'selected' : '' ?>>Pendiente</option>
                    <option value="preparacion" <?=$pedido->estado_pedido=='preparacion' ? 'selected' : '' ?>>En preparacion</option>
                    <option value="listo" <?=$pedido->estado_pedido=='listo' ? 'selected' : '' ?>>Preparado para el envio</option>
                    <option value="enviado"<?=$pedido->estado_pedido=='enviado' ? 'selected' : '' ?>>Enviado</option>
                    <option value="entregado"<?=$pedido->estado_pedido=='entregado' ? 'selected' : '' ?>>Entregado</option>
                </select>
                <input type="submit" class="btn btn-primary" value="Cambiar">
            </form>
            <br>
            <?php endif; ?>
        
       <div class="text-left">
       <h3>Direccion de envio</h3>
       
       Estado: <?=$pedido->estado?> <br>
        Municipio: <?= $pedido->municipio ?> <br>
        Direccion: <?= $pedido->direccion ?> <br>
       </div>
       <hr>
        <h3>Datos del pedido</h3>

        <pre>
        Estado del pedido: <?= helpers::showStatus($pedido->estado_pedido) ?> <br>
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