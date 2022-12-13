<?php include("../includes/header.php") ?>

<?php
include("../DATABASE/db.php");

?>




<div class="container-fluid p-5">
    <div class="container-sm p-5 shadow-lg  mb-5 bg-light rounded">
        <div class="container body-content">
            <center>
                <h1>CONSULTA PROCEDIMIENTOS</h1>
            </center>
            <div class="table-responsive" id="mydatatable-container">
                <table class="table table-striped table-bordered table-hover" id="example">
                    <thead>
                        <tr>
                            <th>NOMBRE</th>
                            <th>DESCRIPCION</th>
                            <th>PRECIO</th>
                            <th>ESTADO</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $sql = "SELECT * FROM PROCEDIMIENTOS";
                        $result = mysqli_query($conn, $sql);

                        while ($mostrar = mysqli_fetch_array($result)) {
                        ?>
                            <tr>

                                <td><?php echo $mostrar['nombre_proc'] ?></td>
                                <td><?php echo $mostrar['descripcion'] ?></td>
                                <td><?php echo $mostrar['precio_proc'] ?></td>
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