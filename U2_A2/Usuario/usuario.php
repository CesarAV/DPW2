<?php

include('../database.php');

class Usuario{
    private $db;
    private $con;

    function __construct() {
      $this->db = new Database();
      $this->con = $this->db->getConn();
    }

    function __destruct() {
        // Liberar la conexion
        $this->db = null;
    }

    public function leerUsuarios() {
        $sql = $this->con->prepare('SELECT * FROM usuario');
        if ($sql->execute()) {
            $resultado = $sql->fetchAll();
            $sql = null;

            return $resultado;
        }

        echo "error al leer usuarios";
    }

    // Inserta un nuevo registro de usuario en la BD
    public function crearUsuario($id, 
        $nombre, 
        $apellidoPaterno,
        $apellidoMaterno,
        $departamento,
        $tipoUsuario,
        $password) {

        // Prepare statement
        $sql = "INSERT INTO usuario (IDUsuario, Nombre, ApellidoPaterno, ApellidoMaterno, Departamento, TipoUsuario, Password)
                  VALUES (?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $this->con->Prepare($sql);

        // Bind parameters
        $stmt->bindParam(1,$id);
        $stmt->bindParam(2, $nombre);
        $stmt->bindParam(3, $apellidoPaterno);
        $stmt->bindParam(4, $apellidoMaterno);
        $stmt->bindParam(5, $departamento);
        $stmt->bindParam(6, $tipoUsuario);
        $stmt->bindParam(7, $password);

        if($stmt->execute()) {
            return true;
        }

        return false;
    }
    public function actualizarUsuario($id, $nombre, $contra, $tel, $email, $notas){
        $sql = "UPDATE usuario Set Nombre='$nombre', Contrasenia='$contra', Telefono='$tel', CorreoElectronico='$email', Notas='$notas' WHERE id=$id";
        $res = mysqli_query($this->con, $sql);
        if($res){
            return true;
        }
        return false;
    }
    public function registroUsuario($id){
        $sql = "SELECT * FROM usuario where id='$id'";
        $res = mysqli_query($this->con, $sql);
        $return = mysqli_fetch_object($res);
        return $return ;
    }
    public function eliminarUsuario($id){
        $sql = "DELETE FROM usuario WHERE id=$id";
        $res = mysqli_query($this->con, $sql);
        if($res){
            return true;
        }
        return false;
    }
}
?>