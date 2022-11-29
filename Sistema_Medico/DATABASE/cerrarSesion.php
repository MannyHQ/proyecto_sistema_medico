<?php
session_start();
session_destroy();
header("Location: ../Pantallas/Login.php");
?>