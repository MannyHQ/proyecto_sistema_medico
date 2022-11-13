<?php include("../DATABASE/db.php");




    //Para traer el dato seleccionado a la pantala de actualizar
    if (isset($_GET['ID_ASEGURADORA'])) {
        $ID_ASEGURADORA = $_GET['ID_ASEGURADORA'];

        $query = "SELECT * FROM aseguradora where ID_ASEGURADORA = $ID_ASEGURADORA";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $NOMBRE = $row['nombre'];
            $DIRECCION = $row['direccion'];
            $CORREO = $row['correo'];
            $TELEFONO = $row['telefono'];
            $ESTADO = $row['status'];
        }
    }

    //Codigo para actualizar en la base de datos
    if (isset($_POST['update'])) {
        $ID_ASEGURADORA = $_GET['ID_ASEGURADORA'];
        $NOMBRE = $_POST['nombre'];
        $DIRECCION = $_POST['direccion'];
        $CORREO = $_POST['correo'];
        $TELEFONO = $_POST['telefono'];
        if (isset($_POST['ESTADO']) == '1') {
            $ESTADO = TRUE;
        } else {
            $ESTADO = FALSE;
        }


        $query = "UPDATE aseguradora set nombre = '$NOMBRE', direccion = '$DIRECCION', STATUS = '$ESTADO', correo = '$CORREO', telefono =  '$TELEFONO'
    where id_aseguradora = $ID_ASEGURADORA";
        mysqli_query($conn, $query);

        $_SESSION['message'] = 'Aseguradora actualizado satisfactoriamente';
        $_SESSION['message_type'] = 'info';

        header("Location: ../Pantallas/MantenimientoAseguradora.php");
    }
?>



<?php include("../includes/header.php") ?>

<div class="container p-4">
    <div class="row">

        <div class="col-md-4">
            <div class="card card-body ">

                <form action="../Procesos/editarAseguradora.php?ID_ASEGURADORA=<?php echo $_GET['ID_ASEGURADORA']; ?>" method="POST">
                    <div class="form-group">
                        <label for="nombre_proc">Nombre aseguradora</label>
                        <input type="text" class="form-control" name="nombre" value="<?php echo $NOMBRE; ?>" id="nombre">
                    </div>
                    <div class="form-group">
                        <label for="">Direccion</label>
                        <input type="text" class="form-control" name="direccion" value="<?php echo $DIRECCION; ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Correo</label>
                        <input type="text" class="form-control" name="correo" value="<?php echo $CORREO; ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Telefono</label>
                        <input type="text" class="form-control" name="telefono" value="<?php echo $TELEFONO; ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-group-input" name='ESTADO' type="checkbox" value="" <?php if ($ESTADO) echo "checked"; ?> id="flexCheckDefault">
                        <label class="form-group-label" for="flexCheckDefault">
                            Estado
                        </label>
                    </div>
                    <button class="btn btn-success" name="update">
                        Actualizar
                    </button>

                </form>

            </div>
        </div>

        <?php include("../includes/footer.php"); ?>