<?php 

    include("../DATABASE/db.php");
    //Codigo para agregar en la base de datos
    if(isset($_POST['agregarUsuario'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $TIPO_USUARIO = $_POST['tipo_usuario'];
        if($TIPO_USUARIO == 'Administrador'){
            $TIPO_USUARIO = '1';
        } else if($TIPO_USUARIO == 'Doctores')
        {
            $TIPO_USUARIO = '2';
        }  else if($TIPO_USUARIO == 'Empleados')
        {
            $TIPO_USUARIO = '3';
        }
        if (isset($_POST['ESTADO']) == '1'){
            $ESTADO = TRUE;

        }else{
            $ESTADO = FALSE;
        }
        $query = "INSERT INTO usuario(username, password, nombre, apellido,hora_entrada, tipo_user,status) VALUES ('$username', '$password','$nombre','$apellido','5','$TIPO_USUARIO','$ESTADO')";
        $result = mysqli_query($conn, $query);
        if(!$result){
             die("Querry Failed");
        }
        
        $_SESSION['message'] = 'Usuario guardado exitosamente';
        $_SESSION['message_type'] = 'success';

        header("Location: ../Pantallas/MantenimientoUsuario.php");

    }
    // Para eliminar
    if(isset($_GET['ID_USUARIO'])){
        $ID_USUARIO = $_GET['ID_USUARIO'];
        
        $query = "DELETE FROM usuario where ID_USUARIO = $ID_USUARIO";
        $result = mysqli_query($conn, $query);

        if(!$result)
        {
            die("Querry failed");
        }

        $_SESSION['message'] = 'Usuario eliminado correctamente';
        $_SESSION['message_type'] = 'danger';
        
        header("Location: ../Pantallas/MantenimientoUsuario.php");
    }
    //Para editar
    if(isset($_GET['ID_USUARIO'])){
        $ID_USUARIO = $_GET['ID_USUARIO'];
        
        $query = "DELETE FROM usuario where ID_USUARIO = $ID_USUARIO";
        $result = mysqli_query($conn, $query);

        if(!$result)
        {
            die("Querry failed");
        }

        $_SESSION['message'] = 'Usuario eliminado correctamente';
        $_SESSION['message_type'] = 'danger';
        
        header("Location: ../Pantallas/MantenimientoUsuario.php");
    }
    
?>