<?php
include("../comun/session-handler.php");
?>
<?php
    if (isset($_GET['id'])){
        $usuario = new Usuario();
        $id = intval($_GET['id']);
        $res = $usuario->eliminarUsuario($id);
        if($res){
            header('location: usuario.php');
        }else{
            echo "<div class=\"alert alert-danger\"> Error al eliminar el registro</div>";
        }
    }
    else {
        header('location: usuario.php');
    }
?>