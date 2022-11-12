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
//        $valores['direccion'] = $consulta['direccion'];
//        $valores['telefono'] = $consulta['telefono'];
    }
    sleep(1);
    $valores = json_encode($valores);
    echo $valores;
}

if (isset($_POST['guardar'])) {
    $doc = $_POST['doc'];
    $nombre = $_POST['nombre'];
    $dir = $_POST['dir'];
    $tel = $_POST['tel'];
    $existe = "0";

    //CONSULTAR
    $resultados = mysqli_query($conexion, "SELECT * FROM $tabla_db1 WHERE doc = '$doc'");
    while ($consulta = mysqli_fetch_array($resultados)) {
        $existe = "1";
    }

    if ($existe == "1") {
        //actualizar
        $_UPDATE_SQL = "UPDATE $tabla_db1 Set 
				  nombre='$nombre', 
				  direccion='$dir', 
				  telefono='$tel' 
				  
				  WHERE doc='$doc'";
        mysqli_query($conexion, $_UPDATE_SQL);
        echo "<b>Dato Actualizado</b>";
    } else {
        //crear uno nuevo
        mysqli_query($conexion, "INSERT INTO $tabla_db1 
			  (doc,nombre,direccion,telefono) 
			    values 
			  ('$doc','$nombre','$dir','$tel')");
        echo "Propietario Agregado";
    }
}

include("../Conexion/cerrar_conexion.php");
?>

