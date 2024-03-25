<?php include_once "pago.php" ?>

<form method="post">
    <div class="col-md-12">
        <label>Folio:</label>
        <input type="text" name="FolioPago" id="foliopago" value="<?php echo $pago->folio ?>" class='form-control' maxlength="10" required>
    </div>

    <div class="col-md-12">
        <label>Usuario:</label>
        <!-- input type="text" name="IDUsuario" id="idusuario" value="<?php echo $pago->idUsuario ?>" class='form-control' maxlength="4" required-->
        <select name="IDUsuario" id="idusuario" class='form-control' required>
            <?php 
                $idSelUsr = $pago->idUsuario;
                include('../usuario/option-usuario.php');
            ?>            
        </select>        
    </div>

    <div class="col-md-12">
        <label>Concepto:</label>
        <input type="text" name="Concepto" id="concepto" value="<?php echo $pago->concepto ?>" class='form-control' maxlength="64">
    </div>

    <div class="col-md-12">
        <label>Monto:</label>
        <input type="number" name="Monto" id="monto" value="<?php echo $pago->monto ?>" class='form-control' required>
    </div>

    <div class="col-md-12">
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

    <div class="col-md-12">
        <label>Fecha:</label>
        <input type="date" name="FechaPago" id="fechapago" value="<?=$pago->fechaPago?>" class='form-control'>
    </div>

    <div class="col-md-12 pull-right">
        <button type="submit" class="btn btn-success">
            Guardar
        </button>
    </div>
</form>
