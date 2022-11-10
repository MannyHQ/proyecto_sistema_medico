<?php 

    include("../DATABASE/db.php");
    //Codigo para agregar en la base de datos
    if(isset($_POST['agregarUsuario'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $TIPO_USUARIO = $_POST['tipo_usuario'];
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
    
?>