<?php

include("con_bd.php");

if (isset($_POST['btn_eliminar'])) {

$cedula = $_POST['cedula'];

$consulta = "DELETE FROM paciente WHERE cedula = '$cedula' ";

    $resultado = mysqli_query($conex, $consulta);
    if (!$resultado) {
        die("Querry Failed");
    }
    
    header("Location: index.php");
}

?>


