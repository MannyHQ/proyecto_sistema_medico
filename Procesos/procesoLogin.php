<?php

include("../DATABASE/db.php");

if(isset($_POST['btnIngresar'])){
    $user = $_POST['usuario'];
    $password = $_POST['password'];
    session_start();
    $_SESSION['user'] = $user;
    
    $query = "SELECT * FROM usuario where username = '$user' and password='$password' ";
    $result = mysqli_query($conn, $query);
    $filas = mysqli_num_rows($result);
    
    if($filas){
        header("Location: ../Pantallas/MantenimientoDoctores.php");
    }else{
        
        header("Location: ../Pantallas/Login.php");
        session_destroy();
    }

}


?>

