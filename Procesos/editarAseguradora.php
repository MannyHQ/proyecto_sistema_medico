<?php
include("../DATABASE/db.php");

//Para traer el dato seleccionado a la pantala de actualizar

if (isset($_GET['ID_ASEGURADORA'])) {
    $ID_ASEGURADORA = $_GET['ID_ASEGURADORA'];

    $query = "SELECT * FROM aseguradora where ID_ASEGURADORA = $ID_ASEGURADORA";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $NOMBRE = $row['nombre_aseguradora'];
        $DIRECCION = $row['direccion_aseguradora'];
        $CORREO = $row['correo_aseguradora'];
        $TELEFONO = $row['telefono'];
        $ESTADO = $row['status'];
    }
}

//Codigo para actualizar en la base de datos
if (isset($_POST['update'])) {
    $ID_ASEGURADORA = $_GET['ID_ASEGURADORA'];
    $NOMBRE = $_POST['nombre_aseguradora'];
    $DIRECCION = $_POST['direccion'];
    $CORREO = $_POST['correo'];
    $TELEFONO = $_POST['telefono'];
    if (isset($_POST['ESTADO']) == '1') {
        $ESTADO = TRUE;
    } else {
        $ESTADO = FALSE;
    }


    $query = "UPDATE aseguradora set nombre_aseguradora = '$NOMBRE', direccion_aseguradora = '$DIRECCION', STATUS = '$ESTADO', correo_aseguradora = '$CORREO', telefono =  '$TELEFONO'
    where id_aseguradora = $ID_ASEGURADORA";
    mysqli_query($conn, $query);

    $_SESSION['message'] = 'Aseguradora actualizado satisfactoriamente';
    $_SESSION['message_type'] = 'info';

    header("Location: ../Pantallas/MantenimientoAseguradora.php");
}
?>

<?php include("../includes/header.php") ?>


<div class="col-md-6 shadow-lg p-2 mb-5 bg-light mx-auto   rounded">
    <h1 class="p-3 text-left ">Editando Aseguradora</h1>
    <div class="p-4">
        <form name="formulario" action="../Procesos/editarAseguradora.php?ID_ASEGURADORA=<?php echo $_GET['ID_ASEGURADORA']; ?>" method="POST" class="row g-3 needs-validation was-validated">

            <!--NOMBRE-->

            <div class="col-md-4 position-relative">
                <label for="nombre_proc" class="form-label">
                    <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">Nombre Aseguradora</font>
                    </font>
                </label>
                <input name="nombre_aseguradora" value="<?php echo $NOMBRE; ?>" type="text" class="form-control" id="nombre_aseguradora" minlength="3" maxlength="40" required>
                <div class="valid-tooltip">
                    <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">
                    </font>
                    </font>
                </div>
            </div>

            <!--DIRECCION-->

            <div class="col-md-4 position-relative">
                <label for="" class="form-label">
                    <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">Direccion</font>
                    </font>
                </label>
                <input name="direccion" value="<?php echo $DIRECCION; ?>" type="text" class="form-control" id="direccion" minlength="11" maxlength="50" required>
                <div class="valid-tooltip">
                    <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">
                    </font>
                    </font>
                </div>
            </div>

            <!--COREEO-->

            <div class="col-md-4 position-relative">
                <label for="" class="form-label">
                    <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">Correo</font>
                    </font>
                </label>
                <input name="correo" value="<?php echo $CORREO; ?>" type="email" class="form-control" id="correo" required>
                <div class="valid-tooltip">
                    <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">
                    </font>
                    </font>
                </div>
            </div>
            <!--TELEFONO-->
            <div class="col-md-4 position-relative">
                <label for="" class="form-label">
                    <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">Telefono</font>
                    </font>
                </label>
                <input name="telefono" value="<?php echo $TELEFONO; ?>" id="telefono" type="tel" class="form-control"  minlength="3" maxlength="40" placeholder="123-456-7890" required>
                <div class="valid-tooltip">
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

            <br>
            <div class="form-group">
                <button class="btn btn-success" name="update">
                    Actualizar
                </button>
            </div>
        </form>
    </div>

</div>