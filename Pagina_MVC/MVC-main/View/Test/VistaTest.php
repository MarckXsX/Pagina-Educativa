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
                        <li class="nav-item"><a class="nav-link" href="<?=PATH?>/Foro">Foros</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?=PATH?>/Test">Test</a></li>
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
        <header class="masthead text-center" style="background-color: #292828; padding-top: calc(10rem + 55px); padding-bottom: 8rem;">
            <div class="masthead-content">
                <div class="container px-5 ">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="card-title masthead-heading mb-0"><?=$test['Nombre']?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        
        <!-- Content section 1-->
        <section id="scroll" style="background-color: #343434;">
            <div class="container p-5 ">
                <div class="row gx-5 align-items-center masthead text-center">
                <div class="masthead-content">
                <div class="container px-5 ">
                    <div class="card">
                        <div class="card-body" >
                            <p class="card-title masthead-heading mb-0 fs-4 py-4"><?=$test['Descripcion']?></p>                        
                            <iframe src="<?=$test['Recurso']?>" width="640" height="600" frameborder="0" marginheight="0" marginwidth="0">Cargando…</iframe>                                                             
                        </div>
                    </div>
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