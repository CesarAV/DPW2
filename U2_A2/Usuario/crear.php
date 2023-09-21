<!DOCTYPE html>
<html lang="es-MX">
    <head>
        <title>Usuario</title>
        <?php
            // elementos comunes del cuerpo 
            include('../head-interno.html');
        ?>
        <script src="/scripts/validar.js"></script>
        <script src="/scripts/usuario.js"></script>
    </head>
    <body>        
        <?php
            // elementos comunes del cuerpo 
            include('../header.html');
            include('../menu.php');
            include("usuario.php");

            $usuario = new Usuario();
            if(isset($_POST) && !empty($_POST)){
                $idusuario = $_POST['IDUsuario'];
                $nombre = $_POST['Nombre'];
                $apellidoPaterno = $_POST['ApellidoPaterno'];
                $apellidoMaterno = $_POST['ApellidoMaterno'];
                $departamento = $_POST['Departamento'];
                $tipoUsuario = $_POST['TipoUsuario'];
                $password = $_POST['Password'];

                $res = $usuario->crearUsuario($idusuario,
                    $nombre, 
                    $apellidoPaterno,
                    $apellidoMaterno,
                    $departamento,
                    $tipoUsuario,
                    $password
                );

                if($res){
                    $message= "Datos insertados con éxito";
                    $class="alert alert-success";
                }else{
                    $message="No se pudieron insertar los datos";
                    $class="alert alert-danger";
                }
            ?>
            <div class="<?php echo $class?>">
                <?php echo $message;?>
            </div>
        <?php
            if($res){

            }
                }
            ?>
        <section>
            <div class="container">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                        <div class="col-sm-8"><h2>Nuevo <b>Usuario</b></h2></div>
                    </div>

                    <div class="row">
                    <?php
                        $idUsuario = "0001";
                        $nombre = "";
                        $apellidoPaterno = "";
                        $apellidoMaterno = "";
                        $departamento = "";
                        $tipoUsuario = "";
                        $password = "";                        // Forma común de edicion
                        include('form-usuario.php');
                    ?>
                    </div>
                    <a href="/index.php" class="btn btn-info add-new"><i class="fas fa-arrow-left"></i> Regresar</a>                </div>
            </div>
       </section>
        <?php
            // elementos comunes del cuerpo 
            include('../footer.html');
        ?>
    </body>
</html>