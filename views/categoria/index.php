<h1>Gestion de categorias</h1>
<hr>
<div class="row align-content-end">
    <div class="col-3 offset-9">
    <a href="<?=base_url?>categoria/crear" class="btn btn-success mb-3" ><i class="fas fa-plus-circle"></i> Crear</a>
    </div>

</div>

<table class="table">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Acciones</th>
            
        </tr>
    </thead>
    <tbody>   

    <?php
 
while ($cat = $categorias->fetch_object()) :
?><tr>
     <th scope="row">  <?= $cat->id; ?>)</th>
      
    <td><?= $cat->nombre; ?></td>

    <td><a href="">Editar</a> <a href="">Borrar </a></td>
  

<?php endwhile; ?>
     </tr>     
     
    </tbody>


</table>
