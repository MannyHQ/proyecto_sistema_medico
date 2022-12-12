<?php
include("../DATABASE/db.php");
include("../includes/header.php");
?>




<div class="container-fluid p-5">
    <div class="container-sm p-5 shadow-lg  mb-5 bg-light rounded">
        <div class="container body-content">
            <center>
                <h1>CONSULTA DOCTORES</h1>
            </center>
            <div class="table-responsive" id="mydatatable-container">
                <table class="table table-striped table-bordered table-hover" id="example">
                    <thead>
                        <tr>
                            <th>NOMBRE</th>
                            <th>SEXO</th>
                            <th>DIRECCION</th>
                            <th>EXEQUATUR</th>
                            <th>CEDULA</th>
                            <th>ESPECIALIDADES</th>
                            <th>HORARIO</th>
                            <th>CORREO</th>
                            <th>TELEFONO</th>
                            <th>ESTADO</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $sql = "SELECT doctor.id_doctor,nombre,sexo,direccion,exequatur,cedula,especialidades,horario, correo, num_telefono,doctor.status FROM doctor                        
                        CROSS JOIN correo                           
                        CROSS JOIN doctor_vs_correo ON doctor.cedula = doctor_vs_correo.id_doctor
                        CROSS JOIN doctor_vs_telefono ON doctor.cedula = doctor_vs_telefono.id_doctor
                        WHERE correo.id_correo = doctor_vs_correo.id_correo";
                        $result = mysqli_query($conn, $sql);

                        while ($mostrar = mysqli_fetch_array($result)) {
                        ?>
                            <tr>

                                <td><?php echo $mostrar['nombre'] ?></td>
                                <td><?php echo $mostrar['sexo'] ?></td>
                                <td><?php echo $mostrar['direccion'] ?></td>
                                <td><?php echo $mostrar['exequatur'] ?></td>
                                <td><?php echo $mostrar['cedula'] ?></td>
                                <td><?php echo $mostrar['especialidades'] ?></td>
                                <td><?php echo $mostrar['horario'] ?></td>
                                <td><?php echo $mostrar['correo'] ?></td>
                                <td><?php echo $mostrar['num_telefono'] ?></td>
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