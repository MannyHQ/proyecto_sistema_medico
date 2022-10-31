<?php include("../DATABASE/db.php");

//Para traer datos de los tipos de usuario

    $query2 = "SELECT * FROM tipos_usuario";
    $result2 = mysqli_query($conn, $query2);



//Para traer el dato seleccionado a la pantala de actualizar
if(isset($_GET['ID_USUARIO'])){
    $ID_USUARIO = $_GET['ID_USUARIO'];
    
    $query = "SELECT * FROM usuarios where ID_USUARIO = $ID_USUARIO";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_array($result);
        $NOMBRE_USUARIO = $row['NOMBRE_USUARIO'];
        $PASSWORD = $row['PASSWORD'];
        $TIPO_USUARIO = $row['TIPO_USUARIO'];
        $ESTADO = $row['STATUS'];
        $waos = 'exito';
    } 
}

//Codigo para actualizar en la base de datos
if (isset($_POST['update'])) {
    $ID_USUARIO = $_GET['ID_USUARIO'];
    $NOMBRE_USUARIO = $_POST['NOMBRE_USUARIO'];
    $PASSWORD = $_POST['PASSWORD'];
    $TIPO_USUARIO = $_POST['TIPO_USUARIO'];
    if (isset($_POST['ESTADO']) == '1'){
        $ESTADO = TRUE;

    }else{
        $ESTADO = FALSE;
    }
    

  $query = "UPDATE usuarios set NOMBRE_USUARIO = '$NOMBRE_USUARIO', PASSWORD = '$PASSWORD', STATUS = '$ESTADO', TIPO_USUARIO = '$TIPO_USUARIO'
   where ID_USUARIO = $ID_USUARIO";
  mysqli_query($conn, $query);

    $_SESSION['message'] = 'Usuario actualizado satisfactoriamente';
      $_SESSION['message_type'] = 'info';
 
  header("Location: MantenimientoUsuario.php");
}
?>

<?php include("../includes/header.php"); ?>

<div class="container p-4">
    
    <div class="row">

        <div class="col-md-4 mx-auto">

            <div class="card card-body">
                <form action="editarUsuario.php?ID_USUARIO=<?php echo $_GET['ID_USUARIO']; ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="NOMBRE_USUARIO" value="<?php echo $NOMBRE_USUARIO; ?>" class="form-control" placeholder="Actualizar Usuario" autofocus>
                    </div>
                    <div class="form-group">
                        <input type="text" name="PASSWORD" value="<?php echo $PASSWORD; ?>" class="form-control" placeholder="Actualizar Contraseña">
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name='ESTADO' type="checkbox" value="" <?php if ($ESTADO) echo "checked"; ?> id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Estado
                        </label>
                    </div>

                    <select class="form-select" name="TIPO_USUARIO" aria-label="Default select example">
                        <?php foreach ($result2 as $opciones): ?>

                            <option value="<?php echo $opciones['TIPO_USUARIO']?>" <?php if($opciones['TIPO_USUARIO'] == $TIPO_USUARIO){
                                echo "selected";
                            }  ?>  ><?php echo $opciones['TIPO_USUARIO']?></option>
                            
                        <?php endforeach ?>    
                    </select>       

                    <button class="btn btn-success" name="update">
                        Actualizar
                    </button>
                </form>
            </div>

        </div>
    </div>
        
    </div>

<?php include("../includes/footer.php"); ?>
