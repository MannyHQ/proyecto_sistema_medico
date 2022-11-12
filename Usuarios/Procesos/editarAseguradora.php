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
        else{
        $NOMBRE_USUARIO = ".";
        $PASSWORD = ".";
        $TIPO_USUARIO = "";
        $NOMBRE = "";
        $APELLIDO = "";
        $hora_entrada = "";
        $ESTADO = "";
        $waos = "";
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