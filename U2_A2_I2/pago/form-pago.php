<?php include_once "pago.php" ?>

<?php
$colAlign = "col-lg-4 col-md-6 col-sm-12";
?>

<form method="post">
    <div clas="container">
        <div class="row">
            <div class="<?= $colAlign ?>">
                <label>Folio:</label>
                <input type="text" name="FolioPago" id="foliopago" value="<?php echo $pago->folio ?>" class='form-control' maxlength="10" required>
            </div>

            <div class="<?= $colAlign ?>">
                <label>Usuario:</label>
                <!-- input type="text" name="IDUsuario" id="idusuario" value="<?php echo $pago->idUsuario ?>" class='form-control' maxlength="4" required-->
                <select name="IDUsuario" id="idusuario" class='form-control' required>
                    <?php
                    $idSelUsr = $pago->idUsuario;
                    include('../usuario/option-usuario.php');
                    ?>
                </select>
            </div>

            <div class="<?= $colAlign ?>">
                <label>Concepto:</label>
                <input type="text" name="Concepto" id="concepto" value="<?php echo $pago->concepto ?>" class='form-control' maxlength="64">
            </div>

            <div class="<?= $colAlign ?>">
                <label>Monto:</label>
                <input type="number" name="Monto" id="monto" value="<?php echo $pago->monto ?>" class='form-control' required>
            </div>

            <div class="<?= $colAlign ?>">
                <label>Mes:</label>
                <select name="MesPagado" id="mespagado" class="form-control">
                    <?php
                    foreach (Pago::$meses as $num => $nombre) {
                        $selected = $num == $pago->mesPagado ? 'selected' : '';
                    ?>
                        <option value="<?= $num ?>" <?= $selected ?>><?= $nombre ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>

            <div class="<?= $colAlign ?>">
                <label>Fecha:</label>
                <input type="date" name="FechaPago" id="fechapago" value="<?= $pago->fechaPago ?>" class='form-control'>
            </div>

        </div>
        <hr>
        <div class="row">
        <div class="col-md-12">
                <button type="submit" class="btn btn-success">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-save" viewBox="0 0 16 16">
                        <path d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v7.293l2.646-2.647a.5.5 0 0 1 .708.708l-3.5 3.5a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L7.5 9.293V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1z" />
                    </svg>
                    Guardar
                </button>
            </div>
        </div>
    </div>
</form>