<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=base_url?>Assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url?>Assets/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <style>

    </style>
    <title>Welcome to GamesShop</title>
</head>

<body>
    <!--CABECERA-->

    <?php $categorias= helpers::showCategorias();?>
    <!-- navbarr-->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark ">
        <a href="" class="navbar-brand">
            <img src="<?=base_url?>Assets/img/Logo1.png" class="rounded-circle" width="50" alt=""> Games Shop
        </a>
        <!-- Links -->
        <div class="container">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="<?=base_url?>" class="nav-link"> Inicio</a>
                </li>

                <?php while($cat= $categorias->fetch_object()): ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url?>categoria/ver&id=<?=$cat->id?>"><?=$cat->nombre?></a>
                </li>
                <?php endwhile ?>
                
            </ul>
        </div>


    </nav>

