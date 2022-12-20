<?php

include("../DATABASE/db.php");
//Codigo para agregar en la base de datos
if (isset($_POST['agregarDoctor'])) {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $sexo = $_POST['sexo'];
    $direccion = $_POST['direccion'];
    $exaquatur = $_POST['exequatur'];
    $cedula = $_POST['cedula'];
    $especialidades = $_POST['especialidad'];
    $horario = $_POST['horario'];

    if (isset($_POST['ESTADO']) == '1') {
        $ESTADO = TRUE;
    } else {
        $ESTADO = FALSE;
    }

    $query = "INSERT INTO doctor(nombre, sexo, direccion, exequatur, cedula, especialidades ,horario, status) VALUES ('$nombre', '$sexo','$direccion','$exaquatur','$cedula','$especialidades','$horario',$ESTADO)";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Querry Failed");
    }

    $contelefono = "INSERT INTO telefono(num_telefono)  VALUES ('$telefono')";

    $resultado2 = mysqli_query($conn, $contelefono);
    if (!$resultado2) {
        die("Querry Failed");
    }

    //-------------------------------------------------------------------------------------------------------------------------------------------------------//

    $conpsc_vs_telefono = "INSERT INTO doctor_vs_telefono(id_doctor,num_telefono)  VALUES ('$cedula','$telefono')";

    $resultado3 = mysqli_query($conn, $conpsc_vs_telefono);
    if (!$resultado3) {
        die("Querry Failed");
    }

    //-------------------------------------------------------------------------------------------------------------------------------------------------------//

    $conemail = "INSERT INTO correo(correo)  VALUES ('$email')";

    $resultado4 = mysqli_query($conn, $conemail);
    if (!$resultado4) {
        die("Querry Failed");
    }

    //-------------------------------------------------------------------------------------------------------------------------------------------------------//

    $valor_correoquery =  'SELECT  * FROM correo ORDER by id_correo DESC LIMIT 1';
    $valor_correo = mysqli_query($conn, $valor_correoquery);

    if (!$valor_correo) {
        die("Querry Failed");
    }
    $row = mysqli_fetch_array($valor_correo);
    $valor_correos =  $row['id_correo'];
    //---------------------------------------------------------------------------------------------------------------

    $conpsc_vs_email = "INSERT INTO doctor_vs_correo(id_doctor,id_correo)  VALUES ('$cedula',$valor_correos)";

    $resultado5 = mysqli_query($conn, $conpsc_vs_email);
    if (!$resultado5) {
        die("Querry Failed");
    }
    //-------------------------------------------------------------------------------------------------------------------------------------------------------//


    $_SESSION['message'] = 'Doctor guardado exitosamente';
    $_SESSION['message_type'] = 'success';

    header("Location: ../Pantallas/MantenimientoDoctores.php");
}
// Para eliminar
if (isset($_GET['ID_USUARIO'])) {
    $ID_USUARIO = $_GET['ID_USUARIO'];

    $query = "DELETE FROM usuario where ID_USUARIO = $ID_USUARIO";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Querry failed");
    }

    $_SESSION['message'] = 'Usuario eliminado correctamente';
    $_SESSION['message_type'] = 'danger';

    header("Location: ../Pantallas/MantenimientoUsuario.php");
}
//Para editar
if (isset($_GET['ID_USUARIO'])) {
    $ID_USUARIO = $_GET['ID_USUARIO'];

    $query = "DELETE FROM usuario where ID_USUARIO = $ID_USUARIO";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Querry failed");
    }

    $_SESSION['message'] = 'Usuario eliminado correctamente';
    $_SESSION['message_type'] = 'danger';

    header("Location: ../Pantallas/MantenimientoUsuario.php");
}
