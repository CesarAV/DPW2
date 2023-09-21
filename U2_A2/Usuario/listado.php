<!DOCTYPE html>
<html lang="es-MX">
    <head>
        <title>Usuario</title>
    <?php
            // elementos comunes del cuerpo 
            include('../head-interno.html');
            include('usuario.php');

            $usuarios = new Usuario();
            $listado=$usuarios->leerUsuarios();
        ?>
        <script>
            function eliminar(id, nombre){
                if(confirm(`¿Está seguro de eliminar el usuario ${nombre}?`)) {
                    window.location = "eliminar.php?id=" + id;
                }
            }
        </script>
    </head>
    <body>        
        <?php
            // elementos comunes del cuerpo 
            include('../header.html');
            include('../menu.php');
        ?>
        <section>
            <div class="container">
                <div class="table-wrapper">
                    <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8"><h2>Listado de <b>Usuarios</b></h2></div>
                        <div class="col-sm-4">
                        <a href="crear.php" class="btn btn-info add-new"><i class="fas fa-user-plus"></i> Agregar usuario</a>
                        </div>
                    </div>
                    </div>
                    <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th rowspan="2">Identificador</th>
                            <th rowspan="2">Nombre</th>
                            <th colspan="2">Apellidos</th>
                            <th rowspan="2">Depto.</th>
                            <th rowspan="2">Tipo</th>
                            <th rowspan="2">Password</th>
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

                            foreach ($listado as $row){
                                // print_r($row);
                                $id=$row['IDUsuario'];
                                $nombre=$row['Nombre'];
                                $apellidoPaterno=$row['ApellidoPaterno'];
                                $apellidoMaterno=$row['ApellidoMaterno'];
                                $departamento=$row['Departamento'];
                                $tipoUsuario=$row['TipoUsuario'];
                                $password=$row['Password'];
                            ?>
                            <tr>
                                <td><?php echo $id;?></td>
                                <td><?php echo $nombre;?></td>
                                <td><?php echo $apellidoPaterno;?></td>
                                <td><?php echo $apellidoMaterno;?></td>
                                <td><?php echo $departamento;?></td>
                                <td><?php echo $tipoUsuario;?></td>
                                <td><?php echo $password;?></td>
                            <td>
                                <a href="actualizar.php?id=<?php echo $id;?>"
                                    class="edit" title="Editar" data-toggle="tooltip">
                                    <i class="material-icons">&#xE254; Editar</i>
                                </a>
                                <a href="javascript:eliminar(<?php echo $id;?>, '<?php echo $nombre;?>');"
                                    class="delete" title="Eliminar" data-toggle="tooltip">
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
            </div>
       </section>
        <?php
            // elementos comunes del cuerpo 
            include('../footer.html');
        ?>
    </body>
</html>