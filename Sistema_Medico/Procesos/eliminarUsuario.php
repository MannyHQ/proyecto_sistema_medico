<?php

    include("../DATABASE/db.php");
    
    if(isset($_GET['ID_USUARIO'])){
        $ID_USUARIO = $_GET['ID_USUARIO'];
        
        $query = "DELETE FROM usuarios where ID_USUARIO = $ID_USUARIO";
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

