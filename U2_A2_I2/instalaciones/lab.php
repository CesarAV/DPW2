<!DOCTYPE html>
<html lang="es-MX">

<head>
  <title>Jardines Instituto México</title>  
  <?php
  // elementos comunes del cuerpo 
  include('../comun/head-interno.html');
  include_once('../usuario/usuario.php');
  $todosLosMenus = false;
  $redirectHome = false;
  ?>
</head>

<body>
  <?php include('../menu.php'); ?>
  <header>Laboratorio</header>
  <main role="main" class="container" id="contenido">
    <section>
      <div class="container-fluid text-center">
        <div class="row">
          <div class="col">
            Laboratorio de química perfectamente equipado
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <img src="/imagenes/640px-Lab_bench.jpg" class="img-fluid" alt="laboratorio">
          </div>
            <div class="col-md-12 derecho-autor">
            <a href="https://commons.wikimedia.org/wiki/File:Lab_bench.jpg">Magnus Manske</a>, <a href="https://creativecommons.org/licenses/by/1.0">CC BY 1.0</a>, via Wikimedia Commons
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php
  // elementos comunes del cuerpo 
  include('../footer.php');
  ?>

  </div>
</body>

</html>