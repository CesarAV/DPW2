<?php
include("../comun/session-handler.php");
$redirectHome = false;
include_once('../usuario/usuario-firmado.php');
?>
<!DOCTYPE html>
<html lang="es-MX">

<head>
  <style data-merge-styles="true"></style>
  <meta charset="utf-8">
  <?php
  include('../comun/head-interno.html');
  ?>
  <title>Test</title>
</head>

<body>
  <?php
  include('../menu.php')
  ?>
  <main>
    <div class="centrado">
      <?php include('../comun/carousel.php')?>
    </div>

    Lorem ipsum<br>
    Lorem ipsum<br>
  </main>

</body>

<script>
  //  const myCarouselElement = document.querySelector('#carouselIM')
  //
  //  const carousel = new bootstrap.Carousel(myCarouselElement, {
  //    interval: 2000,
  //    touch: true
  //  })
</script>

</html>