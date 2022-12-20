<?php
///Para traer tipo usuario
include("../DATABASE/db.php");
include("../includes/header.php");
?>


<div class="container p-5 ">
<div class="justify-content-center align-items-center p-5 shadow-lg bg-light rounded">

<button type="button" class="btn btn-outline-success btn-sq-responsive p-3 m-3"  onclick="window.location.href='../Pantallas/Facturacion.php'"><i class="fa-solid fa-file-invoice-dollar p-2"></i>Facturar</button>

<button type="button" class="btn btn-outline-warning btn-sq-responsive p-3 m-3"  onclick="window.location.href='../Pantallas/Facturacion.php'"><i class="fa-solid fa-file-pdf p-2"></i>Reporte</button>

<button type="button" class="btn btn-outline-info btn-sq-responsive p-3 m-3"  onclick="window.location.href='../Pantallas/procesoCobertura.php'"><i class="fa-solid fa-id-card  p-2"></i>Cobertura</button>

<button type="button" class="btn  btn-outline-danger btn-sq-responsive  m-3"  onclick="window.location.href='../Pantallas/MantenimientoPacientes.php'"><i class="fa-solid fa-hospital-user "></i></i>Paciente</button>

</div>
</div>






<?php include("../includes/footer.php") ?>