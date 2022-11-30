<?php

include("../DATABASE/db.php");


if (isset($_POST['btn_enviar'])) {

    $cedula = $_POST['cedula'];
    $precio = $_POST['precio'];
    $fecha = $_POST['fecha'];
    $tipo_pago = $_POST['tipo_pago'];
    if (isset($_POST["status"])) {
        $status = 0;
    } else {
        $status = 1;
    }

    $consulta = "INSERT INTO factura(id_paciente,monto,fecha_factura,tipo_pago,status) VALUES ('$cedula','$precio',NOW(),'$tipo_pago','$status')";

    $resultado = mysqli_query($conn, $consulta);
    if (!$resultado) {
        die("Querry Failed");
    }
    

   header("Location: ../Pantallas/Facturacion.php");
}
?>