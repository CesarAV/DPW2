<?php 
  include_once($_SERVER["DOCUMENT_ROOT"] . "/usuario/usuario-firmado.php"); 
  $version = 'PHP v. ' . phpversion();
  ?>

  <nav class="navbar navbar-expand-sm fixed-top bg-body-secondary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#" title="Instituto México. <?=$version?>">IM</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="inicio" href="/index.php">Inicio</a>
          </li>
          <?php
          if (!isset($usuarioFirmado)) {
          ?>
            <!--li class="nav-item">
              <a class="nav-link active" title="Registro" href="/usuario/registrar.php">Registrarse</a>
            </li-->
            <li class="nav-item">
              <a class="nav-link active" title="Registro seguro" href="/usuario/registrar-captcha.php">Registrarse</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" title="Inicio de sesion" href="/usuario/iniciar-sesion.php">Iniciar sesi&oacute;n</a>
            </li>
            <?php
          } else {
            if (isset($todosLosMenus) && $todosLosMenus == true) {
              // menu de acuerdo con el tipo de firmadousuario
              $menus = $usuarioFirmado->menuPorTipo();
              // print_r($menus);
              foreach (array_keys($menus) as $k) {
                // print_r($menu);
                // print_r(array_keys($menu));
                foreach ($menus[$k] as $descr => $url) {
                  //print_r("$descr\n");
                  //print_r($url);
                  // print_r($menus[$d]);
            ?>
                  <li class="nav-item">
                    <a class="nav-link active" title="<?= $descr ?>" href="<?= $url ?>"><?= $descr ?></a>
                  </li>
            <?php
                }
              }
            }
            ?>
            <li class="nav-item">
              <a class="nav-link active" title="Fin de sesion" href="/usuario/cerrar-sesion.php">Salir</a>
            </li>
          <?php
          }
          ?>
        </ul>
      </div>
    </div>
  </nav>
