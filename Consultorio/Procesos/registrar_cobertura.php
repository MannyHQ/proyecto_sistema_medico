<?php

include("../Conexion/abrir_conexion.php");

if (isset($_POST['btn_enviar'])) {

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $cedula = $_POST['cedula'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $celular = $_POST['celular'];
    $ars = $_POST['ars'];
    $num_ars = $_POST['numars'];
    $direccion = $_POST['direccion'];
    
    if (isset($_POST["status"])) {
        $status = 0;
    } else {
        $status = 1;
    }

    $consulta = "INSERT INTO cobertura(nombre,apellido,cedula,email,telefono,celular,ars,num_ars,direccion,status) VALUES ('$nombre','$apellido','$cedula','$email','$telefono','$celular','$ars','$num_ars','$direccion','$status')";

    $resultado = mysqli_query($conex, $consulta);
    if (!$resultado) {
        die("Querry Failed");
    }

    $_SESSION['message'] = 'Usuario guardado exitosamente';
    $_SESSION['message_type'] = 'success';

    header("Location: ../Mantenimientos/cobertura.php");
}
?>

