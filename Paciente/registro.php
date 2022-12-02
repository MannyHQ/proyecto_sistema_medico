<?php

include("con_bd.php");

if (isset($_POST['btn_registar'])) {

    if (strlen($_POST['nombre']) < 1) {
        
        $nombre = trim($_POST['nombre']);
        
        $consulta = "INSERT INTO paciente(nombre)  VALUES ('$nombre')";
        
        $resultado = mysqli_query($conex,$consulta);

    }
}


//    if (strlen($_POST['nombre']) < 1 &&
//            strlen($_POST['apellido']) < 1 &&
//            strlen($_POST['cedula']) < 1 &&
//            strlen($_POST['email']) < 1 &&
//            strlen($_POST['telefono']) < 1 &&
//            strlen($_POST['celular']) < 1 &&
//            strlen($_POST['ars']) < 1 &&
//            strlen($_POST['numars']) < 1 &&
//            strlen($_POST['direccion']) < 1 &&
//            strlen($_POST['sexo']) < 1 &&
//            strlen($_POST['fecha']) < 1) 