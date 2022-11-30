<?php 

    include("../DATABASE/db.php");
    //Codigo para agregar en la base de datos
    if(isset($_POST['agregarPaciente'])){
        $nombre = $_POST['nombre'];
        $sexo = $_POST['sexo'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];
        $cedula = $_POST['cedula'];
        $seguro = $_POST['seguro'];
        $direccion = $_POST['direccion'];
        $tipo_sangre = $_POST['tipo_sangre'];
        if (isset($_POST['ESTADO']) == '1'){
            $ESTADO = TRUE;

        }else{
            $ESTADO = FALSE;
        }
        $query = "INSERT INTO paciente(nombre, sexo, fecha_naci, cedula, seguro, direccion ,tipo_sangre, status) VALUES ('$nombre', '$sexo','$fecha_nacimiento','$cedula','$seguro','$direccion','$tipo_sangre','$ESTADO')";
        $result = mysqli_query($conn, $query);
        if(!$result){
             die("Querry Failed");
        }
        
        $_SESSION['message'] = 'Paciente guardado exitosamente';
        $_SESSION['message_type'] = 'success';

        header("Location: ../Pantallas/MantenimientoPacientes.php");

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