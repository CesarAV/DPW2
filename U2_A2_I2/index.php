<?php
include("comun/session-handler.php");
$redirectHome = false;
include_once('usuario/usuario-firmado.php');
?>
<!DOCTYPE html>
<html lang="es-MX">

<head>
  <?php
  // elementos comunes del cuerpo 
  include('comun/head-interno.html');
  ?>
</head>

<body>
  <?php
  // elementos comunes del cuerpo 
  $todosLosMenus = true;
  include('menu.php');
  ?>
  <main role="main" class="container" id="contenido">
    <?php
    include('comun/bienvenido.php');
    include('header.php');
    ?>

    <section>
      <div class="container-fluid text-center">
        <div class="row">
          <div class="col">
            Un colegio para la educación integral de los alumnos,
            con instalaciones amplias y seguras,
            ideales para motivar a la concentración y crecimiento.
          </div>
        </div>
      </div>
    </section>

    <div class="centrado row">
      <div class="col-md-9 col-sm-12">
        <?php include('comun/carousel.php'); ?>
      </div>
    </div>
    <hr>

    <?php include('comun/grid-carreras.php'); ?>

    <?php include('comun/grid-comentarios.php'); ?>

  </main>

  <?php
  // elementos comunes del cuerpo 
  include('footer.php');
  ?>

  </div>
</body>

</html>