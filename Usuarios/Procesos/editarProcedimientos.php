<?php include("../DATABASE/db.php");




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

<div class="container p-4">
    <div class="row">

        <div class="col-md-4">
            <div class="card card-body ">

                <form action="../Procesos/editarProcedimientos.php?ID_PROC=<?php echo $_GET['id_proc']; ?>" method="POST">
                    <div class="form-group">
                        <label for="nombre_proc">Nombre procedimiento</label>
                        <input type="text" class="form-control" name="nombre" value="<?php echo $NOMBRE; ?>" id="nombre">
                    </div>
                    <div class="form-group">
                        <label for="">Descripcion</label>
                        <input type="text" class="form-control" name="descripcion" value="<?php echo $DESCRIPCION; ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Precio</label>
                        <input type="text" class="form-control" name="precio" value="<?php echo $PRECIO; ?>">
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
    </div>
</div>

<?php include("../includes/footer.php"); ?>