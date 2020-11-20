<?php if(isset($editar) && isset($actual) && is_object($actual)): ?>
<h2>Editar producto <?=$actual->nombre?> <img src="<?= base_url ?>uploads/images/<?= $actual->img; ?>" class="rounded-circle" width="100" alt="<?= $actual->img; ?>"></h2>
<?php  $url_action=base_url."producto/save&id=".$actual->id;  ?>
<?php else: ?>
    <h2>Crear nuevo producto</h2>
    <?php //a donde apuntara la action del form depende de la variable edit 
    $url_action=base_url."producto/save"; ?>
<?php endif; ?>
<hr>


<form action="<?=$url_action?>" method="post" enctype="multipart/form-data">
    <div class="row ml-2">
        <div class="col-6 text-left">
            <label for="nombre">Nombre del producto:</label>
            <input type="text" class="form-control " value="<?=isset($actual)&&is_object($actual) ? $actual->nombre : "" ?>" name="nombre" id="" required>
        </div>
        <div class="col-6 text-left">
            <label for="nombre">Precio:</label>
            <input type="text" class="form-control " value="<?=isset($actual)&&is_object($actual) ? $actual->precio : "" ?>" name="precio" id="" required>
        </div>
    </div>
    <div class="row ml-2">
        <div class="col-4 text-left">
            <label for="nombre">Stock</label>
            <input type="number" class="form-control " value="<?=isset($actual)&&is_object($actual) ? $actual->stock : "" ?>" name="stock" id="" required>
        </div>
        <div class="col-4 text-left">
            <label for="nombre">Categoria</label>
            <select name="categoria" class="form-control" id="">
                <?php 
                while ($cat = $categorias->fetch_object()) : ?>
                    <option <?=isset($actual)&&is_object($actual) && $actual->categoria_id==$cat->id ? "selected" : "" ?> value="<?= $cat->id ?>"><?= $cat->nombre ?></option>

                <?php endwhile; ?>
            </select>
        </div>
        <div class="col-4 text-left">
            <label for="nombre">Imagen:</label>
            <input type="file" class="form-control-file " name="img" id="" >
        </div>
    </div>
    <div class="row ml-2">

        <div class="col-6  text-left">
            <label for="comment">Descripcion:</label>
            <textarea name="descripcion" class="form-control" rows="5" id="comment"><?=isset($actual)&&is_object($actual) ? $actual->descripcion : "" ?></textarea>
        </div>
        <div class="text-center mt-5 ml-5 pt-2">
            <input type="submit" name="enviar" value="Guardar" class="btn-primary btn-lg">

        </div>
    </div>

</form>