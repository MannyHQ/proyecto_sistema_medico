<?php include("../DATABASE/db.php");


$query = "SELECT * FROM aseguradora";
$resultado = mysqli_query($conn, $query);

//Para traer el dato seleccionado a la pantala de actualizar
if (isset($_GET['ID_DOCTOR'])) {
    $ID_DOCTOR = $_GET['ID_DOCTOR'];

    $query = "SELECT * FROM doctor where id_doctor = $ID_DOCTOR";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $NOMBRE = $row['nombre'];
        $SEXO = $row['sexo'];
        $DIRECCION = $row['direccion'];
        $EXEQUATUR = $row['exequatur'];
        $CEDULA = $row['cedula'];
        $ESPECIALIDADES = $row['especialidades'];
        $HORARIO = $row['horario'];
        $ESTADO = $row['status'];
    }
}

//Codigo para actualizar en la base de datos
if (isset($_POST['update'])) {
    $ID_DOCTOR = $_GET['ID_DOCTOR'];
    $NOMBRE = $_POST['nombre'];
    $SEXO = $_POST['sexo'];
    $DIRECCION = $_POST['direccion'];
    $EXEQUATUR = $_POST['exequatur'];
    $CEDULA = $_POST['cedula'];
    $ESPECIALIDADES = $_POST['especialidad'];
    $HORARIO = $_POST['horario'];
    if (isset($_POST['ESTADO']) == '1') {
        $ESTADO = TRUE;
    } else {
        $ESTADO = FALSE;
    }


    $query = "UPDATE doctor set nombre = '$NOMBRE', direccion = '$DIRECCION', STATUS = '$ESTADO', sexo = '$SEXO', exequatur = '$EXEQUATUR', especialidades ='$ESPECIALIDADES', horario = '$HORARIO'
    where id_doctor = $ID_DOCTOR";
    mysqli_query($conn, $query);

    $_SESSION['message'] = 'Doctor actualizado satisfactoriamente';
    $_SESSION['message_type'] = 'info';

    header("Location: ../Pantallas/MantenimientoDoctores.php");
}
?>



<?php include("../includes/header.php") ?>


<div class="col-md-6 shadow-lg p-2 mb-5 bg-light mx-auto  rounded">
    <h1 class="p-3 text-left ">Editando doctor</h1>
    <div class="p-4">
        <form name="formulario" action="../Procesos/editarDoctores.php?ID_DOCTOR=<?php echo $_GET['ID_DOCTOR']; ?>" method="POST" class="row g-3 needs-validation was-validated" novalidate="">
            <!--NOMBRE-->
            <div class="col-md-4 position-relative">
                <label for="validationTooltip01" class="form-label">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Nombre</font>
                    </font>
                </label>
                <input name="nombre" value="<?php echo $NOMBRE; ?>" type="text" class="form-control" id="validationTooltip01" minlength="3" maxlength="40" required="">
                <div class="valid-tooltip">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">
                        </font>
                    </font>
                </div>
            </div>

            <!--CEDULA-->
            <div class="col-md-4 position-relative">
                <label for="validationTooltip02" class="form-label">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Cedula</font>
                    </font>
                </label>
                <input name="cedula" value="<?php echo $CEDULA; ?>" type="text" ondblclick="Doble_Clic(this.value)" class="form-control" id="validationTooltip02" minlength="11" maxlength="13" required="">
                <div class="valid-tooltip">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">
                        </font>
                    </font>
                </div>
            </div>
            <!--EMAIL-->
            <div class="col-md-4 position-relative">
                <label for="validationTooltip02" class="form-label">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Email</font>
                    </font>
                </label>
                <input name="email"  type="text" class="form-control" id="validationTooltip02" required="">
                <div class="valid-tooltip">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">
                        </font>
                    </font>
                </div>
            </div>
            <!--TELEFONO-->
            <div class="col-md-4 position-relative">
                <label for="validationTooltip02" class="form-label">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Telefono</font>
                    </font>
                </label>
                <input name="telefono" type="text" class="form-control" minlength="3" maxlength="40">
                <div class="valid-tooltip">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">
                        </font>
                    </font>
                </div>
            </div>
            <!--CELULAR-->
            <div class="col-md-4 position-relative">
                <label for="validationTooltip02" class="form-label">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Celular</font>
                    </font>
                </label>
                <input name="celular" type="text" class="form-control" id="validationTooltip02" minlength="10" maxlength="15" required="">
                <div class="valid-tooltip">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">
                        </font>
                    </font>
                </div>
            </div>
            <!--EXAQUATUR-->
            <div class="col-md-3 position-relative">
                <label for="" class="form-label">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Exaquatur</font>
                    </font>
                </label>
                <input name="exequatur" value="<?php echo $EXEQUATUR; ?>" type="text" class="form-control" id="exaquatur" required="">
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
            <!--USUARIO-->
            <div class="col-md-3 position-relative">
                <label for="" class="form-label">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Usuario</font>
                    </font>
                </label>
                <div class="input-group has-validation">
                    <span class="input-group-text" id="validationTooltipUsernamePrepend">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">@</font>
                        </font>
                    </span>
                    <input name="usuario" type="text" class="form-control" id="usuario" aria-describedby="validationTooltipUsernamePrepend" required="">
                    <div class="invalid-tooltip">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                            </font>
                        </font>
                    </div>
                </div>
                <!--ESPECIALIDAD-->
            </div>
            <div class="col-md-6 position-relative">
                <label for="" class="form-label">
                    <font style="vertical-align: inherit;" with="50">
                        <font style="vertical-align: inherit;">Especialidades</font>
                    </font>
                </label>
                <textarea name="especialidad" value="<?php echo $ESPECIALIDADES; ?>" type="text" class="form-control" id="especialidad" required=""></textarea>
                <div class="invalid-tooltip">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">
                        </font>
                    </font>
                </div>
            </div>
            <!--SEXO-->
            <div class="col-md-3 position-relative">
                <label for="" class="form-label">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Sexo</font>
                    </font>
                </label>
                <select name="sexo" value="<?php echo $SEXO; ?>" class="form-select" id="sexo" required="">
                    <option selected="" disabled="" value="">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Elegir</font>
                        </font>
                    </option>
                    <option>
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Masculino</font>
                        </font>
                    </option>
                    <option>
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
                <label for="validationTooltip04" class="form-label">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Status</font>
                    </font>
                </label>
                <input class="form-group-input" name='ESTADO' type="checkbox" value="" <?php if ($ESTADO) echo "checked"; ?> id="flexCheckDefault">
                <div class="invalid-tooltip">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">
                        </font>
                    </font>
                </div>
            </div>
            <!--Ver hacer que se puede selecionar horario HORARIO-->
            <div class="col-md-4 position-relative">
                <label for="" class="form-label">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Horario</font>
                    </font>
                </label>
                <select class="form-select" name="horario" aria-label="Default select example">
                    <option selected value="7AM - 3PM">7AM - 3PM</option>
                    <option value="3PM - 7PM">3PM - 7PM</option>
                    <option value="8AM - 12PM">8AM - 12PM</option>
                    <option value="2PM - 7PM">2PM - 7PM</option>
                </select>
                <div class="valid-tooltip">
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