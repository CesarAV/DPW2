<!DOCTYPE html>
<?php
    if (isset($_GET['id'])){
        $id=intval($_GET['id']);
    } else {
        header("location:usuario.php");
    }
?>
<html lang="es-MX">
    <head>
        <title>Actualizar usuario</title>
        <?php
            // elementos comunes del cuerpo 
            include('../head-interno.html');
        ?>
        <script src="usuario.js"></script>
    </head>
    <body>        
        <?php
            // elementos comunes del cuerpo 
            include('../header.html');
            include('../menu.php');
            include("../database.php");

            $usuario = new Database();
            if(isset($_POST) && !empty($_POST)){
                // Guardar datos de post
                $nombre = $usuario->sanitize($_POST['nombre']);
                $contra = $_POST['contra'];
                $tel = $_POST['tel'];
                $email = $usuario->sanitize($_POST['email']);;
                $notas = $usuario->sanitize($_POST['notas']);;

                $res = $usuario->actualizarUsuario($id,
                    $nombre, 
                    $contra,
                    $tel,
                    $email,
                    $notas);

                    if($res){
                        $message= "Datos guardados con éxito";
                        $class="alert alert-success";
                    }else{
                        $message="No se pudieron guardar los datos";
                        $class="alert alert-danger";
                    }
            ?>
            <div class="<?php echo $class?>">
                <?php echo $message;?>
            </div>
            <?php
                }

                $datos_usuario=$usuario->registroUsuario($id);
            ?>
        <section>
            <div class="container">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                        <div class="col-sm-8"><h2>Actualizar <b>Usuario</b></h2></div>
                        <div class="col-sm-4">
                            <a href="usuario.php" class="btn btn-info add-new"><i class="fas fa-arrow-left"></i> Regresar</a>
                        </div>
                        </div>
                    </div>

                    <div class="row">
                    <?php
                        $id = $datos_usuario->id;
                        $nombre = $datos_usuario->Nombre;
                        $contra = $datos_usuario->Contrasenia;
                        $tel = $datos_usuario->Telefono;
                        $email = $datos_usuario->CorreoElectronico;
                        $notas = $datos_usuario->Notas;
                        // Forma común de edicion
                        include('form-usuario.php');
                    ?>
                    </div>
                </div>
            </div>
       </section>
        <?php
            // elementos comunes del cuerpo 
            include('../footer.html');
        ?>
    </body>
</html>