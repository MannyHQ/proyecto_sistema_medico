<?php

include("Conexion/con_bd.php");

if (isset($_POST['btn_eliminar'])) {

    $cedula = $_POST['cedula'];

    $consulta = "DELETE FROM paciente WHERE cedula = '$cedula' ";

    $resultado = mysqli_query($conex, $consulta);
    if (!$resultado) {
        die("Querry Failed");
    }

    $_SESSION['message'] = 'Usuario eliminado exitosamente';
    $_SESSION['message_type'] = 'success';

    header("Location: Mantenimientos/mant_paciente.php");
}
?>


