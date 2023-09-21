<?php
class Database{
    private $con;
    private $dbhost="localhost";
    private $dbname="id21258147_condominiotlalpan";
    private $dbuser="CesarAV";
    private $dbpass="Conchita24$";

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
        }
        catch(PDOException $e) {
            echo "Conexión a la base de datos falló. Eror: " . $e->getMessage();
        }
    }

    public function getConn() {
        return $this->con;
    }

    public function sanitize($var){
        // no need to sanitize on PDO, bindParam will do it
        // $return = mysqli_real_escape_string($this->con, $var);
        // return $return; 
        return $var;
    }
}
?>