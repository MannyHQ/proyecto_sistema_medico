<?php

include("../Conexion/abrir_conexion.php");

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

    if (isset($_POST["status"])) {
        $status = 1;
    } else {
        $status = 0;
    }

    $consulta = "INSERT INTO paciente(nombre,apellido,sexo,fecha_naci,cedula,seguro,direccion,tipo_sangre,status)  VALUES ('$nombre','$apellido','$sexo','$fechana','$cedula','$num_ars','$direccion','$tiposangre','$status')";

    $resultado = mysqli_query($conex, $consulta);
    if (!$resultado) {
        die("Querry Failed");
    }

    //-------------------------------------------------------------------------------------------------------------------------------------------------------//

    $contelefono = "INSERT INTO telefono(num_telefono)  VALUES ('$telefono')";

    $resultado2 = mysqli_query($conex, $contelefono);
    if (!$resultado2) {
        die("Querry Failed");
    }

    //-------------------------------------------------------------------------------------------------------------------------------------------------------//

    $conpsc_vs_tel = "INSERT INTO paciente_vs_telefono(id_paciente,num_telefono)   VALUES ('$cedula','$telefono')";

    $resultado3 = mysqli_query($conex, $conpsc_vs_tel);
    if (!$resultado3) {
        die("Querry Failed");
    }


//-------------------------------------------------------------------------------------------------------------------------------------------------------//

    $conemail = "INSERT INTO correo(correo)  VALUES ('$email')";

    $resultado4 = mysqli_query($conex, $conemail);
    if (!$resultado4) {
        die("Querry Failed");
    }

    //-------------------------------------------------------------------------------------------------------------------------------------------------------//

    $conpsc_vs_email = "INSERT INTO paciente_vs_correo(id_paciente,id_correo)  VALUES ('$cedula','$email')";

    $resultado5 = mysqli_query($conex, $conpsc_vs_email);
    if (!$resultado5) {
        die("Querry Failed");
    }

    $_SESSION['message'] = 'Usuario Guardado Exitosamente';
    $_SESSION['message_type'] = 'success';

    header("Location: ../Mantenimientos/mant_paciente.php");
}
?>
