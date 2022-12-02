<?php
  session_start();
  error_reporting(0);

  $validar = $_SESSION['user'];
  if($validar == NULL || $validar = ""){
    header("Location: ../Pantallas/Login.php");
    die();
  }
  
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Sistema Medico</title>
  </head>
  <body class="p-0 m-2 border-0 bd-example">

    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img src="..\img\Logo.png" alt="Logo" width="30" height="24">
          Consultorio Medico Dr. Pedro Angel Guzman
         </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Procesos
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="../Pantallas/Facturacion.php">Facturacion</a></li>
                  <li><a class="dropdown-item" href="../Pantallas/procesoCobertura.php">Cobertura</a></li>
                  
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Mantenimientos
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="../Pantallas/MantenimientoPacientes.php">Mantenimiento Pacientes</a></li>
                  <li><a class="dropdown-item" href="../Pantallas/MantenimientoDoctores.php">Mantenimiento Doctores</a></li>
                  <li><a class="dropdown-item" href="../Pantallas/MantenimientoProcedimientos.php">Mantenimiento Procedimientos</a></li>
                  <li><a class="dropdown-item" href="../Pantallas/MantenimientoAseguradora.php">Mantenimiento Aseguradora</a></li>
                  <li><a class="dropdown-item" href="../Pantallas/MantenimientoUsuario.php">Mantenimiento Usuario</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Reportes
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Consultas
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>
            </ul>
            <form class="d-flex" role="search">
              
              
            </form>
          </div>
          <button class="btn btn-outline-success" type="submit" ><?php $_SESSION['user'] ?></button>
          <a href="../DATABASE/cerrarSesion.php">Cerrar Sesión</a>
          
        </div>
      </nav>
