<?php

include("../DATABASE/db.php");
//Codigo para agregar
if (isset($_POST['agregarProcedimiento'])) {
    $id = $_POST["id_proc"];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    if (isset($_POST['ESTADO']) == '1') {
        $ESTADO = TRUE;
    } else {
        $ESTADO = FALSE;
    }



    $query = "INSERT INTO procedimientos(id_proc,nombre_proc, descripcion, precio_proc, status ) VALUES ('$id','$nombre', '$descripcion','$precio','$ESTADO')";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Querry Failed");
    }

    $_SESSION['message'] = 'Usuario guardado exitosamente';
    $_SESSION['message_type'] = 'success';

    header("Location: ../Pantallas/MantenimientoProcedimientos.php");
}

//Codigo para editar en la base de datos
if (isset($_POST['actualizarProcedimiento'])) {
    $ID = $_POST['id_proc'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    if (isset($_POST['ESTADO']) == '1') {
        $ESTADO = TRUE;
    } else {
        $ESTADO = FALSE;
    }


    $query = "UPDATE procedimientos set nombre_proc = '$nombre', descripcion = '$descripcion', STATUS = '$ESTADO', precio_proc = '$precio'
           where ID_proc = $ID";
    mysqli_query($conn, $query);

    $_SESSION['message'] = 'Usuario actualizado satisfactoriamente';
    $_SESSION['message_type'] = 'info';

    header("Location: ../Pantallas/MantenimientoProcedimientos.php");
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
