<?php include("../DATABASE/db.php");


$query = "SELECT * FROM aseguradora";
$resultado = mysqli_query($conn, $query);

//Para traer el dato seleccionado a la pantala de actualizar
if (isset($_GET['ID_PACIENTE'])) {
    $ID_PACIENTE = $_GET['ID_PACIENTE'];

    $query = "SELECT * FROM paciente where id_paciente = $ID_PACIENTE";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $NOMBRE = $row['nombre'];
        $SEXO = $row['sexo'];
        $FECHA = $row['fecha_naci'];
        $CEDULA = $row['cedula'];
        $SEGURO = $row['seguro'];
        $DIRECCION = $row['direccion'];
        $SANGRE = $row['tipo_sangre'];
        $ESTADO = $row['status'];
    }
}

//Codigo para actualizar en la base de datos
if (isset($_POST['update'])) {
    $ID_PACIENTE = $_GET['ID_PACIENTE'];
    $NOMBRE = $_POST['nombre'];
    $SEXO = $_POST['sexo'];
    $FECHA = $_POST['fecha_naci'];
    $CEDULA = $_POST['cedula'];
    $SEGURO = $_POST['seguro'];
    $DIRECCION = $_POST['direccion'];
    $SANGRE = $_POST['tipo_sangre'];
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

<div class="container p-4">
    <div class="row">

        <div class="col-md-4">
            <div class="card card-body ">

                <form action="../Procesos/editarPacientes.php?ID_PACIENTE=<?php echo $_GET['ID_PACIENTE']; ?>" method="POST">
                    <div class="form-group">
                        <label for="">Nombre</label>
                        <input type="text" name="nombre" id="nombre" value="<?php echo $NOMBRE; ?>" class="form-control" autofocus>
                    </div>
                    <div class="form-group">
                        <label for='sexo' class="form-check-label" for="flexCheckDefault"> Sexo </label>
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
                    </div>
                    <label for="fecha_naci">Fecha nacimiento</label>
                    <input name="fecha_naci" value="<?php echo $FECHA; ?>" class="form-control" type="date" />
                    <div class="form-group">
                        <label for="">Cedula</label>
                        <input type="text" name="cedula" value="<?php echo $CEDULA; ?>" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for='seguro' class="form-check-label" for="flexCheckDefault"> Seguro </label>
                        <select class="form-select" name="seguro" aria-label="Default select example">
                            <option selected value="<?php echo $SEGURO ?>"> <?php echo $SEGURO ?> </option>
                            <?php foreach ($resultado as $opciones) : ?>

                                <option value="<?php echo $opciones['nombre'] ?>"><?php echo $opciones['nombre'] ?></option>

                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Direccion</label>
                        <input type="text" name="direccion" value="<?php echo $DIRECCION; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for='tipo_sangre' class="form-check-label" for="flexCheckDefault"> Tipo sangre </label>
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
                    </div>

                    <div class="form-group">
                        <input class="form-group-input" name='ESTADO' type="checkbox" value="" <?php if ($ESTADO) echo "checked"; ?> id="flexCheckDefault">
                        <label class="form-group-label" for="flexCheckDefault">
                            Estado
                        </label>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-success" name="update">
                            Actualizar
                        </button>
                    </div>
                </form>

                <?php include("../includes/footer.php") ?>