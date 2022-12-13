<?php include("../includes/header.php") ?>

<?php
include("../DATABASE/db.php");

?>




<div class="container-fluid p-5">
    <div class="container-sm p-5 shadow-lg  mb-5 bg-light rounded">
        <div class="container body-content">
            <center>
                <h1>CONSULTA PACIENTE</h1>
            </center>
            <div class="table-responsive" id="mydatatable-container">
                <table class="table table-striped table-bordered table-hover" id="example">
                    <thead>
                        <tr>
                            <th>NOMBRE</th>
                            <th>APELLIDO</th>
                            <th>SEXO</th>
                            <th>CEDULA</th>
                            <th>CORREO</th>
                            <th>TELEFONO</th>
                            <th>No. Seguro</th>
                            <th>ASEGURADORA</th>
                            <th>NACIMIENTO</th>
                            <th>DIRECCION</th>
                            <th>SANGRE</th>
                            <th>ESTADO</th>
                            
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $sql = "SELECT paciente.id_paciente,nombre,apellido, correo,tipo_sangre,status_paciente, num_telefono,seguro,direccion,sexo,cedula,fecha_naci,nombre_aseguradora FROM paciente
                        CROSS JOIN aseguradora
                        CROSS JOIN correo
                        CROSS JOIN paciente_vs_aseguradora ON paciente.cedula = paciente_vs_aseguradora.id_paciente
                        CROSS JOIN paciente_vs_correo ON paciente.cedula = paciente_vs_correo.id_paciente
                        CROSS JOIN paciente_vs_telefono ON paciente.cedula = paciente_vs_telefono.id_paciente
                        WHERE aseguradora.id_aseguradora = paciente_vs_aseguradora.id_aseguradora AND correo.id_correo = paciente_vs_correo.id_correo;";
                        $result = mysqli_query($conn, $sql);

                        while ($mostrar = mysqli_fetch_array($result)) {
                        ?>
                            <tr>

                                <td><?php echo $mostrar['nombre'] ?></td>
                                <td><?php echo $mostrar['apellido'] ?></td>
                                <td><?php echo $mostrar['sexo'] ?></td>
                                <td><?php echo $mostrar['cedula'] ?></td>
                                <td><?php echo $mostrar['correo'] ?></td>
                                <td><?php echo $mostrar['num_telefono'] ?></td>
                                <td><?php echo $mostrar['seguro'] ?></td>
                                <td><?php echo $mostrar['nombre_aseguradora'] ?></td>
                                <td><?php echo $mostrar['fecha_naci'] ?></td>


                                <td><?php echo $mostrar['direccion'] ?></td>
                                <td><?php echo $mostrar['tipo_sangre'] ?></td>
                                <td><?php
                                    if ($mostrar['status_paciente'] == '1') {
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