<?php include("../includes/headernull.php") ?>



<div class="col-md-6 shadow-lg p-2 mb-5 bg-light mx-auto   rounded">
    <h2>Login</h2>
    <div class="container-fluid p-5">

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