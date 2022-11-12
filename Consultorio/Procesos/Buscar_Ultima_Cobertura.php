

<?php

include("../Conexion/abrir_conexion.php");

if (isset($_POST['buscar'])) {
    $cedula = $_POST['cedula'];
    $valores = array();
    $valores['existe'] = "0";

    //CONSULTAR
    $resultados = mysqli_query($conex, "SELECT * FROM paciente WHERE cedula = '$cedula' ");
    while ($consulta = mysqli_fetch_array($resultados)) {
        $valores['existe'] = "1"; //Esta variable no la usamos en el vídeo (se me olvido, lo siento xD). Aqui la uso en la linea 97 de registro.php
        $valores['nombre'] = $consulta['nombre'];
        $valores['apellido'] = $consulta['apellido'];
        $valores['direccion'] = $consulta['direccion'];

    }
    sleep(1);
    $valores = json_encode($valores);
    echo $valores;
}

include("../Conexion/cerrar_conexion.php");
?>

