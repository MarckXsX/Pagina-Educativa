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
                        <li class="nav-item"><a class="nav-link" href="#!">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?=PATH?>/Documentos">Documentos</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?=PATH?>/Foro">Foros</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Test</a></li>
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
        <header class="masthead text-center text-white">
            <div class="masthead-content">
                <div class="container px-5">
                    <h1 class="masthead-heading mb-0">A TU ALCANCE</h1>
                    <h2 class="masthead-subheading mb-0">ESTA EL APRENDIZAJE</h2>
                    <a class="btn btn-primary btn-xl rounded-pill mt-5" href="#scroll">Saber mas</a>
                </div>
            </div>
            <div class="bg-circle-1 bg-circle"></div>
            <div class="bg-circle-2 bg-circle"></div>
            <div class="bg-circle-3 bg-circle"></div>
            <div class="bg-circle-4 bg-circle"></div>
        </header>
        
        <!-- Content section 1-->
        <section id="scroll">
            <div class="container px-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6 order-lg-2">
                        <div class="p-5"><img class="img-fluid rounded-circle" src="<?=PATH?>/View/assets/img/01.jpg" alt="..." /></div>
                    </div>
                    <div class="col-lg-6 order-lg-1">
                        <div class="p-5">
                            <h2 class="display-4">Titulo1</h2>
                            <p>Descripcion</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Content section 2-->
        <section>
            <div class="container px-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="p-5"><img class="img-fluid rounded-circle" src="<?=PATH?>/View/assets/img/02.jpg" alt="..." /></div>
                    </div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <h2 class="display-4">Titulo2!</h2>
                            <p>Descripcion</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Content section 3-->
        <section>
            <div class="container px-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6 order-lg-2">
                        <div class="p-5"><img class="img-fluid rounded-circle" src="<?=PATH?>/View/assets/img/03.jpg" alt="..." /></div>
                    </div>
                    <div class="col-lg-6 order-lg-1">
                        <div class="p-5">
                            <h2 class="display-4">Titulo3!</h2>
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
