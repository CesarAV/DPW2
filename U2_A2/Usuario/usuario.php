<!DOCTYPE html>
<html lang="es-MX">
    <head>
        <title>Usuario</title>
    <?php
            // elementos comunes del cuerpo 
            include('../head-interno.html');
            include('../database.php');

            $usuarios = new Database();
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
                            <th>Identificador</th>
                            <th>Nombre</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            while ($row=mysqli_fetch_object($listado)){
                                $id=$row->IDUsuario;
                                $nombre=$row->Nombre;
                            ?>
                        <tr>
                            <td><?php echo $id;?></td>
                            <td><?php echo $nombre;?></td>
                        <td>
                            <a href="actualizar.php?id=<?php echo $id;?>"
                                class="edit" title="Editar" data-toggle="tooltip">
                                <i class="material-icons">&#xE254;</i>
                            </a>
                            <a href="javascript:eliminar(<?php echo $id;?>, '<?php echo $nombre;?>');"
                                class="delete" title="Eliminar" data-toggle="tooltip">
                                <i class="material-icons">&#xE872;</i>
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