<h1>Crear Categoria</h1>
<h2> 
<?php 
    if(isset($_SESSION['registro']) && $_SESSION['registro']=='Complete'):?>
        <div class="alert alert-success" role="alert">
  Registro Compledato con exito
</div>
   <?php
     elseif(isset($_SESSION['registro']) && $_SESSION['registro']=='Failed'): ?>
        <div class="alert alert-danger" role="alert">
  Falla en el registro
</div>
  
   <?php  
   
   endif;
   helpers::deleteSesion('registro');

    
     
    ?>
</h2>
    <div class="col-6 offset-3">
        <form class=" text-left ml-3" action="<?=base_url?>categoria/save" method="post">
        <?php echo isset($_SESSION['errores'])? helpers::MostrarErrores($_SESSION['errores'],'nombre') : '';   ?>
            <label for="nombre">Nombre de categoria</label>
            <input type="text" class="form-control " name="nombre" id="" required>
            <br>
           
            <div class="text-center">
            <input type="submit" name="enviar" value="Crear" class="btn-primary btn-lg">

            </div>
        </form>
    </div>