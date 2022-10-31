<?php 

    include("../DATABASE/db.php");

    if(isset($_POST['agregarUsuario'])){
        $NOMBRE_USUARIO = $_POST['NOMBRE_USUARIO'];
        $PASSWORD = $_POST['PASSWORD'];
        $TIPO_USUARIO = $_POST['TIPO_USUARIO'];
        if (isset($_POST['ESTADO']) == '1'){
            $ESTADO = TRUE;

        }else{
            $ESTADO = FALSE;
        }
   
            
       
        $query = "INSERT INTO usuarios(NOMBRE_USUARIO, PASSWORD, TIPO_USUARIO,STATUS) VALUES ('$NOMBRE_USUARIO', '$PASSWORD','$TIPO_USUARIO','$ESTADO')";
        $result = mysqli_query($conn, $query);
        if(!$result){
             die("Querry Failed");
        }
        
        $_SESSION['message'] = 'Usuario guardado exitosamente';
        $_SESSION['message_type'] = 'success';

        header("Location: ../Pantallas/MantenimientoUsuario.php");

    }
?>