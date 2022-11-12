<?php

include("../Conexion/abrir_conexion.php");

if (isset($_POST['btn_modificar'])) {

    $cedula = $_POST['cedula'];

    $consulta = " ";

    $resultado = mysqli_query($conex, $consulta);
    if (!$resultado) {
        die("Querry Failed");
    }

    $_SESSION['message'] = 'Usuario Modificado Exitosamente';
    $_SESSION['message_type'] = 'success';

    header("Location: ../Mantenimientos/mant_paciente.php");
}
?>

