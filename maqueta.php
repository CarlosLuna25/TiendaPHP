<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="Assets/css/style.css">
    <style>

    </style>
    <title>Bienvenidos a la tienda</title>
</head>

<body>
    <!--CABECERA-->


    <!-- navbarr-->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark ">
        <a href="" class="navbar-brand">
            <img src="Assets/img/Logo1.png" class="rounded-circle" width="50" alt=""> Games Shop
        </a>
        <!-- Links -->
        <div class="container">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Categoria 1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Categoria 2</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Categoria 3</a>
                </li>
            </ul>
        </div>


    </nav>


    <div class="container-fluid mt-5">
        <!-- container principal-->
        <div class="row">
            <div class="col-3 bg-dark text-white p-4 ml-2"  style="max-height:750px; border-radius: 5px;">
                <!--barra lateral-->
                <form method="POST" action="">
                    <div class="form-group bg-">
                        <label for="Email">Email</label>
                        <input type="email" class="form-control" name="Email" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="pass">Password</label>
                        <input type="password" name="pass" class="form-control" placeholder="Password">
                    </div>

                    <button type="submit" class="btn btn-primary">Iniciar Sesion</button>
                </form>
                <div class="sub-menu ">
                    <a class="nav-link" href="#">Gestionar pedidos</a>
                    <a class="nav-link" href="#">Mis pedidos</a>
                    <a class="nav-link" href="#">Categoria 3</a>
                    <a class="nav-link" href="#">Categoria 3</a>
                </div>


            </div>
            <!--contenido central-->

            <div class="col-8 text-center">
                <h1>Ultimos Juegos agregados</h1>
                <div class="row">
                    <!-- card de ultimos agregados-->
                    <div class="col-4 mt-2 ">

                        <div class="card" style="width: 100%">
                            <a href="">
                                <img class="card-img-top" width="35" height="200" src="Assets/img/aprobado.png" alt="Card image cap">
                            </a>

                            <div class="card-body">

                                <h5 class="card-title text-left">

                                    Card title
                                    <span class="ml-3">$12</span>

                                </h5>
                                <h6 class="card-subtitle text-muted text-left">Categoria y fecha</h6>
                                <div class="card-text mt-2">
                                    <a href="#" class="btn btn-success">Comprar</a>
                                </div>

                            </div>
                        </div>


                    </div>

                    <div class="col-4 mt-2 ">

                        <div class="card" style="width: 100%">
                            <a href="">
                                <img class="card-img-top" width="35" height="200" src="Assets/img/aprobado.png" alt="Card image cap">
                            </a>

                            <div class="card-body">

                                <h5 class="card-title text-left">

                                    Card title
                                    <span class="ml-3">$12</span>

                                </h5>
                                <h6 class="card-subtitle text-muted text-left">Categoria y fecha</h6>
                                <div class="card-text mt-2">
                                    <a href="#" class="btn btn-success">Comprar</a>
                                </div>

                            </div>
                        </div>


                    </div>


                    <div class="col-4 mt-2 ">

                        <div class="card" style="width: 100%">
                            <a href="">
                                <img class="card-img-top" width="35" height="200" src="Assets/img/aprobado.png" alt="Card image cap">
                            </a>

                            <div class="card-body">

                                <h5 class="card-title text-left">

                                    Card title
                                    <span class="ml-3">$12</span>

                                </h5>
                                <h6 class="card-subtitle text-muted text-left">Categoria y fecha</h6>
                                <div class="card-text mt-2">
                                    <a href="#" class="btn btn-success">Comprar</a>
                                </div>

                            </div>
                        </div>


                    </div>

                    <div class="col-4 mt-2 ">

                        <div class="card" style="width: 100%">
                            <a href="">
                                <img class="card-img-top" width="35" height="200" src="Assets/img/aprobado.png" alt="Card image cap">
                            </a>

                            <div class="card-body">

                                <h5 class="card-title text-left">

                                    Card title
                                    <span class="ml-3">$12</span>

                                </h5>
                                <h6 class="card-subtitle text-muted text-left">Categoria y fecha</h6>
                                <div class="card-text mt-2">
                                    <a href="#" class="btn btn-success">Comprar</a>
                                </div>

                            </div>
                        </div>


                    </div>
                    


                    
                </div>
                <a href="#" class="btn btn-success mt-5">Ver todos los productos</a>
            </div>

        </div>







    </div>



    <!--FOOTER-->
    <footer  class="p-5 bg-dark">
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
                        <li><a href="">categoria 1</a></li>
                        <li><a href="">categoria 1</a></li>
                        <li><a href="">categoria 1</a></li>
                        <li><a href="">categoria 1</a></li>
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

    <script src="Assets/js/jquery.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="Assets/js/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="Assets/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>