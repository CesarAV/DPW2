<?php
class Database{
    private $con;
    private $dbhost="localhost";
    private $dbname="id21258147_progweb2";
    private $dbuser="id21258147_administrador";
    private $dbpass="Progweb2#";

    function __construct() {
        $this->connect_db();
    }

    function __destruct() {
        // Liberar la conexion
        $this->con = null;
    }

    public function connect_db() {
        try {
            $this->con = new PDO("mysql:host=$this->dbhost;dbname=$this->dbname",
                $this->dbuser,
                $this->dbpass);
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->con->exec("Set character set utf8 ");
            return true;
        }
        catch(PDOException $e) {
            echo "Conexión a la base de datos falló. Eror: " . $e->getMessage();
        }
        return false;
    }

    public function exec(string $stmt) {
        return $this->con->exec($stmt);
    }

    public function prepare(string $statement, array $driver_options = array()) {
        return $this->con->prepare($statement, $driver_options);
    }

    public function query(string $statement) {
        return $this->con->query($statement);
    }

    public function sanitize($var){
        // no need to sanitize on PDO, bindParam will do it
        // $return = mysqli_real_escape_string($this->con, $var);
        // return $return; 
        return $var;
    }
}
?>