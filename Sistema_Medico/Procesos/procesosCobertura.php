<?php

include("../DATABASE/db.php");

if (isset($_POST['buscar'])) {
    $cedula = $_POST['cedula'];
    $valores = array();
    $valores['existe'] = "0";

     //$resultados = mysqli_query($conn, "SELECT * FROM paciente WHERE cedula = '$cedula' ");
    $resultados = mysqli_query($conn, "SELECT nombre,apellido, correo, num_telefono,seguro,direccion,sexo,cedula,fecha_naci,nombre_aseguradora FROM paciente
    CROSS JOIN aseguradora
    CROSS JOIN correo
    CROSS JOIN paciente_vs_aseguradora ON paciente.cedula = paciente_vs_aseguradora.id_paciente
    CROSS JOIN paciente_vs_correo ON paciente.cedula = paciente_vs_correo.id_paciente
    CROSS JOIN paciente_vs_telefono ON paciente.cedula = paciente_vs_telefono.id_paciente
    WHERE aseguradora.id_aseguradora = paciente_vs_aseguradora.id_aseguradora AND correo.id_correo = paciente_vs_correo.id_correo AND paciente.cedula = $cedula;");
    //$resultados = mysqli_query($conex, "SELECT * FROM paciente p, paciente_vs_telefono pt, paciente_vs_correo pc WHERE p.cedula ='$cedula' AND pt.id_paciente ='$cedula' AND pc.id_paciente ='$cedula'");
    while ($consulta = mysqli_fetch_array($resultados)) {
        $valores['existe'] = "1";
        $valores['nombre'] = $consulta['nombre'];
        $valores['apellido'] = $consulta['apellido'];
        $valores['correo'] = $consulta['correo'];
        $valores['num_telefono'] = $consulta['num_telefono'];
       // $valores['sexo'] = $consulta['sexo'];
       // $valores['fecha'] = $consulta['fecha_naci'];
       // $valores['cedula'] = $consulta['cedula'];
        $valores['seguro'] = $consulta['seguro'];
        $valores['nombre_aseguradora'] = $consulta['nombre_aseguradora'];
        $valores['direccion'] = $consulta['direccion'];
       // $valores['tipo_sangre'] = $consulta['tipo_sangre'];
       // $valores['status'] = $consulta['status'];
        //$valores['celular'] = $consulta['celular'];
       
    }
    $valores = json_encode($valores);
    echo $valores;
}

//------------------------------------------------------------------------------------------------------------------------------------------------------------------------//

if (isset($_POST['busca'])) {
    $procedimiento = $_POST['procedimiento'];
    $valores = array();
    $valores['existe'] = "0";

     //$resultados = mysqli_query($conn, "SELECT * FROM paciente WHERE cedula = '$cedula' ");
    $resultados = mysqli_query($conn, "SELECT precio_proc FROM procedimientos  WHERE id_proc = $procedimiento;");
    //$resultados = mysqli_query($conex, "SELECT * FROM paciente p, paciente_vs_telefono pt, paciente_vs_correo pc WHERE p.cedula ='$cedula' AND pt.id_paciente ='$cedula' AND pc.id_paciente ='$cedula'");
    while ($consulta = mysqli_fetch_array($resultados)) {
        $valores['existe'] = "1";
        $valores['precio'] = $consulta['precio_proc'];
//        $valores['apellido'] = $consulta['apellido'];
//        $valores['correo'] = $consulta['correo'];
//        $valores['num_telefono'] = $consulta['num_telefono'];
//       // $valores['sexo'] = $consulta['sexo'];
//       // $valores['fecha'] = $consulta['fecha_naci'];
//       // $valores['cedula'] = $consulta['cedula'];
//        $valores['seguro'] = $consulta['seguro'];
//        $valores['nombre_aseguradora'] = $consulta['nombre_aseguradora'];
//        $valores['direccion'] = $consulta['direccion'];
       // $valores['tipo_sangre'] = $consulta['tipo_sangre'];
       // $valores['status'] = $consulta['status'];
        //$valores['celular'] = $consulta['celular'];
       
    }
    $valores = json_encode($valores);
    echo $valores;
}
//------------------------------------------------------------------------------------------------------------------------------------------------------------------------//










if (isset($_POST['buscar2'])) {
    $cedula = $_POST['cedula'];
    $valores2 = array();
    $valores2['existe'] = "0";

    $resultados2 = mysqli_query($conex, "SELECT * FROM paciente_vs_telefono WHERE id_paciente = '$cedula' ");
    while ($consulta2 = mysqli_fetch_array($resultados2)) {
        $valores2['existe'] = "1";
        $valores2['num_telefono'] = $consulta2['num_telefono'];
    }
    sleep(1);
    $valores2 = json_encode($valores2);
    echo $valores2;
}
