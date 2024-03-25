<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/comun/database.php';

class Pago extends Database {

    // Variables correspondientes a los campos de la BD
    public $folio;
    public $idUsuario;
    public $concepto;
    public $monto;
    public $mesPagado;
    public $fechaPago;

    public $lastError;

    public static array $meses = array(
        1=>"enero",
        2=>"febrero",
        3=>"marzo",
        4=>"abril",
        5=>"mayo",
        6=>"junio",
        7=>"julio",
        8=>"agosto",
        9=>"septiembre",
        10=>"octubre",
        11=>"noviembre",
        12=>"diciembre");

    public function leerPagos($idUsuario)
    {
        try {
            $sql = $this->prepare("SELECT * FROM Pagos where IDUsuario = '$idUsuario'");
            if ($sql->execute()) {
                $resultado = $sql->fetchAll();
                $sql = null;
    
                return $resultado;
            }
        }
        catch (PDOException $ex) {
            $this->lastError = $ex->getMessage();
        }
    }

    // Inserta un nuevo registro de pago en la BD
    public function crearPago()
    {
        // Si el usuario ya existe, avisar
        if ($this->leerPagoDeBD($this->folio) != false) {
            // ya está registrado
            $this->lastError = "El folio de pago ya existe";
            return false;
        }

        // Prepare statement
        $sql = "INSERT INTO Pagos (FolioPago
            , IDUsuario
            , Concepto
            , Monto
            , MesPagado
            , FechaPago)
            VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $this->Prepare($sql);

        // Bind parameters
        $stmt->bindParam(1, $this->folio);
        $stmt->bindParam(2, $this->idUsuario);
        $stmt->bindParam(3, $this->concepto);
        $stmt->bindParam(4, $this->monto);
        $stmt->bindParam(5, $this->mesPagado);
        $stmt->bindParam(6, $this->fechaPago);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function actualizarPago()
    {
        try {
            $sql = "Update Pagos set 
                IDUsuario=:idusuario,
                Concepto=:concepto,
                Monto=:monto,
                MesPagado=:mespagado,
                FechaPago=:fechapago
                where FolioPago=:folio";

            $stmt = $this->Prepare($sql);

            // Bind parameters
            $stmt->bindValue(":idusuario", $this->idUsuario);
            $stmt->bindValue(":concepto", $this->concepto);
            $stmt->bindValue(":monto", strval($this->monto));
            $stmt->bindValue(":mespagado", $this->mesPagado, PDO::PARAM_INT);
            $stmt->bindValue(":fechapago", $this->fechaPago); // DateTime::createFromFormat('Y-m-d', $this->fechaPago));
            $stmt->bindValue(":folio", $this->folio);

            $res = $stmt->execute();
            if ($res) {
                return true;
            }
        } catch (PDOException $err) {
            echo $err->getMessage();
        }

        return false;
    }

    public function leerPagoDeBD($folio)
    {
        $sql = "SELECT * FROM Pagos where FolioPago='$folio'";

        $res = $this->query($sql);
        if(!$res) {
            return false;
        }

        $row = $res->fetch();
        if(!$row) {
            return false;
        }

        $pago = new Pago();
        $pago->asignarValores($row);
        return $pago;
    }

    public function eliminarPago()
    {
        $res = $this->exec("DELETE FROM Pagos WHERE FolioPago='$this->folio'");
        if ($res == 1) {
            return true;
        }
        return false;
    }

    public function asignarValores($arrValores)
    {
        // print_r($arrValores);
        $this->folio = $arrValores["FolioPago"];
        $this->idUsuario = $arrValores["IDUsuario"];
        $this->concepto = $arrValores["Concepto"];
        $this->monto = $arrValores["Monto"];
        $this->mesPagado = $arrValores["MesPagado"];
        $this->fechaPago = substr($arrValores["FechaPago"], 0, 10);
    }

    public function mesNombre() {
        if (array_key_exists($this->mesPagado, Pago::$meses)) {
            return Pago::$meses[$this->mesPagado];
        }

        return '';
    }
}

?>