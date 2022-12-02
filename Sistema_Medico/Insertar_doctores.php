<?php

include("db.php");

if (isset($_POST['btn_registrar'])) {

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $cedula = $_POST['cedula'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $celular = $_POST['celular'];
    $exaquatur = $_POST['exaquatur'];
    $direccion = $_POST['direccion'];
    $usuario = $_POST['usuario'];
    $especialidad = $_POST['especialidad'];
    $sexo = $_POST['sexo'];
    $horario = $_POST['horario'];
    $status = $_POST['status'];

        $consulta = "INSERT INTO doctores(nombre, apellido, cedula,email,telefono,celular,exaquatur,direccion,
        usuario,especialidad,sexo,horario,status) VALUES ('$nombre', '$apellido','$cedula','$email','$telefono','$celular',
        '$exaquatur','$direccion','$usuario','$especialidad','$sexo','$horario','$status')";
        
        $resultado = mysqli_query($conexion,$consulta);
        if(!$resultado){
            die("Error de query");
       }
       header("Location: index.php");
}

?>

