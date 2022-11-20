<?php include("../DATABASE/db.php");


$query = "SELECT * FROM aseguradora";
$resultado = mysqli_query($conn, $query);

//Para traer el dato seleccionado a la pantala de actualizar
if (isset($_GET['ID_PACIENTE'])) {
    $ID_PACIENTE = $_GET['ID_PACIENTE'];

    $query = "SELECT * FROM paciente where id_paciente = $ID_PACIENTE" ;
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $NOMBRE = $row['nombre'];
        $APELLIDO = $row['apellido'];
        $SEXO = $row['sexo'];
        $FECHA = $row['fecha_naci'];
        $CEDULA = $row['cedula'];
        $SEGURO = $row['seguro'];
        $DIRECCION = $row['direccion'];
        $SANGRE = $row['tipo_sangre'];
        //$TELEFONO = $row['telefono'];
        $ESTADO = $row['status'];
    }
}

//Codigo para actualizar en la base de datos
if (isset($_POST['update'])) {
    $ID_PACIENTE = $_GET['ID_PACIENTE'];
    $NOMBRE = $_POST['nombre'];
    $APELLIDO = $_POST['apellido'];
    $SEXO = $_POST['sexo'];
    $FECHA = $_POST['fecha_nacimiento'];
    $CEDULA = $_POST['cedula'];
    $SEGURO = $_POST['seguro'];
    $DIRECCION = $_POST['direccion'];
    $SANGRE = $_POST['tipo_sangre'];
   // $TELEFONO = $_POST['telefono'];
    if (isset($_POST['ESTADO']) == '1') {
        $ESTADO = TRUE;
    } else {
        $ESTADO = FALSE;
    }


    $query = "UPDATE paciente set nombre = '$NOMBRE', direccion = '$DIRECCION', STATUS = '$ESTADO', sexo = '$SEXO', fecha_naci = '$FECHA', cedula ='$CEDULA', seguro = '$SEGURO', tipo_sangre = '$SANGRE'
    where id_paciente = $ID_PACIENTE";
    mysqli_query($conn, $query);

    $_SESSION['message'] = 'Paciente actualizado satisfactoriamente';
    $_SESSION['message_type'] = 'info';

    header("Location: ../Pantallas/MantenimientoPacientes.php");
}
?>



<?php include("../includes/header.php") ?>


<div class="col-md-6 shadow-lg p-2 mb-5 bg-light mx-auto rounded">
    <h1 class="p-3 text-left ">Mantenimiento Pacientes</h1>
    <div class="p-4">
        <form name="formulario" action="../Procesos/editarPacientes.php?ID_PACIENTE=<?php echo $_GET['ID_PACIENTE']; ?>" method="POST" class="row g-3 needs-validation was-validated" novalidate="">
            <!--NOMBRE-->
            <div class="col-md-4 position-relative">
                <label for="" class="form-label">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Nombre</font>
                    </font>
                </label>
                <input name="nombre" value="<?php echo $NOMBRE; ?>" type="text" class="form-control" id="nombre" minlength="3" maxlength="40" required="">
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
                        <input name="apellido" value="<?php echo $APELLIDO; ?>" type="text" class="form-control" id="apellido" minlength="3" maxlength="40" required="">
                        <div class="valid-tooltip">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                </font>
                            </font>
                        </div>
                    </div>
            <!--Fecha nacimiento-->
            <div class="col-md-4 position-relative">
                <label for="fecha_nacimiento" class="form-label">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Fecha Nacimiento</font>
                    </font>
                </label>
                <input name="fecha_nacimiento" value="<?php echo $FECHA; ?>" type="date" class="form-control" id="fecha_nacimiento" minlength="3" maxlength="40" required="">
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
                <input name="cedula" value="<?php echo $CEDULA; ?>" type="text" class="form-control" id="cedula" minlength="11" maxlength="13" required="">
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
                    <option selected value="<?php echo $SEGURO ?>"> <?php echo $SEGURO ?> </option>
                    <?php foreach ($resultado as $opciones) : ?>
                        <option value="<?php echo $opciones['nombre'] ?>"><?php echo $opciones['nombre'] ?></option>
                    <?php endforeach ?>
                </select>
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
                <input name="direccion" value="<?php echo $DIRECCION; ?>" type="text" class="form-control" id="direccion" required="">
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
                <select class="form-select" name="tipo_sangre" aria-label="Default select example">
                    <option selected value="<?php echo $SANGRE ?>"><?php echo $SANGRE ?></option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
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
                        <input name="telefono" value="<?php echo $TELEFONO; ?>" type="text" class="form-control" id="validationTooltip02" minlength="10" maxlength="15" required="">
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
                <select class="form-select" name="sexo" aria-label="Default select example">
                    <?php
                    if ($SEXO == 'M') { ?>
                        <option selected value="M">Masculino</option>
                        <option value="F">Femenino</option>
                    <?php
                    }
                    ?>
                    <?php
                    if ($SEXO == 'F') { ?>
                        <option value="M">Masculino</option>
                        <option selected value="F">Femenino</option>
                    <?php
                    }
                    ?>
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
                <input class="form-group-input" name='ESTADO' value="" <?php if ($ESTADO) echo "checked"; ?> type="checkbox" id="status">
                <div class="invalid-tooltip">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">
                        </font>
                    </font>
                </div>
            </div>

            <br>
            <div class="form-group">
                <button class="btn btn-success" name="update">
                    Actualizar
                </button>
            </div>
        </form>
    </div>
</div>


<?php include("../includes/footer.php") ?>