<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Pagina Web</title>
        <link rel="icon" type="image/x-icon" href="<?=PATH?>/View/assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?=PATH?>/View/assets/css/styles.css" rel="stylesheet" />
        
        
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
            <div class="container px-5">
                <a class="navbar-brand" href="#page-top">TITULO</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item"><a class="nav-link" href="<?=PATH?>/Inicio">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link" href="#scroll">Documentos</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?=PATH?>/Foro">Foros</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Nosotros</a></li>
                    </ul>
                    <ul class="navbar-nav mt-auto">
                    <?php
                    if(!isset($_SESSION['login_data']['Nombres'])){            
                    ?>
                        <li class="nav-item"><a class="nav-link" href="<?=PATH?>/Usuarios/login">Iniciar Seccion</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?=PATH?>/Usuarios/register">Registro</a></li>
                    <?php
                    } else{ ?>
                        <li class="nav-item"><a class="nav-link" href=""><?=($_SESSION['login_data']['Nombres'])?></a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= PATH ?>/Usuarios/logout">Cerrar Sesion</a></li>
                    <?php
                    }
                    ?>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header>
        
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="<?=PATH?>/View/assets/img/Carrucel1.jpg"  class="d-block w-100 " alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h1 class="fs-1">BIENVENIDO</h1>
                            <p class="fs-1">Dispondra de diferentes recursos para el aprendizaje.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="<?=PATH?>/View/assets/img/Carrucel2.jpg"   class="d-block w-100 " alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h1 class="fs-1">TItulo 2</h1>
                            <p class="fs-1">Descripcion 2.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="<?=PATH?>/View/assets/img/Carrucel3.jpg"  class="d-block w-100 " alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h1 class="fs-1">Titulo 3</h1>
                            <p class="fs-1">Descripcion 3.</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

        </header>
        
        <!-- Content section 1-->
        <section id="scroll" style="background-color: #343434;">
            <div class="container px-5 ">
                <div class="row gx-5 align-items-center">
                    <!-- <div class="col-lg-6 order-lg-2">
                        <div class="p-5"><img class="img-fluid rounded-circle" src="<?=PATH?>/View/assets/img/01.jpg" alt="..." /></div>
                    </div> -->
                    <?php
                    foreach($documentos as $documento){
                    ?>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="card border-light mb-3">
                                <div class="card-header">No: <?=$documento['ID']?></div>
                                    <div class="card-body">
                                        <h5 class="card-title"><?=$documento['Nombre']?></h5>
                                        <p class="card-text">Tipo de recurso: <?=$documento['Tipo']?></p>
                                        <a type="button" class="btn btn-dark" href="<?= PATH.'/Documentos/Vista/'.$documento['ID']?>">Ver mas</a>
                                        <!-- <iframe width="560" height="315" src="<?=$documento['Recurso']?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe> -->
                                    </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </section>
        <!-- Content section 2-->
        <section>
            <div class="container px-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="p-5"><img class="img-fluid rounded-circle"  alt="..." /></div>
                    </div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <h2 class="display-4">Titulo1!</h2>
                            <p>Descripcion</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Content section 3-->
        <section style="background-color: #343434;">
            <div class="container px-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6 order-lg-2">
                        <div class="p-5"><img class="img-fluid rounded-circle"  alt="..." /></div>
                    </div>
                    <div class="col-lg-6 order-lg-1">
                        <div class="p-5 text-white">
                            <h2 class="display-4">Titulo2!</h2>
                            <p>Descripcion</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-black">
            <div class="container px-5"><p class="m-0 text-center text-white small">Copyright &copy; Your Website 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="<?=PATH?>/View/assets/js/scripts.js"></script>
    </body>
</html>
