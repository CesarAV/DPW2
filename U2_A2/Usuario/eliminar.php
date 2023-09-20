<?php
    if (isset($_GET['id'])){
        include('../database.php');
        $db = new Database();
        $id = intval($_GET['id']);
        $res = $db->eliminarUsuario($id);
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