<?php include("../includes/header.php") ?>

<?php include("../DATABASE/db.php");

//Para traer datos de los tipos de usuario

$query2 = "SELECT * FROM tipo_usuario";
$result2 = mysqli_query($conn, $query2);



//Para traer el dato seleccionado a la pantala de actualizar
if (isset($_GET['ID_USUARIO'])) {
    $ID_USUARIO = $_GET['ID_USUARIO'];

    $query = "SELECT * FROM usuario where ID_USUARIO = $ID_USUARIO";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $NOMBRE_USUARIO = $row['username'];
        $PASSWORD = $row['password'];
        $TIPO_USUARIO = $row['tipo_user'];
        if($TIPO_USUARIO == 1){
            $TIPO_USUARIO2 = 'Administrador';
        } else if($TIPO_USUARIO == 2)
        {
            $TIPO_USUARIO2 = 'Doctores';
        }  else if($TIPO_USUARIO == 3)
        {
            $TIPO_USUARIO2 = 'Empleado';
        }
        $NOMBRE = $row['nombre'];
        $APELLIDO = $row['apellido'];
        $hora_entrada = $row["hora_entrada"];
        $ESTADO = $row['status'];
        $waos = 'exito';
    }
}

//Codigo para actualizar en la base de datos
if (isset($_POST['update'])) {
    $ID_USUARIO = $_GET['ID_USUARIO'];
    $NOMBRE_USUARIO = $_POST['username'];
    $PASSWORD = $_POST['password'];
    $NOMBRE = $_POST['nombre'];
    $APELLIDO = $_POST['apellido'];
    $TIPO_USUARIO = $_POST['TIPO_USUARIO'];
    if($TIPO_USUARIO == 'Administrador'){
        $TIPO_USUARIO = '1';
    } else if($TIPO_USUARIO == 'Doctores')
    {
        $TIPO_USUARIO = '2';
    }  else if($TIPO_USUARIO == 'Empleados')
    {
        $TIPO_USUARIO = '3';
    }
    if (isset($_POST['ESTADO']) == '1') {
        $ESTADO = TRUE;
    } else {
        $ESTADO = FALSE;
    }


    $query = "UPDATE usuario set username = '$NOMBRE_USUARIO', PASSWORD = '$PASSWORD', STATUS = '$ESTADO', TIPO_USER = '$TIPO_USUARIO', NOMBRE =  '$NOMBRE', APELLIDO = '$APELLIDO'
    where ID_USUARIO = $ID_USUARIO";
    mysqli_query($conn, $query);

    $_SESSION['message'] = 'Usuario actualizado satisfactoriamente';
    $_SESSION['message_type'] = 'info';

    header("Location: MantenimientoUsuario.php");
}
?>

<?php include("../includes/header.php"); ?>



<div class="col-md-6 shadow-lg p-2 mb-5 bg-light mx-auto  rounded ">
    <h1 class="p-3 text-left ">Actualizando Usuarios</h1>
    <div class="p-4">
        <form name="formulario" action="editarUsuario.php?ID_USUARIO=<?php echo $_GET['ID_USUARIO']; ?>" method="POST" class="row g-3 needs-validation was-validated" novalidate="">
            <!--NOMBRE-->
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
                    <input name="username" value="<?php echo $NOMBRE_USUARIO; ?>" type="text" class="form-control" id="username" aria-describedby="validationTooltipUsernamePrepend" required="">
                    <div class="invalid-tooltip">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                            </font>
                        </font>
                    </div>
                </div>
            </div>
            <!--Contraseña-->
            <div class="col-md-4 position-relative">
                <label for="" class="form-label">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Contraseña</font>
                    </font>
                </label>
                <input name="password" value="<?php echo $PASSWORD; ?>" type="password" class="form-control" id="password" minlength="11" maxlength="13" required="">
                <div class="valid-tooltip">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">
                        </font>
                    </font>
                </div>
            </div>
            <!--Nombre-->
            <div class="col-md-4 position-relative">
                <label for="" class="form-label">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Nombre</font>
                    </font>
                </label>
                <input name="nombre" value="<?php echo $NOMBRE; ?>" type="text" class="form-control" id="nombre" required="">
                <div class="valid-tooltip">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">
                        </font>
                    </font>
                </div>
            </div>
            <!--Apellido-->
            <div class="col-md-4 position-relative">
                <label for="" class="form-label">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Apellido</font>
                    </font>
                </label>
                <input name="apellido" value="<?php echo $APELLIDO; ?>" id="apellido" type="text" class="form-control" minlength="3" maxlength="40" required="">
                <div class="valid-tooltip">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">
                        </font>
                    </font>
                </div>
            </div>
            <!--Tipo-->
            <div class="col-md-3 position-relative">
                <label for="tipo_usuario" class="form-label">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Tipo Usuario</font>
                    </font>
                </label>
                <select class="form-select" name="TIPO_USUARIO" aria-label="Default select example">
                    <option selected value="<?php echo $TIPO_USUARIO2 ?>"> <?php echo $TIPO_USUARIO2 ?> </option>
                    <?php foreach ($result2 as $opciones) : ?>
                        <option value="<?php echo $opciones['nombre_tipo'] ?>" <?php if ($opciones['nombre_tipo'] == $TIPO_USUARIO) {
                                                                                    echo "selected";
                                                                                }  ?>><?php echo $opciones['nombre_tipo'] ?></option>

                    <?php endforeach ?>
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
                <input class="form-group-input" name='ESTADO' value="" <?php if ($ESTADO) echo "checked"; ?> type="checkbox" id="flexCheckDefault">
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