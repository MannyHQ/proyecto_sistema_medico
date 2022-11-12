<?php

// consigue el nombre desde el formulario
$cedula = $_REQUEST['cedula'];

// Coneccion a la base de datos

include("db.php"); 

if ($cedula !== "") {
	
	// Se busca el dni y la direccion correspondiente al nombre
	$query = mysqli_query($con, "SELECT * FROM doctores WHERE cedula='$cedula'");

	$row = mysqli_fetch_array($query);
	$dni = $row["dni"];
	$direccion = $row["direccion"];
	$nombre =  $row['nombre'];
    $apellido =  $row['apellido'];
    $cedula =  $row['cedula'];
    $email =  $row['email'];
    $telefono =  $row['telefono'];
    $celular =  $row['celular'];
    $exaquatur =  $row['exaquatur'];
    $direccion =  $row['direccion'];
    $usuario =  $row['usuario'];
    $especialidad =  $row['especialidad'];
    $sexo =  $row['sexo'];
    $horario =  $row['horario'];
    $status =  $row['status'];

}

// lo almacena un un arreglo
$result = array("$dni", "$direccion");('$nombre', '$apellido','$cedula','$email','$telefono','$celular',
        '$exaquatur','$direccion','$usuario','$especialidad','$sexo','$horario','$status')

// lo envia al formulario
$myJSON = json_encode($result);
echo $myJSON;
?>