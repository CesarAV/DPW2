<?php
include("comun/session-handler.php");
?>
<!DOCTYPE html>
<html lang="es-MX">

<head>
  <?php
  // elementos comunes del cuerpo 
  include('head-interno.html');
  ?>
</head>

<body>
  <?php
  // elementos comunes del cuerpo 
  $todosLosMenus = true;
  include('comun/menu-y-header.php');
  ?>
  <div id="contenido">
    <section>
      <article>
        Un colegio para la educación integral de los alumnos,
        con instalaciones amplias y seguras,
        ideales para motivar a la concentración y crecimiento.
      </article>
    </section>
  </div>
  <?php
  // elementos comunes del cuerpo 
  include('footer.html');

  $version = phpversion();
  print 'PHP version: ' . $version;
  ?>
</body>

</html>