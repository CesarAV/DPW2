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
                        <a href="/pago/actualizar.php?folio=<?= $pago->folio; ?>" class="btn btn-success" title="Editar">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                            </svg>
                            Editar
                        </a>
                    </td>
                    <td>
                        <a href="javascript:eliminar('<?= $pago->folio; ?>');" class="btn btn-danger" title="Eliminar">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                            </svg>
                            Eliminar
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