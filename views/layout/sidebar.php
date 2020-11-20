<div class="container-fluid mt-5">
    <!-- container principal-->
    <div class="row ">
        <div class="col-3 bg-dark text-white p-4 ml-2" style="max-height:750px; border-radius: 5px;">

            <?php if(!isset($_SESSION['identidad'])):?>
                <form method="POST" action="<?=base_url; ?>usuario/login">
                    <h3 class="text-center">Inicia sesion</h3>
                    <div class="form-group ">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="pass">Password</label>
                        <input type="password" name="pass" class="form-control" placeholder="Password">
                    </div>
                    <a href="<?=base_url?>usuario/registro" class="text-white ml-2 btn btn-sm">No tienes una cuenta?. Registrate</a>
                    <br><br>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Iniciar Sesion</button>
                    </div>

                </form>
            <?php else: ?> <h3 class="text-center"><?= $_SESSION['identidad']->nombre . ' ' . $_SESSION['identidad']->apellido ?> </h3>
                <a class="nav-link btn btn-danger mb-2 " href="<?= base_url ?>usuario/logout">Cerrar Sesion</a>
                <a class="nav-link btn btn-success mb-2" href="<?= base_url ?>pedido/mispedidos">Mis pedidos</a>
                <h3 class="text-center">Carrito</h3>
                <a class="nav-link btn btn-success mb-2 " href="<?= base_url ?>carrito/index">ver el carrito</a>
                <a class="nav-link btn btn-success mb-2 " href="<?= base_url ?>carrito/index">Productosx en el carrito( <?= helpers::counterCarrito(); ?> )</a>
                <a class="nav-link btn btn-success mb-2 " href="<?= base_url ?>carrito/index">Total: <?=helpers::getTotal()?>$</a>
            <?php endif; ?>
            <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) : ?>
                <hr>
                <h3 class="text-center">admin bar</h3>
                <a class="nav-link btn btn-success mb-2 " href="<?= base_url ?>pedido/gestion">Gestionar pedidos</a>
                <a class="nav-link btn btn-success mb-2 " href="<?= base_url ?>categoria/index">Gestionar categorias</a>
                <a class="nav-link btn btn-success mb-2 " href="<?= base_url ?>producto/gestion">Gestionar productos</a>
            <?php endif; ?>





        </div>
        <!--contenido central-->

        <div class="col-8 text-center ">