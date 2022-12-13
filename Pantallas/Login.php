<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Sistema Medico</title>
  </head>
  <body class="img js-fullheight" style="background-image: url(img/DOCTORES.jpg);">




<div class="container-fluid p-5">
    <div class="container-sm p-5 shadow-lg  mb-5 bg-light rounded">
    <center><h2>LOGIN</h2></center>
        <form method="post" action="../Procesos/procesoLogin.php">




            <!-- Usuario input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example1">Usuario </label>
                <input type="text" name='usuario' id="form2Example1" class="form-control" />
            </div>
            <!-- Password input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example2">Contraseña</label>
                <input type="password" name='password' id="form2Example2" class="form-control" />
            </div>

            <input type="hidden" name="acceso" value="acceso_user">
            <!-- Submit button -->
            <input type="submit" name="btnIngresar" class="btn btn-primary btn-block mb-4" value="Ingresar">

        </form>
    </div>
</div>

<?php include("../includes/footer.php") ?>