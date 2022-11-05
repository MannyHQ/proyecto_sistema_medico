<?php

include("Conexion/con_bd.php");

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
    $tiposangre = $_POST['tiposangre'];

    $consulta = "INSERT INTO paciente(nombre,apellido,sexo,fecha_naci,cedula,seguro,direccion,tipo_sangre)  VALUES ('$nombre','$apellido','$sexo','$fechana','$cedula','$num_ars','$direccion','$tiposangre')";

    $resultado = mysqli_query($conex, $consulta);
    if (!$resultado) {
        die("Querry Failed");
    }

    $contelefono = "INSERT INTO telefono(num_telefono)  VALUES ('$telefono')";

    $resultado2 = mysqli_query($conex, $contelefono);
    if (!$resultado2) {
        die("Querry Failed");
    }

    $_SESSION['message'] = 'Usuario guardado exitosamente';
    $_SESSION['message_type'] = 'success';

    header("Location: Mantenimientos/mant_paciente.php");
}
?>
