<?php

include("../DATABASE/db.php");
//Codigo para agregar
if (isset($_POST['agregarAseguradora'])) {
    $nombre_aseguradora = $_POST['nombre_aseguradora'];
    $direccion = $_POST['direccion'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    if (isset($_POST['ESTADO']) == '1') {
        $ESTADO = TRUE;
    } else {
        $ESTADO = FALSE;
    }



    $query = "INSERT INTO aseguradora(nombre_aseguradora, direccion_aseguradora, correo_aseguradora,telefono,status ) VALUES ('$nombre_aseguradora', '$direccion','$correo','$telefono',$ESTADO)";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Querry Failed");
    }

    $_SESSION['message'] = 'Aseguradora guardado exitosamente';
    $_SESSION['message_type'] = 'success';

    header("Location: ../Pantallas/MantenimientoAseguradora.php");
}








//Codigo para editar en la base de datos
if (isset($_POST['actualizarAseguradora'])) {
    $ID = $_POST['id_asg'];
    $nombre = $_POST['nombre_aseguradora'];
    $direccion = $_POST['direccion'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    if (isset($_POST['ESTADO']) == '1') {
        $ESTADO = TRUE;
    } else {
        $ESTADO = FALSE;
    }


    $query = "UPDATE aseguradora set nombre_aseguradora = '$nombre', direccion = '$direccion', STATUS = '$ESTADO', correo = '$correo', telefono = '$telefono'
           where id_aseguradora = $ID";
    mysqli_query($conn, $query);

    $_SESSION['message'] = 'Usuario actualizado satisfactoriamente';
    $_SESSION['message_type'] = 'info';

    header("Location: ../Pantallas/MantenimientoAseguradora.php");
}

//
if (isset($_POST['buscar'])) {
    $id = $_POST['id_proc'];
    $valores = array();
    $valores['existe'] = "0";


    //CONSULTAR
    $query = "SELECT * FROM procedimientos WHERE id_proc = '$id' ";
    $resultados = mysqli_query($conn, $query);

    while ($consulta = mysqli_fetch_array($resultados)) {
        $valores['existe'] = "1";
        $valores['nombre'] = $consulta['nombre_proc'];
        $prueba = $consulta['nombre_proc'];
    }

    //$query = "INSERT INTO prueba(pruebavalor) VALUES ('$valores.nombre')";
    //$resultados = mysqli_query($conn, $query );

    $valores = json_encode($valores);
    echo ($valores);
}