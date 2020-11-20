<h1>Gestion de productos</h1>
<hr>
<div class="row align-content-end">
    <div class="col-3 offset-9">
        <a href="<?= base_url ?>producto/crear" class="btn btn-success mb-3"><i class="fas fa-plus-circle"></i> Crear</a>
    </div>


</div>
<!--SESIONES AL CREAR PRODUCTO-->
<?php if (isset($_SESSION['producto'])) : ?>
    <?php if ($_SESSION['producto'] == 'Complete') : ?>
        <div class="alert alert-success" role="alert">
            Producto registrado exitosamente
        </div>
    <?php elseif($_SESSION['producto'] == 'Failed') : ?>
        <div class="alert alert-danger" role="alert">
            Error al registrar el producto
        </div>
    <?php endif; ?>
<?php endif;

helpers::deleteSesion('producto');
?>
<!--SESIONES WARNING IMAGE-->
<?php if (isset($_SESSION['imagen'])) : ?>
    <div class="alert alert-warning" role="alert">
            La imagen subida no corresponde a un formato valido se asigno imagen por defecto
        </div>
<?php endif; helpers::deleteSesion('imagen');?>


<!--SESIONES AL BORRAR PRODUCTO-->
<?php if (isset($_SESSION['delete']) && $_SESSION['delete']=='Failed' )  : //para cuando el id no es valido ?>
    <div class="alert alert-danger" role="alert">
           Error al borrar el producto... ID inexistente
        </div>
<?php endif; ?>
<?php if (isset($_SESSION['delete']) && $_SESSION['delete']=='Complete' )  : ?>
    <div class="alert alert-success" role="alert">
          Producto eliminado exitosamente
        </div>
<?php endif;?>
<?php if (isset($_SESSION['delete']) && $_SESSION['delete']=='NotId' )  : ?>
    <div class="alert alert-danger" role="alert">
           Faltan parametros
        </div>
<?php endif; helpers::deleteSesion('delete');?>

<table class="table table-bordered text-center">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th scope="col">Imagen</th>

            <th scope="col">Nombre</th>
            <th scope="col">categoria</th>
            <th scope="col">precio</th>
            <th scope="col">Stock</th>
            <th scope="col">fecha</th>
            <th scope="col">acciones</th>


        </tr>
    </thead>
    <tbody>

        <?php

        while ($prod = $productos->fetch_object()) :
        ?><tr>
                <th scope="row"> <?= $prod->id; ?>)</th>
                <td><img src="<?= base_url ?>uploads/images/<?= $prod->img; ?>" class="rounded-circle" width="40" alt="<?= $prod->img; ?>"></td>
                <td><?= $prod->nombre; ?></td>
                <td><?= $prod->categoria; ?></td>
                <td><?= $prod->precio; ?>$</td>
                <td><?= $prod->stock; ?></td>
                <td><?= $prod->fecha; ?></td>

                <td><a href="<?=base_url?>producto/editar&id=<?=$prod->id?>" class="btn btn-sm btn-primary text-center">Editar <i size="3x" class="fas fa-edit "></i></a>
                 <a href="<?=base_url?>producto/eliminar&id=<?=$prod->id?>" class="btn btn-danger btn-sm">Borrar <i class="fas fa-trash"></i> </a></td>


            <?php endwhile; ?>
            </tr>

    </tbody>


</table>