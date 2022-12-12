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
    $procedimiento = $_POST['procedimiento'];
    $precio = $_POST['precio'];
    $cob_solicitado = $_POST['cob_solicitado'];
    $aleatorio = rand(1000, 9999);

    if (isset($_POST['status']) == '1') {
        $status = TRUE;
    } else {
        $status = FALSE;
    }
    
    $cons = "SELECT * FROM procedimientos WHERE id_proc = $procedimiento";
    $bus = mysqli_query($conn, $cons);
    $res = mysqli_fetch_array($bus);
    $nom_pro = $res['nombre_proc'];

    $consulta = "INSERT INTO cobertura(nombre,apellido,cedula,email,telefono,celular,ars,num_ars,direccion,status,procedimiento,precio,cob_solicitado,num_autorizacion,fecha_cobertura) VALUES ('$nombre','$apellido','$cedula','$email','$telefono','$celular','$ars','$num_ars','$direccion','$status','$nom_pro','$precio','$cob_solicitado','$aleatorio',NOW())";

    $resultado = mysqli_query($conn, $consulta);
    if (!$resultado) {
        die("Querry Failed");
    }


    header("Location: ../Pantallas/confirmarCobertura.php");
}
?>