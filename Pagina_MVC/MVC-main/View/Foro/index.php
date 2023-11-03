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
                        <li class="nav-item"><a class="nav-link" href="<?=PATH?>/Documentos">Documentos</a></li>
                        <li class="nav-item"><a class="nav-link" href="#scroll">Foros</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">TEST</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Nosotros</a></li>
                    </ul>
                    <ul class="navbar-nav mt-auto">
                    <?php
                    if(!isset($_SESSION['login_data']['Nombres'])){            
                    ?>
                        <li class="nav-item"><a class="nav-link" href="<?=PATH?>/Usuarios/login">Iniciar Sesion</a></li>
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
        <header class="masthead text-center" style="background-color: #292828;">
            <div class="masthead-content">
                <div class="container px-5 ">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="card-title masthead-heading mb-0">Foros de Interes</h1>
                            <p class="card-text">Descripcion 1</p>
                            <p class="card-text">Descripcion 2</p>
                            <p class="card-text">Descripcion 3</p>
                            <!-- <iframe src="https://docs.google.com/forms/d/e/1FAIpQLScPrFDaXIKgMM6MU_HQsDneCmWyRZu03Ds_wdfyP8jgP2eZDQ/viewform?embedded=true" width="640" height="1608" frameborder="0" marginheight="0" marginwidth="0">Cargando…</iframe> -->
                            <a href="#scroll" class="btn btn-primary">Explorar</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        
        <!-- Content section 1-->
        <section id="scroll" style="background-color: #343434;">
            <div class="container px-5 ">
                <div class="row gx-5 align-items-center">
                    <?php
                    foreach($foros as $foro){
                    ?>
                    <div class="col-lg-12">
                        <div class="p-3">
                            <div class="card border-light mb-3">
                                <div class="card-header">No: <?=$foro['ID_FORO']?></div>
                                    <div class="card-body">
                                        <h5 class="card-title"><?=$foro['Titulo']?></h5>
                                        <p class="card-text"><?=$foro['Descripcion']?></p>
                                        <?php
                                        if(!isset($_SESSION['login_data']['Nombres'])){
                                        ?>
                                        <a type="button" class="btn btn-warning" href="<?=PATH?>/Usuarios/login">Ingresa sesion para continuar</a>
                                        <?php
                                        }else{
                                        ?>
                                        <a type="button" class="btn btn-dark" href="<?= PATH.'/Foro/Vista/'.$foro['ID_FORO']?>">Ingresar</a>
                                        <?php
                                        }
                                        ?>
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
        <section style="background-color: #B6B6B6;">
            <div class="container px-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="p-5"><img class="img-fluid rounded-circle" src="<?=PATH?>/View/assets/img/02.jpg" alt="..." /></div>
                    </div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <h2 class="display-4">FOROS INTERACTIVOS!</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod aliquid, mollitia odio veniam sit iste esse assumenda amet aperiam exercitationem, ea animi blanditiis recusandae! Ratione voluptatum molestiae adipisci, beatae obcaecati.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Content section 3-->
        <section class="bg-dark">
            <div class="container px-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6 order-lg-2">
                        <div class="p-5"><img class="img-fluid rounded-circle" src="<?=PATH?>/View/assets/img/03.jpg" alt="..." /></div>
                    </div>
                    <div class="col-lg-6 order-lg-1">
                        <div class="p-5 text-white">
                            <h2 class="display-4">COMPARTE TUS OPINIONES!</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod aliquid, mollitia odio veniam sit iste esse assumenda amet aperiam exercitationem, ea animi blanditiis recusandae! Ratione voluptatum molestiae adipisci, beatae obcaecati.</p>
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