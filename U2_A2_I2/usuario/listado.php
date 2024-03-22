<!DOCTYPE html>
<html lang="es-MX">

<head>
    <title>Usuario</title>
    <?php
    // elementos comunes del cuerpo 
    include('../head-interno.html');
    include('usuario.php');

    $usuario = new Usuario();
    $listado = $usuario->leerUsuarios();
    ?>
    <script>
        function eliminar(id, nombre) {
            if (confirm(`¿Está seguro de eliminar el usuario ${nombre}?`)) {
                window.location = "eliminar.php?id=" + id;
            }
        }
    </script>
</head>

<body>
    <?php
    // elementos comunes del cuerpo 
    include('../comun/menu-y-header.php');
    ?>
    <section>
        <div class="container">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8">
                            <h2>Listado de <b>Usuarios</b></h2>
                        </div>
                        <div class="col-sm-4">
                            <a href="crear.php" class="btn btn-info add-new"><i class="fas fa-user-plus"></i> Agregar usuario</a>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th rowspan="2">Identificador</th>
                        <th rowspan="2">Nombre</th>
                        <th colspan="2">Apellidos</th>
                        <th rowspan="2">Edad</th>
                        <th rowspan="2">Sexo</th>
                        <th rowspan="2">Correo electrónico</th>
                        <th rowspan="2">Tipo</th>
                        <th rowspan="2">Contraseña</th>
                    </tr>
                    <tr>
                        <th>Paterno</th>
                        <th>Materno</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // foreach ($listado as &$row){
                    //     foreach ($row as $clave => $valor){
                    //         echo "{$clave} => {$valor}";
                    //     }
                    // }

                    foreach ($listado as $row) {
                        // print_r($row);
                        $usuario->asignarValores($row);
                        // $id = $row['IDUsuario'];
                        // $nombre = $row['Nombre'];
                        // $apellidoPaterno = $row['ApellidoPaterno'];
                        // $apellidoMaterno = $row['ApellidoMaterno'];
                        // $edad = $row['Edad'];
                        // $sexo = $row['Sexo'];
                        // $correo = $row['Email'];
                        // $tipoUsuario = $row['TipoUsuario'];
                        // $password = $row['Password'];
                    ?>
                        <tr>
                            <td><?php echo $usuario->id; ?></td>
                            <td><?php echo $usuario->nombre; ?></td>
                            <td><?php echo $usuario->apellidoPaterno; ?></td>
                            <td><?php echo $usuario->apellidoMaterno; ?></td>
                            <td><?php echo $usuario->edad; ?></td>
                            <td><?php echo $usuario->sexo; ?></td>
                            <td><?php echo $usuario->email; ?></td>
                            <td><?php echo $usuario->tipoUsuario; ?></td>
                            <td><?php echo $usuario->password; ?></td>
                            <td>
                                <a href="actualizar.php?id=<?php echo $usuario->id; ?>" class="edit" title="Editar" data-toggle="tooltip">
                                    <i class="material-icons">&#xE254; Editar</i>
                                </a>
                                <a href="javascript:eliminar(<?php echo $usuario->id; ?>, '<?php echo $usuario->nombre; ?>');" class="delete" title="Eliminar" data-toggle="tooltip">
                                    <i class="material-icons">&#xE872; Eliminar</i>
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
    <?php
    // elementos comunes del cuerpo 
    include('../footer.html');
    ?>
</body>

</html>