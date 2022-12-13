<?php include("../includes/header.php") ?>

<?php
include("../DATABASE/db.php");
$query = "SELECT * FROM tipo_usuario";
$result = mysqli_query($conn, $query);

?>




<div class="container-fluid p-5">
    <div class="container-sm p-5 shadow-lg  mb-5 bg-light rounded">
        <div class="container body-content">
            <center>
                <h1>CONSULTA USUARIO</h1>
            </center>
            <div class="table-responsive" id="mydatatable-container">
                <table class="table table-striped table-bordered table-hover" id="example">
                    <thead>
                        <tr>
                            <th>USERNAME</th>
                            <th>CONTRASEÑA</th>
                            <th>TIPO USUARIO</th>
                            <th>NOMBRE</th>
                            <th>APELLIDO</th>
                            <th>ESTADO</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $sql = "SELECT * FROM USUARIO";
                        $result = mysqli_query($conn, $sql);

                        while ($mostrar = mysqli_fetch_array($result)) {
                        ?>
                            <tr>

                                <td><?php echo $mostrar['username'] ?></td>
                                <td><?php echo $mostrar['password'] ?></td>
                                <td><?php
                                    $tipo_user = $mostrar['tipo_user'];
                                    if ($tipo_user == '1') {
                                        echo "Administrador";
                                    } else if ($tipo_user == '2') {
                                        echo "Doctor";
                                    } else if ($tipo_user == '3') {
                                        echo "Empleado";
                                    }
                                    ?>
                                </td>
                                <td><?php echo $mostrar['nombre'] ?></td>
                                <td><?php echo $mostrar['apellido'] ?></td>
                                <td><?php
                                    if ($mostrar['status'] == '1') {
                                        echo "ACTIVO";
                                    } else {
                                        echo "INACTIVO";
                                    }
                                    ?></td>

                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>




<script type="text/javascript">
    $(document).ready(function() {

        $('#example').DataTable({


            dom: 'Bfrtip',
            buttons: [{
                    extend: 'excel',
                    text: '<i class="fas fa-file-excel"></i> ',
                    titleAttr: 'Exportar a Excel',
                    className: 'btn btn-success'
                },
                {
                    extend: 'print',
                    text: '<i class="fa fa-print"></i> ',
                    titleAttr: 'Imprimir',
                    className: 'btn btn-info',
                    exportOptions: {
                        modifier: {
                            page: 'current'
                        }
                    },
                }
            ],
            select: true
        });
    });
</script>