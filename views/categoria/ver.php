<?php if(isset($cat_actual) && $cat_actual): ?>
<h1><?=$cat_actual->nombre?></h1>
<hr>
<?php else: ?>
   <div class="alert alert-danger"> <h1>No existe</h1></div>
<?php endif;?>

<?php if (isset($productos) && $productos->num_rows>=1): ?>
    <div class="row">
    <?php while($prod=$productos->fetch_object()): ?>
                    <div class="col-4 mt-2 ">

                        <div class="card" style="width: 100%">
                            <a href="<?= base_url ?>producto/ver&id=<?= $prod->id?>">
                                <img class="card-img-top" width="35" height="200" src="<?= base_url ?>uploads/images/<?=$prod->img?>" alt="Card image cap">
                            </a>

                            <div class="card-body">

                                <h5 class="card-title text-left">

                                <a href="<?= base_url ?>producto/ver&id=<?= $prod->id?>"> <?=substr($prod->nombre,0,15)?></a>
                                    <span class="ml-3">$<?=$prod->precio?></span>

                                </h5>
                                <h6 class="card-subtitle text-muted text-left">fecha: <?=$prod->fecha?></h6>
                                <div class="card-text mt-2">
                                    <a href="<?=base_url?>/carrito/add&id=<?=$prod->id?>" class="btn btn-success">Comprar</a>
                                </div>

                            </div>
                        </div>


                    </div>
                    <?php endwhile;  ?>
    </div>
<?php else: ?>
    <div class="alert alert-warning"> <h1>No hay productos en esta categoria</h1></div>
<?php endif;?>
