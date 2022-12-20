<?php
session_start();
error_reporting(0);

$validar = $_SESSION['user'];
if ($validar == NULL || $validar = "") {
    header("Location: ../Pantallas/Login.php");
    die();
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../css/alertify.css">
    <link rel="stylesheet" href="../css/themes/default.css">
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="css/buttons.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.18/datatables.min.css">
    <script src="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.18/datatables.min.js"></script>

    <!--font awesome con CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css">



    <!-- Buttons -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.53/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.53/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

    <style>
        #example tfoot input {
            width: 100% !important;
        }

        #example tfoot {
            display: table-header-group !important;
        }

        @media (max-width:3920px) {
            .btn-sq-responsive {
                width: 200px !important;
                max-width: 100% !important;
                max-height: 100% !important;
                height: 200px !important;
                font-size: 24px;
            }
        }

        /* Style for Large Screen */
        @media (max-width:991px) {
            .btn-sq-responsive {
                width: 150px !important;
                max-width: 100% !important;
                max-height: 100% !important;
                height: 150px !important;
                font-size: 18px;
            }
        }

        /* Style for Medium Screen */
        @media (max-width:767px) {
            .btn-sq-responsive {
                width: 100px !important;
                /* whatever width you want for medium screen */
                max-width: 100% !important;
                max-height: 100% !important;
                height: 100px !important;
                /* whatever height you want for medium screen */
                font-size: 12px;
            }
        }

        /* Style for Small Screen */
        @media (max-width:575px) {
            .btn-sq-responsive {
                width: 50px !important;
                /* whatever width you want for mobile screen */
                max-width: 100% !important;
                max-height: 100% !important;
                height: 50px !important;
                /* whatever height you want for mobile screen */
                font-size: 5px;
                padding: 0px;
                font-size: 7px;
            }
        }
    </style>



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
                            <li><a class="dropdown-item" href="../Pantallas/MantenimientoPacientes.php">Mantenimiento pacientes</a></li>
                            <li><a class="dropdown-item" href="../Pantallas/MantenimientoDoctores.php">Mantenimiento doctores</a></li>
                            <li><a class="dropdown-item" href="../Pantallas/MantenimientoProcedimientos.php">Mantenimiento procedimientos</a></li>
                            <li><a class="dropdown-item" href="../Pantallas/MantenimientoAseguradora.php">Mantenimiento aseguradora</a></li>
                            <li><a class="dropdown-item" href="../Pantallas/MantenimientoUsuario.php">Mantenimiento usuario</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Consultas
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../Pantallas/ConsultaPaciente.php">Consulta de pacientes</a></li>
                            <li><a class="dropdown-item" href="../Pantallas/ConsultaDoctores.php">Consulta de doctores</a></li>
                            <li><a class="dropdown-item" href="../Pantallas/ConsultaProcedimientos.php">Consulta de procedimientos</a></li>
                            <li><a class="dropdown-item" href="../Pantallas/ConsultaAseguradora.php">Consulta de aseguradora</a></li>
                            <li><a class="dropdown-item" href="../Pantallas/ConsultaUsuario.php">Consulta de usuarios</a></li>
                            <li><a class="dropdown-item" href="../Pantallas/ConsultaCobertura.php">Consulta de coberturas</a></li>
                            <li><a class="dropdown-item" href="../Pantallas/ConsultaFactura.php">Consulta de facturas</a></li>

                        </ul>
                    </li>
                </ul>
                <form class="d-flex" role="search">


                </form>
            </div>


            <a class="btn btn-outline-success" href="../DATABASE/cerrarSesion.php">Cerrar Sesión</a>


        </div>
    </nav>