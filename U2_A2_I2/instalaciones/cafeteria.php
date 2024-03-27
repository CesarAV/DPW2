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
  <header>Cafetería</header>
  <main role="main" class="container" id="contenido">
    <section>
      <div class="container-fluid text-center">
        <div class="row">
          <div class="col">
            Una cafetería con deliciosas recetas
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <img src="/imagenes/Cofee&cookiebox.jpg" class="img-fluid" alt="cafeteria">
          </div>
            <div class="col-md-12 derecho-autor">
            <a href="https://commons.wikimedia.org/wiki/File:Cofee%26cookiebox.JPG">Vee O</a>, CC0, via Wikimedia Commons
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