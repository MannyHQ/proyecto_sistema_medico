<?php include("../DATABASE/db.php");

//Para traer datos de los tipos de usuario

    $query2 = "SELECT * FROM tipo_usuario";
    $result2 = mysqli_query($conn, $query2);



//Para traer el dato seleccionado a la pantala de actualizar
if(isset($_GET['ID_USUARIO'])){
    $ID_USUARIO = $_GET['ID_USUARIO'];
    
    $query = "SELECT * FROM usuario where ID_USUARIO = $ID_USUARIO";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_array($result);
        $NOMBRE_USUARIO = $row['username'];
        $PASSWORD = $row['password'];
        $TIPO_USUARIO = $row['tipo_user'];
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
    if (isset($_POST['ESTADO']) == '1'){
        $ESTADO = TRUE;

    }else{
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

<div class="container p-4">
    
    <div class="row">

        <div class="col-md-4 mx-auto">

            <div class="card card-body">
                <form action="editarUsuario.php?ID_USUARIO=<?php echo $_GET['ID_USUARIO']; ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="username" value="<?php echo $NOMBRE_USUARIO; ?>" class="form-control" placeholder="Actualizar Usuario" autofocus>
                    </div>
                    <div class="form-group">
                        <input type="text" name="password" value="<?php echo $PASSWORD; ?>" class="form-control" placeholder="Actualizar Usuario" autofocus>
                    </div>
                    <div class="form-group">
                        <input type="text" name="nombre" value="<?php echo $NOMBRE; ?>" class="form-control" placeholder="Actualizar Usuario" autofocus>
                    </div>
                    <div class="form-group">
                        <input type="text" name="apellido" value="<?php echo $APELLIDO; ?>" class="form-control" placeholder="Actualizar Usuario" autofocus>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name='ESTADO' type="checkbox" value="" <?php if ($ESTADO) echo "checked"; ?> id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Estado
                        </label>
                    </div>

                    <select class="form-select" name="TIPO_USUARIO" aria-label="Default select example">
                        <?php foreach ($result2 as $opciones): ?>

                            <option value="<?php echo $opciones['nombre_tipo']?>" <?php if($opciones['nombre_tipo'] == $TIPO_USUARIO){
                                echo "selected";
                            }  ?>  ><?php echo $opciones['nombre_tipo']?></option>
                            
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
