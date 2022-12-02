<?php 

    include("../DATABASE/db.php");
    //Codigo para agregar en la base de datos
    if(isset($_POST['agregarDoctor'])){
        $nombre = $_POST['nombre'];
        $sexo = $_POST['sexo'];
        $direccion = $_POST['direccion'];
        $exaquatur = $_POST['exequatur'];
        $cedula = $_POST['cedula'];
        $especialidades = $_POST['especialidad'];
        $horario = $_POST['horario'];
        
        if (isset($_POST['ESTADO']) == '1'){
            $ESTADO = TRUE;

        }else{
            $ESTADO = FALSE;
        }
        $query = "INSERT INTO doctor(nombre, sexo, direccion, exequatur, cedula, especialidades ,horario, status) VALUES ('$nombre', '$sexo','$direccion','$exaquatur','$cedula','$especialidades','$horario','$ESTADO')";
        $result = mysqli_query($conn, $query);
        if(!$result){
             die("Querry Failed");
        }
        
        $_SESSION['message'] = 'Doctor guardado exitosamente';
        $_SESSION['message_type'] = 'success';

        header("Location: ../Pantallas/MantenimientoDoctores.php");

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
    