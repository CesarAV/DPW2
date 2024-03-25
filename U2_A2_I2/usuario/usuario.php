<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/comun/database.php';

class Usuario
{
    private $db;

    public $id;
    public $nombre;
    public $apellidoPaterno;
    public $apellidoMaterno;
    public $edad;
    public $sexo;
    public $email;
    public $tipoUsuario;
    public $password;

    public $lastError;
    
    function __construct()
    {
        $this->db = new Database();
    }

    function __destruct()
    {
        // Liberar la conexion
        $this->db = null;

        // test echo 'destruct Usuario';
    }

    public static function getUsuarioFirmado() {
        if(isset($_SESSION["UsuarioFirmado"])) {
            return $_SESSION["UsuarioFirmado"];
        }

        return null;
    }

    public function leerUsuarios()
    {
        $sql = $this->db->prepare('SELECT * FROM Usuario');
        if ($sql->execute()) {
            $resultado = $sql->fetchAll();
            $sql = null;

            return $resultado;
        }

        echo "error al leer usuarios";
    }

    // Inserta un nuevo registro de usuario en la BD
    public function crearUsuario()
    {
        // Si el usuario ya existe, avisar
        if ($this->usuarioRegistrado($this->id) != false) {
            // ya está registrado
            $this->lastError = "El identificador de usuario ya existe";
            return false;
        }

        if (!$this->Validar()) {
            return false;
        }

        // Prepare statement
        $sql = "INSERT INTO Usuario (IDUsuario, Nombre, ApellidoPaterno, ApellidoMaterno, Edad, Sexo, Email, TipoUsuario, `Password`)
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->db->Prepare($sql);

        // Bind parameters
        $stmt->bindParam(1, $this->id);
        $stmt->bindParam(2, $this->nombre);
        $stmt->bindParam(3, $this->apellidoPaterno);
        $stmt->bindParam(4, $this->apellidoMaterno);
        $stmt->bindParam(5, $this->edad);
        $stmt->bindParam(6, $this->sexo);
        $stmt->bindParam(7, $this->email);
        $stmt->bindParam(8, $this->tipoUsuario);
        $stmt->bindParam(9, $this->password);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function actualizarUsuario()
    {
        try {

            if (!$this->Validar()) {
                return false;
            }

            $sql = "Update Usuario set 
            Nombre=:nombre, 
            ApellidoPaterno=:apellidopaterno, 
            ApellidoMaterno=:apellidomaterno,
            Edad=:edad, 
            Sexo=:sexo, 
            Email=:email, 
            TipoUsuario=:tipo, 
            `Password`=:password
            where IDUsuario=:idusuario";

            $stmt = $this->db->Prepare($sql);

            // Bind parameters
            $stmt->bindValue(":nombre", $this->nombre);
            $stmt->bindValue(":apellidopaterno", $this->apellidoPaterno);
            $stmt->bindValue(":apellidomaterno", $this->apellidoMaterno);
            $stmt->bindValue(":edad", $this->edad);
            $stmt->bindValue(":sexo", $this->sexo);
            $stmt->bindValue(":email", $this->email);
            $stmt->bindValue(":tipo", $this->tipoUsuario);
            $stmt->bindValue(":password", $this->password);
            $stmt->bindValue(":idusuario", $this->id);

            $res = $stmt->execute();
            if ($res) {
                return true;
            }
        } catch (PDOException $err) {
            echo $err->getMessage();
        }

        return false;
    }

    public function usuarioRegistrado($id)
    {
        $sql = "SELECT * FROM Usuario where IDUsuario='$id'";

        $res = $this->db->query($sql);
        if(!$res) {
            return false;
        }

        $row = $res->fetch();
        if(!$row) {
            return false;
        }

        $usr = new Usuario();
        $usr->asignarValores($row);
        return $usr;
    }

    public function eliminarUsuario($id)
    {
        $sql = "DELETE FROM Usuario WHERE id=$id";
        $res = $this->db->exec($sql);
        if ($res == 1) {
            return true;
        }
        return false;
    }

    public function asignarValores($arrValores)
    {
        // print_r($arrValores);
        $this->id = $arrValores['IDUsuario'];
        $this->nombre = $arrValores['Nombre'];
        $this->apellidoPaterno = $arrValores['ApellidoPaterno'];
        $this->apellidoMaterno = $arrValores['ApellidoMaterno'];
        $this->edad = $arrValores['Edad'];
        $this->sexo = $arrValores['Sexo'];
        $this->email = $arrValores['Email'];
        $this->tipoUsuario = $arrValores['TipoUsuario'];
        $this->password = $arrValores['Password'];
    }

    public function sanitize($var)
    {
        return $this->db->sanitize($var);
    }

    public function Validar() {
        // Validaciones: Todos los campos deben estar llenos, 
        if (empty($this->id)
            || empty($this->nombre)
            || empty($this->apellidoPaterno)
            || empty($this->apellidoMaterno)
            || empty($this->edad)
            || empty($this->sexo)
            || empty($this->email)
            || empty($this->tipoUsuario)
            || empty($this->password)) {
                $this->lastError = "Capture todos los datos por favor";
                return false;
            }

        // pwd debe ser 8 o más caracteres, numeros, letras y un simbolo
        $regEx = "/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*\W)(?!.* ).{8,16}/";
        if (preg_match($regEx, $this->password) == 0) {
            $this->lastError = "La contraseña debe contener minimo 8 letras, números, un carácter especial.";
            return false;
        } 

        return true;
    }

    public function iniciarSesion($post) {
        if (!empty($post)) {
            $id = $post['IDUsuario'];
            $pwd = $post['Password'];

            if (!empty($id) && !empty($pwd)) {
                $usr = $this->usuarioRegistrado($id);
                if(!$usr) {
                    $this->password = $pwd;
                    $this->lastError = "Usuario no registrado";
                    return false;
                }

                if ($usr->password != $pwd) {
                    $this->password = $pwd;
                    $this->lastError = "Usuario o contraseña incorrecta";
                    return false;
                }

                // Usuario válido. Guardar en variable de sesion
                $_SESSION["UsuarioFirmado"] = $usr;
                return true;
            }
        }

        $this->lastError = "Ingrese identificador de usuario y contraseña";
        return false;
    }

    public function descripcionTipo() {
        if(empty($this->tipoUsuario)) {
            return "";
        }

        $arrTipoDescr = array(
            "PDC" => "Personal del depto. de crédito y cobranza",
            "PF" => "Padre de famila"
        );    

        if(array_key_exists($this->tipoUsuario, $arrTipoDescr)) {
            return $arrTipoDescr[$this->tipoUsuario];
        }    

        return $this->tipoUsuario." no reconocido";
    }

    public function confirmPwd($confirmPwd) {
        // Validar que las contraseñas coincidan
        if ($confirmPwd == $this->password) {
            return true;
        }
        
        $this->lastError = "La confirmación de contraseña no coincide";
        return false;
    }

    public function menuPorTipo() {
        $menuConsultarPago = array("Consultar pagos" => "/pago/consultar.php");
        $menuRegistrarPago = array("Registrar pagos" => "/pago/registrar.php");

        switch($this->tipoUsuario){
            case "PDC":
                return array($menuConsultarPago, $menuRegistrarPago);

            case "PF":
                return array($menuConsultarPago);
        }
    }

    public function esPDC() {
        return $this->tipoUsuario == 'PDC';
    } 

    public function nombreCompleto() {
        $nombres = [
            $this->nombre,
            $this->apellidoPaterno,
            $this->apellidoMaterno
          ];
          
        return implode(" ", $nombres);
    }

    public function puedeRegistrarPago() {
        return $this->esPDC();
    }

    public function puedeEditarPago() {
        return $this->esPDC();
    }

    public function puedeEliminarPago() {
        return $this->esPDC();
    }
}
