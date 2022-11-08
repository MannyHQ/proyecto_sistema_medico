<?php 

    include("../DATABASE/db.php");
    //Codigo para agregar en la base de datos
    if(isset($_POST['agregarUsuario'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $TIPO_USUARIO = $_POST['TIPO_USUARIO'];
        if (isset($_POST['ESTADO']) == '1'){
            $ESTADO = TRUE;

        }else{
            $ESTADO = FALSE;
        }
   
            
       
        $query = "INSERT INTO usuarios(username, password, nombre, apellido TIPO_USUARIO,STATUS) VALUES ('$username', '$password','$nombre','$apellido''$TIPO_USUARIO','$ESTADO')";
        $result = mysqli_query($conn, $query);
        if(!$result){
             die("Querry Failed");
        }
        
        $_SESSION['message'] = 'Usuario guardado exitosamente';
        $_SESSION['message_type'] = 'success';

        header("Location: ../Pantallas/MantenimientoUsuario.php");

    }
    
?>