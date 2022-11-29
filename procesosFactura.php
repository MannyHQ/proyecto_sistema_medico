<?php

include("../DATABASE/db.php");

if (isset($_POST['buscar'])) {
    $cedula = $_POST['cedula'];
    $valores = array();
    $valores['existe'] = "0";

     //$resultados = mysqli_query($conn, "SELECT * FROM paciente WHERE cedula = '$cedula' ");
    $resultados = mysqli_query($conn, "SELECT id_cob, nombre,apellido, cedula, email,telefono,celular, ars,num_ars,direccion,procedimiento,precio,cob_solicitado,num_autorizacion FROM cobertura
    WHERE  cobertura.cedula = $cedula;");
    //$resultados = mysqli_query($conex, "SELECT * FROM paciente p, paciente_vs_telefono pt, paciente_vs_correo pc WHERE p.cedula ='$cedula' AND pt.id_paciente ='$cedula' AND pc.id_paciente ='$cedula'");
    while ($consulta = mysqli_fetch_array($resultados)) {
        $valores['existe'] = "1";
       // $valores['id_cob'] = $consulta['id_cob'];
        $valores['nombre'] = $consulta['nombre'];
       // $valores['apellido'] = $consulta['apellido'];
      //  $valores['correo'] = $consulta['correo'];
        $valores['num_telefono'] = $consulta['telefono'];
       // $valores['sexo'] = $consulta['sexo'];
       // $valores['fecha'] = $consulta['fecha_naci'];
       // $valores['cedula'] = $consulta['cedula'];
        $valores['ars_nombre'] = $consulta['num_ars'];
        $valores['ars'] = $consulta['ars'];
        $valores['procedimiento'] = $consulta['procedimiento'];
        $valores['precio'] = $consulta['precio'];
        $valores['cobertura'] = $consulta['cob_solicitado'];
        //$valores['celular'] = $consulta['celular'];
       
    }
    $valores = json_encode($valores);
    echo $valores;
}

//------------------------------------------------------------------------------------------------------------------------------------------------------------------------//


