<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>TextilExport</title>

    <?php
    include_once './View/cabecera.php';
    ?>

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

    </style>


  </head>
  <body>

<main>
  <div class="container py-4">
    <header class="pb-3 mb-4 border-bottom">
      <div class="d-flex justify-content-around">


      <a href="#" class="d-flex align-items-center text-dark text-decoration-none">
      <i class="fa-solid fa-hand-holding-heart fa-bounce fa-2xl mx-3"></i>
        <span class="fs-4">TITULO</span>
      </a>

      <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fa-regular fa-user"></i> <?=isset($_SESSION['login_data']['Nombres'])? $_SESSION['login_data']['Nombres']:' Cuenta' ?>
        </button>
        <ul class="dropdown-menu dropdown-menu-dark">
        <?php
            if(!isset($_SESSION['login_data']['Nombres'])){
            ?>
          <li><a class="dropdown-item" href="<?= PATH ?>/Usuarios/login">Iniciar Session</a></li>
          <?php
            } else{ ?>
          <li><a class="dropdown-item" href="<?= PATH ?>/Usuarios/logout">Cerrar Session</a></li>
          <?php
            }
          ?>
        </ul>
      </div>

      </div>
    </header>

    <div class="p-5 mb-4 bg-light rounded-3 ">
      <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Parte Administrativa de la pagina [Titulo].</h1>
        <p class="col-md-8 fs-4">Como administrador puedes editar los recursos de la pagina web y ver los usuarios registrados.
        </p>
      </div>
    </div>

    <div class="row align-items-md-stretch">

      <div class="col-md-12">
        <div class="h-100 p-5 text-bg-dark rounded-3 ">
          <center>
            <i class="fa-solid fa-toolbox fa-2xl"></i>
            <h1>Administracion</h1>
            <p>Bienvenido <?=$_SESSION['login_data']['Nombres']?>, se encuentra en la interfaz administrativa.</p>
            <!-- <iframe src="https://docs.google.com/forms/d/e/1FAIpQLScPrFDaXIKgMM6MU_HQsDneCmWyRZu03Ds_wdfyP8jgP2eZDQ/viewform	" width="640" height="1660" frameborder="0" marginheight="0" marginwidth="0">Cargando…</iframe> -->
            <!-- <iframe src="https://drive.google.com/file/d/11UfBp6uXAHwRWwOodh0QFeB8yHtc3Gbx/preview" width="640" height="480" allow="autoplay"></iframe> -->
            <!-- <iframe width="560" height="315" src="https://youtu.be/hrxjBqZWsb0?si=3EYhGAkKjHSDpe1s" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe> -->
            <!-- <iframe width="560" height="315" src="https://www.youtube.com/embed/hrxjBqZWsb0?si=3EYhGAkKjHSDpe1s" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe> -->
            <!-- <iframe width="560" height="315" src="https://www.youtube.com/embed/hrxjBqZWsb0?si=3EYhGAkKjHSDpe1s" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe> -->
               <!-- <a href="https://drive.google.com/file/d/17b6kW0tbyV18qG85ZFWQjnWvmvc0Pz-n/view?usp=sharing" download="Documento.PDF">Descargar PDF</a> -->
          </center>
          <div class="d-flex justify-content-around">
            <a type="button" class="btn btn-light" href="<?=PATH?>/Test/create"><i class="fa-regular fa-file fa-lg"></i> Nuevo Recurso</a>
            <a type="button" class="btn btn-light" href="<?=PATH?>/Administracion"><i class="fa-solid fa-rotate-left fa-lg"></i> Regresar</a>
          </div>
        </div>
      </div>


    </div>

    <div class="row align-items-md-stretchS py-4">

       <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover table-responsive table-condensed" id="tabla" style="margin-top:20px;">
                <thead>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Recurso</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    <?php
                    foreach($tests as $test){
                    ?>
                    <tr>
                        <td><?=$test['ID']?></td>
                        <td><?=$test['Nombre']?></td>
                        <td><?=$test['Descripcion']?></td>
                        <td><?=$test['Recurso']?></td>
                        <td>
                          <a type="button" class="btn btn-primary m-2" href="<?= PATH.'/Test/edit/'.$test['ID']?>"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
                          <a type="button" class="btn btn-danger" href="<?= PATH ?>/Test/remove/<?= $test['ID'] ?>"><i class="fa-solid fa-delete-left"></i> Eliminar</button>
                          <!-- <a href="<?= PATH ?>/View/img/DP2.pdf" download="Documento.PDF">Descargar PDF</a>                          -->
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
        </table>
      </div>
    </div>


    </div>

    <footer class="pt-3 mt-4 text-muted border-top">
      Marco Gerardo Serrano Lopez SL182556
    </footer>
  </div>
</main>

  <?php
    include_once './View/Modales/VerCupon.php';
  ?>



<script>
    $(document).ready(function () {
        $('#tabla').DataTable();
    });
</script>

  </body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>