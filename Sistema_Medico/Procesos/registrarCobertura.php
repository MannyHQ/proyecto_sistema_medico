<?php

include("../DATABASE/db.php");


if (isset($_POST['btn_enviar'])) {

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $cedula = $_POST['cedula'];
    $email = $_POST['email'];
    $telefono = $_POST['num_telefono'];
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

    $resultado = mysqli_query($conn, $consulta);
    if (!$resultado) {
        die("Querry Failed");
    }
    

   header("Location: ../Pantallas/confirmarCobertura.php");
}
?>