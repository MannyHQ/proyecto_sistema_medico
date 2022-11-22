<?php
///Para traer tipo usuario
include("../DATABASE/db.php");

$query = "SELECT * FROM aseguradora";
$result = mysqli_query($conn, $query);
?>

<?php include("../includes/header.php") ?>


<div class="container-fluid p-5">

    <div class="row">
        <?php if (isset($_SESSION['message'])) { ?>
            <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php session_unset();
        }
        ?>
        <div class="col-md-6 shadow-lg p-2 mb-5 bg-light  rounded">
            <h1 class="p-3 text-left ">Mantenimiento Pacientes</h1>
            <div class="p-4">
                <form name="formulario" action="../Procesos/procesosPacientes.php" method="POST" class="row g-3 needs-validation was-validated">
                    <!--NOMBRE-->
                    <div class="col-md-4 position-relative">
                        <label for="" class="form-label">
                            <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Nombre</font>
                            </font>
                        </label>
                        <input name="nombre" type="text" class="form-control" id="nombre" minlength="3" maxlength="40" required>
                        <div class="valid-tooltip">
                            <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                            </font>
                            </font>
                        </div>
                    </div>
                    <!--APELLIDO-->
                    <div class="col-md-4 position-relative">
                        <label for="" class="form-label">
                            <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Apellido</font>
                            </font>
                        </label>
                        <input name="apellido" type="text" class="form-control" id="apellido" minlength="3" maxlength="40" required>
                        <div class="valid-tooltip">
                            <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                            </font>
                            </font>
                        </div>
                    </div>
                    <!--Correo-->
                    <div class="col-md-5 position-relative">
                        <label for="" class="form-label">
                            <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Correo</font>
                            </font>
                        </label>
                        <div class="input-group has-validation">
                            <span class="input-group-text" id="validationTooltipUsernamePrepend">
                                <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">@</font>
                                </font>
                            </span>
                            <input name="correo" type="email" class="form-control" id="correo" aria-describedby="validationTooltipUsernamePrepend" required>
                            <div class="invalid-tooltip">
                                <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                </font>
                                </font>
                            </div>
                        </div>
                    </div>
                    <!--Fecha nacimiento-->
                    <div class="col-md-4 position-relative">
                        <label for="fecha_nacimiento" class="form-label">
                            <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Fecha Nacimiento</font>
                            </font>
                        </label>
                        <input name="fecha_nacimiento" type="date" class="form-control" id="fecha_nacimiento" minlength="3" maxlength="40" required>
                        <div class="valid-tooltip">
                            <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                            </font>
                            </font>
                        </div>
                    </div>
                    <!--CEDULA-->
                    <div class="col-md-4 position-relative">
                        <label for="" class="form-label">
                            <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Cedula</font>
                            </font>
                        </label>
                        <input name="cedula" type="text" class="form-control" id="cedula" minlength="11" maxlength="13" required>
                        <div class="valid-tooltip">
                            <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                            </font>
                            </font>
                        </div>
                    </div>
                    <!--seguro-->
                    <div class="col-md-4 position-relative">
                        <label for="seguro" class="form-label">
                            <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Seguro</font>
                            </font>
                        </label>
                        <select name="seguro" class="form-select" id="seguro" required="">
                            <?php foreach ($result as $opciones) : ?>
                                <option value="<?php echo $opciones['id_aseguradora'] ?>"><?php echo $opciones['nombre_aseguradora'] ?></option>
                            <?php endforeach ?>
                        </select>
                        <div class="valid-tooltip">
                            <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                            </font>
                            </font>
                        </div>
                    </div>
                    <!--afiliao-->
                    <div class="col-md-4 position-relative">
                        <label for="" class="form-label">
                            <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;"> No. Afiliado</font>
                            </font>
                        </label>
                        <input name="afiliado" type="text" class="form-control" id="afiliado" minlength="11" maxlength="13" required>
                        <div class="valid-tooltip">
                            <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                            </font>
                            </font>
                        </div>
                    </div>

                    <!--DIRECCION-->
                    <div class="col-md-6 position-relative">
                        <label for="" class="form-label">
                            <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Direccion</font>
                            </font>
                        </label>
                        <input name="direccion" type="text" class="form-control" id="direccion" required>
                        <div class="valid-tooltip">
                            <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                            </font>
                            </font>
                        </div>
                    </div>
                    <!--TIPO SANGRE-->
                    <div class="col-md-4 position-relative">
                        <label for="tipo_sangre" class="form-label">
                            <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Tipo sangre</font>
                            </font>
                        </label>
                        <select name="tipo_sangre" class="form-select" id="tipo_sangre" required>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">A+</option>
                            <option value="0-">B+</option>
                        </select>
                        <div class="valid-tooltip">
                            <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                            </font>
                            </font>
                        </div>
                    </div>
                    <!--CELULAR -->
                    <div class="col-md-4 position-relative">
                        <label for="validationTooltip02" class="form-label">
                            <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Telefono</font>
                            </font>
                        </label>
                        <input name="telefono" type="tel" class="form-control" id="validationTooltip02" minlength="10" maxlength="40" required>
                        <div class="valid-tooltip">
                            <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                            </font>
                            </font>
                        </div>
                    </div>



                    <!--SEXO-->
                    <div class="col-md-3 position-relative">
                        <label for="sexo" class="form-label">
                            <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Sexo</font>
                            </font>
                        </label>
                        <select name="sexo" class="form-select" id="sexo" required>
                            <option selected="" disabled="" value="">
                            <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Elegir</font>
                            </font>
                            </option>
                            <option value="M">
                            <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Masculino</font>
                            </font>
                            </option>
                            <option value="F">
                            <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Femenino</font>
                            </font>
                            </option>
                        </select>
                        <div class="invalid-tooltip">
                            <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                            </font>
                            </font>
                        </div>
                    </div>
                    <!--STATUS-->
                    <div class="position-relative">
                        <label for="status" class="form-label">
                            <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Status</font>
                            </font>
                        </label>
                        <input class="form-group-input" name='ESTADO' type="checkbox" id="status">
                        <div class="invalid-tooltip">
                            <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                            </font>
                            </font>
                        </div>
                    </div>

                    <br>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-block" name="agregarPaciente" value="Registrar">

                        <input type="reset" class="btn btn-primary btn-block" name="cancelarUsuario" value="Cancelar">
                    </div>
                </form>
            </div>

        </div>

        <div class="col-md-6 ">
            <form class="d-flex">
                <input class="form-control me-2 light-table-filter" data-table="table_id" type="text" placeholder="Buscar">
            </form>

            <?php
            $where = "";

            if (isset($_GET['enviar'])) {
                $busqueda = $_GET['busqueda'];

                if (isset($_GET['busqueda'])) {
                    $where = "WHERE usuarios.NOMBRE_USUARIO LIKE'%" . $busqueda . "%' OR TIPO_USUARIO  LIKE'%" . $busqueda . "%'
                OR STATUS LIKE'%" . $busqueda . "%'";
                }
            }
            ?>
            <form action="../Procesos/procesosUsuario.php" method="POST">
                <div class="table-responsive">
                    <br>
                    <table class="table table-bordered table_id">
                        <thead>
                            <tr>
                                <th>NOMBRE</th>
                                <th>APELLIDO</th>
                                <th>SEXO</th>
                                <th>CEDULA</th>
                                <th>CORREO</th>
                                <th>TELEFONO</th>
                                <th>SEGURO</th>
                                <th>No Seguro</th>
                                <th>NACIMIENTO</th>
                                <th>DIRECCION</th>
                                <th>SANGRE</th>
                                <th>ESTADO</th>
                                <th>ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
<?php
$query = "SELECT paciente.id_paciente,nombre,apellido, correo,tipo_sangre,status_paciente, num_telefono,seguro,direccion,sexo,cedula,fecha_naci,nombre_aseguradora FROM paciente
                            CROSS JOIN aseguradora
                            CROSS JOIN correo
                            CROSS JOIN paciente_vs_aseguradora ON paciente.cedula = paciente_vs_aseguradora.id_paciente
                            CROSS JOIN paciente_vs_correo ON paciente.cedula = paciente_vs_correo.id_paciente
                            CROSS JOIN paciente_vs_telefono ON paciente.cedula = paciente_vs_telefono.id_paciente
                            WHERE aseguradora.id_aseguradora = paciente_vs_aseguradora.id_aseguradora AND correo.id_correo = paciente_vs_correo.id_correo;";
$result_tasks = mysqli_query($conn, $query);

while ($row = mysqli_fetch_array($result_tasks)) {
    ?>

                                <tr>
                                    <td><?php echo $row['nombre'] ?></td>
                                    <td><?php echo $row['apellido'] ?></td>
                                    <td><?php echo $row['sexo'] ?></td>
                                    <td><?php echo $row['cedula'] ?></td>
                                    <td><?php echo $row['correo'] ?></td>
                                    <td><?php echo $row['num_telefono'] ?></td>
                                    <td><?php echo $row['seguro'] ?></td>
                                    <td><?php echo $row['nombre_aseguradora'] ?></td>
                                    <td><?php echo $row['fecha_naci'] ?></td>


                                    <td><?php echo $row['direccion'] ?></td>
                                    <td><?php echo $row['tipo_sangre'] ?></td>
                                    <td><?php
                            if ($row['status_paciente'] == '1') {
                                echo "ACTIVO";
                            } else {
                                echo "INACTIVO";
                            }
    ?></td>
                                    <td>
                                        <a href="../Procesos/editarPacientes.php?ID_PACIENTE=<?php echo $row['id_paciente'] ?>" class="btn btn-secondary">
                                            <i class="fas fa-marker"></i>
                                        </a>

                                    </td>
                                </tr>

<?php } ?>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>

</div>



<?php
/* Para filtrar usuario */


if (isset($_GET['enviar'])) {
    $busqueda = $_GET['busqueda'];

    if (isset($_GET['busqueda'])) {
        
    }
}
?>


<?php include("../includes/footer.php") ?>