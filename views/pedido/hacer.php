<?php if(isset($_SESSION['identidad'])): ?>
<h1>HACER PEDIDO</h1>
<hr>
<div class="text-left">
    <a href="<?=base_url?>carrito/index">Ver productos y precio del pedido</a>
    <hr>
    <h3>Direccion para el envio</h3>
</div>

<form action="<?=base_url?>pedido/add" method="post" class="mt-3">
    <div class="row">
        <div class="col-3"> <label for="estado">Estado: </label>
        <input type="text" name="estado" required id="" class="form-control"></div>
       
        <div class="col-3"><label for="estado">Municipio: </label>
        <input type="text" name="municipio" required id="" class="form-control"></div>
        <div class="col-6"><label for="estado">Direccion: </label>
        <input type="text" name="direccion" required id="" class="form-control"></div>
    </div>
    <input class="mt-3 btn btn-success" type="submit" value="Confirmar">
</form>
<?php else: 
       ?>
<h3 class="alert alert-warning"> Necesitas estar identificado para poder realizar el pedido</h3>
<?php endif; ?>