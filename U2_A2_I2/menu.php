<?php include_once($_SERVER["DOCUMENT_ROOT"]."/usuario/usuario-firmado.php"); ?>
<nav class="menu-principal">
  <div class="menu">
    <div><a title="Inicio" href="/index.php">Inicio</a></div>
<?php
    if (!isset($usuarioFirmado)) {
      ?>
      <div><a title="Registro" href="/usuario/registrar.php">Registrarse</a></div>
      <div><a title="Inicio de sesion" href="/usuario/iniciar-sesion.php">Iniciar sesi&oacute;n</a></div>
    <?php
    } else {
      if(isset($todosLosMenus) && $todosLosMenus == true) {
        // menu de acuerdo con el tipo de firmadousuario
        $menus = $usuarioFirmado->menuPorTipo();
        // print_r($menus);
        foreach(array_keys($menus) as $k) {
          // print_r($menu);
          // print_r(array_keys($menu));
          foreach($menus[$k] as $descr=>$url) {
             //print_r("$descr\n");
             //print_r($url);
             // print_r($menus[$d]);
            ?>
          <div><a title="<?php echo $descr?>" href="<?php echo $url?>"><?php echo $descr?></a></div>
          <?php
          }
        }
      }
    ?>
      <div><a title="Fin de sesion" href="/usuario/cerrar-sesion.php">Salir</a></div>
    <?php
    }
    ?>

    <!--div><a href="/usuario/listado.php">Usuarios</a></div-->
  </div>
  <hr>
  <?php include('mensaje.php');?>
</nav>