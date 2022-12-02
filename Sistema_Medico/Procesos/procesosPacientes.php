<?php

include("../DATABASE/db.php");
//Codigo para agregar en la base de datos
if (isset($_POST['agregarPaciente'])) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $sexo = $_POST['sexo'];
    $email = $_POST['correo'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $cedula = $_POST['cedula'];
    $seguro = $_POST['seguro'];
    $direccion = $_POST['direccion'];
    $tipo_sangre = $_POST['tipo_sangre'];
    $telefono = $_POST['telefono'];
    $afiliado = $_POST['afiliado'];
    if (isset($_POST['ESTADO']) == '1') {
        $ESTADO = TRUE;
    } else {
        $ESTADO = FALSE;
    }
    $query = "INSERT INTO paciente(nombre, apellido, sexo, fecha_naci, cedula, seguro, direccion ,tipo_sangre, status) VALUES ('$nombre','$apellido', '$sexo','$fecha_nacimiento','$cedula','$afiliado','$direccion','$tipo_sangre','$ESTADO')";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Querry Failed");
    }

    //-------------------------------------------------------------------------------------------------------------------------------------------------------//

    $contelefono = "INSERT INTO telefono(num_telefono)  VALUES ('$telefono')";

    $resultado2 = mysqli_query($conn, $contelefono);
    if (!$resultado2) {
        die("Querry Failed");
    }

    //-------------------------------------------------------------------------------------------------------------------------------------------------------//

    $conpsc_vs_telefono = "INSERT INTO paciente_vs_telefono(id_paciente,num_telefono)  VALUES ('$cedula','$telefono')";

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

    $conpsc_vs_email = "INSERT INTO paciente_vs_correo(id_paciente,id_correo)  VALUES ('$cedula','$email')";

    $resultado5 = mysqli_query($conn, $conpsc_vs_email);
    if (!$resultado5) {
        die("Querry Failed");
    }
    //-------------------------------------------------------------------------------------------------------------------------------------------------------//

    $conpsc_vs_ars = "INSERT INTO paciente_vs_aseguradora (id_paciente,id_aseguradora)  VALUES ('$cedula','$seguro')";

    $resultado6 = mysqli_query($conn, $conpsc_vs_ars);
    if (!$resultado6) {
        die("Querry Failed");
    }

    $_SESSION['message'] = 'Paciente guardado exitosamente';
    $_SESSION['message_type'] = 'success';

    header("Location: ../Pantallas/MantenimientoPacientes.php");
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
