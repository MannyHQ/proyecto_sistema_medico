<?php

include("../DATABASE/db.php");

if (isset($_POST['buscar'])) {
    $cedula = $_POST['cedula'];
    $valores = array();
    $valores['existe'] = "0";

    $resultados = mysqli_query($conn, "SELECT nombre,apellido, correo, num_telefono,seguro,direccion,sexo,cedula,fecha_naci,nombre_aseguradora FROM paciente
    CROSS JOIN aseguradora
    CROSS JOIN correo
    CROSS JOIN paciente_vs_aseguradora ON paciente.cedula = paciente_vs_aseguradora.id_paciente
    CROSS JOIN paciente_vs_correo ON paciente.cedula = paciente_vs_correo.id_paciente
    CROSS JOIN paciente_vs_telefono ON paciente.cedula = paciente_vs_telefono.id_paciente
    WHERE aseguradora.id_aseguradora = paciente_vs_aseguradora.id_aseguradora AND correo.id_correo = paciente_vs_correo.id_correo AND paciente.cedula = $cedula;");

    while ($consulta = mysqli_fetch_array($resultados)) {
        $valores['existe'] = "1";
        $valores['nombre'] = $consulta['nombre'];
        $valores['apellido'] = $consulta['apellido'];
        $valores['correo'] = $consulta['correo'];
        $valores['num_telefono'] = $consulta['num_telefono'];
        $valores['seguro'] = $consulta['seguro'];
        $valores['nombre_aseguradora'] = $consulta['nombre_aseguradora'];
        $valores['direccion'] = $consulta['direccion'];
    }
    $valores = json_encode($valores);
    echo $valores;
}

//------------------------------------------------------------------------------------------------------------------------------------------------------------------------//

if (isset($_POST['busca'])) {
    $procedimiento = $_POST['procedimiento'];
    $valores = array();
    $valores['existe'] = "0";

    $resultados = mysqli_query($conn, "SELECT precio_proc FROM procedimientos  WHERE id_proc = $procedimiento;");

    while ($consulta = mysqli_fetch_array($resultados)) {
        $valores['existe'] = "1";
        $valores['precio'] = $consulta['precio_proc'];
    }
    $valores = json_encode($valores);
    echo $valores;
}
//------------------------------------------------------------------------------------------------------------------------------------------------------------------------//

if (isset($_POST['buscando'])) {
    $cedula = $_POST['cedula'];
    $valores = array();

    $resultados = mysqli_query($conn, "SELECT cedula FROM paciente WHERE cedula =$cedula;");

    if (mysqli_num_rows($resultados) > 0) {

        echo $valores = 1;
    }
}

//------------------------------------------------------------------------------------------------------------------------------------------------------------------------//
if (isset($_POST['buscando_doctor'])) {
    $cedula = $_POST['cedula'];
    $valores = array();

    $resultados = mysqli_query($conn, "SELECT cedula FROM doctor WHERE cedula =$cedula;");

    if (mysqli_num_rows($resultados) > 0) {

        echo $valores = 1;
    }
}
//------------------------------------------------------------------------------------------------------------------------------------------------------------------------//
