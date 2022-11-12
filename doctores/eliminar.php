<?php

include("db.php");

if (isset($_POST['btn_eliminar'])) {

$cedula = $_POST['cedula'];

$consulta = "DELETE FROM doctores WHERE cedula = '$cedula' ";

    $resultado = mysqli_query($conexion, $consulta);
    if (!$resultado) {
        die("Error en el query");
    }
    
    header("Location: index.php");
}

?>


