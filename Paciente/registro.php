<?php

include("con_bd.php");

if (isset($_POST['btn_registrar'])) {

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $cedula = $_POST['cedula'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $celular = $_POST['celular'];
    $ars = $_POST['ars'];
    $num_ars = $_POST['numars'];
    $direccion = $_POST['direccion'];
    $sexo = $_POST['sexo'];
    $fechana = $_POST['fechana'];

    $consulta = "INSERT INTO paciente(nombre,apellido,cedula,email,telefono,celular,ars,num_afiliado,direccion,sexo,fecha_nacimiento)  VALUES ('$nombre','$apellido','$cedula','$email','$telefono','$celular','$ars','$num_ars','$direccion','$sexo','$fechana')";

    $resultado = mysqli_query($conex, $consulta);
    if (!$resultado) {
        die("Querry Failed");
    }
    header("Location: index.php");
}
?>

