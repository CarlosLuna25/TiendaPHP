        </div>
        <!--finaliza el contenido central-->
        </div>
        <!--finaliza el row principal-->
        </div>
        <!--finaliza el contenedor principal-->
        <!--FOOTER-->
        <footer class="p-5 bg-dark mt-5">
            <div class="container-fluid text-white bg-dark mt-3 " style="width: 100%;">
                <div class="row justify-content-center">
                    <div class="col-4 text-center">

                        <h4>About US</h4>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ratione quibusdam
                            quaerat debitis illum dolorum perferendis repellendus rerum vero eius fugit?
                            Sit, eius. Eveniet similique magnam, sunt commodi minus ratione voluptatem!</p>
                    </div>
                    <div class="col-4 text-center ">
                        <h4>Categorias</h4>
                        <ul class="list-unstyled">
                            <li class="nav-item">
                                <a href="<?= base_url ?>" class="nav-link"> Inicio</a>
                            </li>

                            <?php $categorias1= helpers::showCategorias();
                            while ($cat1 = $categorias1->fetch_object()) : ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><?= $cat1->nombre ?></a>
                                </li>
                            <?php endwhile ?>
                        </ul>

                    </div>
                    <div class="col-4 text-center">

                        <h4>Social media</h4>


                    </div>
                </div>
                <div class="row justify-content-center bg-info">
                    &copy; Realizado por Carlos Luna 2020
                </div>
            </div>
        </footer>

        <script src="<?= base_url ?>Assets/js/jquery.js" crossorigin="anonymous"></script>
        <script src="<?= base_url ?>Assets/js/popper.min.js" crossorigin="anonymous"></script>
        <script src="<?= base_url ?>Assets/js/bootstrap.min.js" crossorigin="anonymous"></script>
        </body>

        </html>