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
  <header>Cancha</header>
  <main role="main" class="container" id="contenido">
    <section>
      <div class="container-fluid text-center">
        <div class="row">
          <div class="col">
            Canchas techadas y con pasto natural
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <img src="/imagenes/7-aside_football_game_in_Wajir-Kenya.jpg" class="img-fluid" alt="cancha">
          </div>
            <div class="col-md-12 derecho-autor">
            <a href="https://commons.wikimedia.org/wiki/File:7-aside_football_game_in_Wajir-Kenya.jpg">Ahmed Abdi Muhumed</a>, <a href="https://creativecommons.org/licenses/by-sa/4.0">CC BY-SA 4.0</a>, via Wikimedia Commons
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