<?php if (isset($actual) && !empty($actual)) : ?>

    <h4 class="card-title"><?= $actual->nombre ?> <?= $actual->precio ?>$ </h4>
    <div class="card mb-3" style="width: 100%;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="<?= base_url ?>uploads/images/<?= $actual->img ?>" class="card-img" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    
                    <div class="text-left">
                        <p class="card-subtitle text-muted">Categoria: <a href="<?= base_url ?>categoria/ver&id=<?= $actual->categoria_id ?>"><?= $actual->categoria ?></a></p>
                        <small class="card-subtitle text-muted">Unidades disponibles: <?= $actual->stock ?></small>
                    </div>
                    <hr>
                    <h5>Descripcion del juego</h5>
                    <p class="card-text text-left"><?= $actual->descripcion ?></p>

                </div>
                <hr>
                <div class="">

                    <small class="card-title text-muted mb-5">Fecha de publicacion: <?= $actual->fecha ?></small> <br>

                    <?php if ($actual->stock >= 1) : ?>
                        <a href="<?=base_url?>/carrito/add&id=<?=$actual->id?>" class="btn btn-primary mt-3">Añadir al carrito</a>

                        <a href="<?=base_url?>/carrito/add&id=<?=$actual->id?>" class="btn btn-success mt-3">Comprar</a>
                    <?php else : ?>
                        <div class="alert alert-danger"> PRODUCTO AGOTADO</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php else : ?>
    <div class="alert alert-danger">
        <h1>No existe el producto solicitado</h1>
    </div>
<?php endif; ?>