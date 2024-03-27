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
  <header>Aulas</header>
  <main role="main" class="container" id="contenido">
    <section>
      <div class="container-fluid text-center">
        <div class="row">
          <div class="col">
            Aulas con asientos de estadio y pizarrones electrónicos
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <img src="/imagenes/640px-Universidad_Nacional_de_Córdoba_Facultad_de_Psicología_Aula_A.jpg" class="img-fluid" alt="aula">
          </div>
            <div class="col-md-12 derecho-autor">
            <a href="https://commons.wikimedia.org/wiki/File:Universidad_Nacional_de_C%C3%B3rdoba_Facultad_de_Psicolog%C3%ADa_Aula_A.jpg">Carlosdisogra</a>, <a href="https://creativecommons.org/licenses/by-sa/4.0">CC BY-SA 4.0</a>, via Wikimedia Commons
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