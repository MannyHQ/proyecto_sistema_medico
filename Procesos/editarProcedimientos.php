<?php
include("../DATABASE/db.php");

//Para traer el dato seleccionado a la pantala de actualizar
if (isset($_GET['id_proc'])) {
    $ID_PROCEDIMIENTO = $_GET['id_proc'];

    $query = "SELECT * FROM procedimientos where id_proc = $ID_PROCEDIMIENTO";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $NOMBRE = $row['nombre_proc'];
        $DESCRIPCION = $row['descripcion'];
        $PRECIO = $row['precio_proc'];
        $ESTADO = $row['status'];
    }
}

//Codigo para actualizar en la base de datos
if (isset($_POST['update'])) {
    $ID_PROCEDIMIENTO = $_GET['ID_PROC'];
    $NOMBRE = $_POST['nombre'];
    $DESCRIPCION = $_POST['descripcion'];
    $PRECIO = $_POST['precio'];
    if (isset($_POST['ESTADO']) == '1') {
        $ESTADO = TRUE;
    } else {
        $ESTADO = FALSE;
    }


    $query = "UPDATE procedimientos set nombre_proc = '$NOMBRE', descripcion = '$DESCRIPCION', STATUS = '$ESTADO', precio_proc = '$PRECIO'
    where id_proc = $ID_PROCEDIMIENTO";
    mysqli_query($conn, $query);

    $_SESSION['message'] = 'Aseguradora actualizado satisfactoriamente';
    $_SESSION['message_type'] = 'info';

    header("Location: ../Pantallas/MantenimientoProcedimientos.php");
}
?>



<?php include("../includes/header.php") ?>



<div class="col-md-6 shadow-lg p-2 mb-5 bg-light mx-auto  rounded">
    <h1 class="p-3 text-left ">Editar Procedimientos</h1>
    <div class="p-4">
        <form name="formulario" action="../Procesos/editarProcedimientos.php?ID_PROC=<?php echo $_GET['id_proc']; ?>" method="POST" class="row g-3 needs-validation was-validated">

            <!--NOMBRE-->

            <div class="col-md-4 position-relative">
                <label for="nombre_proc" class="form-label">
                    <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">Nombre Procedimiento</font>
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

            <!--DESCRIPCION DEL PROCEDIMIENTO-->

            <div class="col-md-8 position-relative">
                <label for="" class="form-label">
                    <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">Descripcion del procedimiento</font>
                    </font>
                </label>
                <input name="descripcion" value="<?php echo $DESCRIPCION; ?>" type="text" class="form-control" id="descripcion" minlength="11" maxlength="50" required>
                <div class="valid-tooltip">
                    <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">
                    </font>
                    </font>
                </div>
            </div>

            <!--PRECIO-->

            <div class="col-md-2 position-relative">
                <label for="" class="form-label">
                    <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">Precio</font>
                    </font>
                </label>
                <input name="precio" value="<?php echo $PRECIO; ?>" type="text" class="form-control" id="precio" minlength="3" maxlength="40" required>
                <div class="valid-tooltip">
                    <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">
                    </font>
                    </font>
                </div>
            </div>

            <!--STATUS-->
            <div class="position-relative">
                <label for="" class="form-label">
                    <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">Status</font>
                    </font>
                </label>
                <input class="form-group-input" name='ESTADO' type="checkbox" value="" <?php if ($ESTADO) echo "checked"; ?> id="ESTADO">
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


<?php include("../includes/footer.php"); ?>