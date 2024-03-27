<!--
    tabla parcial de pagos.
    Requiere que antes de llarmarla se definan las variables:
    
    $pago - objeto pago
    $listado - listado de pagos
    $esUsuarioPDC - true si el usuario es personal del depto. de cobranza.
 -->
<?php
    $conAcciones = $esUsuarioPDC && (!isset($soloVerPagos) || !$soloVerPagos);
?>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Folio</th>
            <th>Concepto</th>
            <th>Mes</th>
            <th>Monto</th>
            <th>Fecha</th>
            <?php
            if ($conAcciones) {
            ?>
                <th><!--editar--></th>
                <th><!--eliminar--></th>
            <?php
            }
            ?>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($listado as $row) {
            // print_r($row);
            $pago->asignarValores($row);
        ?>
            <tr>
                <td><?= $pago->folio; ?></td>
                <td><?= $pago->concepto; ?></td>
                <td><?= $pago->mesNombre(); ?></td>
                <td><?= $pago->monto; ?></td>
                <td><?= date_format(new DateTime($pago->fechaPago), 'd/m/Y'); ?></td>
                <?php
                if ($conAcciones) {
                ?>
                    <td>
                        <a href="/pago/actualizar.php?folio=<?= $pago->folio; ?>" class="edit" title="Editar">
                            <i class="material-icons">&#xE254; Editar</i>
                        </a>
                    </td>
                    <td>
                        <a href="javascript:eliminar('<?= $pago->folio; ?>');" class="delete" title="Eliminar">
                            <i class="material-icons">&#xE872; Eliminar</i>
                        </a>
                    </td>
                <?php
                }
                ?>

            </tr>
        <?php
        }
        ?>
    </tbody>
</table>