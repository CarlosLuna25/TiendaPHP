<h1>Algunos de nuestros Juegos</h1>
<hr>

                <div class="row">
                    <!-- card de ultimos agregados-->
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
                                <h6 class="card-subtitle text-muted text-left">Categoria: <a href="<?=base_url?>categoria/ver&id=<?=$prod->categoria_id?>" class="text-dark"><?=$prod->categoria?></a> </h6>
                                <div class="card-text mt-2">
                                    <a href="<?=base_url?>/carrito/add&id=<?=$prod->id?>" class="btn btn-success">Comprar</a>
                                </div>

                            </div>
                        </div>


                    </div>
                    <?php endwhile;  ?>
                    



                    
                </div>
                <a href="#" class="btn btn-success mt-5">Ver todos los productos</a>