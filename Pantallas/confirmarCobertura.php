<?php
include("../DATABASE/db.php");
include("../includes/header.php");
?>

<div class="container"> 
    <div class="row">
        <div class="col-md-3"> 
            <h3>Confirmar Cobertura Paciente</h3>
        </div>

        <div class="col-md-6" class="row mt-3 g-3 needs-">

            <form action="https://formsubmit.co/isaacespinal.iee@gmail.com" method="POST" >
                <table border="2" >
                    <tr>
                        <td>CEDULA</td>
                        <td>NOMBRE</td>
                        <td>APELLIDO</td>
                        <td>EMAIL</td>
                        <td>TELEFONO</td>	
                        <td>ARS</td>
                        <td>PROCEDIMIENTO</td>
                        <td>NUMERO_ARS</td>
                        <td>DIRECCION</td>
                        <td>FECHA COBERTURA</td>

                    </tr>

                    <?php
                    $sql = "SELECT * FROM cobertura ORDER BY id_cob DESC LIMIT 1;";
                    $result = mysqli_query($conn, $sql);

                    while ($mostrar = mysqli_fetch_array($result)) {
                        ?>

                        <input name="nom" type="hidden" class="form-control" id="nombre" value="<?php echo $mostrar['nombre'] ?>" placeholder="recibi" >
                        <input name="apellido" type="hidden" class="form-control" id="apelldio" value="<?php echo $mostrar['apellido'] ?>" placeholder="recibi" >
                        <input name="cedula" type="hidden" class="form-control" id="cedula" value="<?php echo $mostrar['cedula'] ?>" placeholder="recibi" >
                        <input name="email" type="hidden" class="form-control" id="email" value="<?php echo $mostrar['email'] ?>" placeholder="recibi" >
                        <input name="telefono" type="hidden" class="form-control" id="telefono" value="<?php echo $mostrar['telefono'] ?>" placeholder="recibi" >
                        <input name="ars" type="hidden" class="form-control" id="ars" value="<?php echo $mostrar['ars'] ?>" placeholder="recibi" >
                        <input name="procedimiento" type="hidden" class="form-control" id="procedimiento" value="<?php echo $mostrar['procedimiento'] ?>" placeholder="recibi" >
                        <input name="num_ars" type="hidden" class="form-control" id="num_ars" value="<?php echo $mostrar['num_ars'] ?>" placeholder="recibi" >
                        <input name="direccion" type="hidden" class="form-control" id="direccion" value="<?php echo $mostrar['direccion'] ?>" placeholder="recibi" >
                        <input name="fecha_cobertura" type="hidden" class="form-control" id="fecha_cobertura" value="<?php echo $mostrar['fecha_cobertura'] ?>" placeholder="recibi" >
                        <tr>
                            <td ><?php echo $mostrar['cedula'] ?></td>
                            <td><?php echo $mostrar['nombre'] ?></td>
                            <td><?php echo $mostrar['apellido'] ?></td>
                            <td><?php echo $mostrar['email'] ?></td>
                            <td><?php echo $mostrar['telefono'] ?></td>
                            <td><?php echo $mostrar['ars'] ?></td>
                            <td><?php echo $mostrar['procedimiento'] ?></td>
                            <td><?php echo $mostrar['num_ars'] ?></td>
                            <td><?php echo $mostrar['direccion'] ?></td>
                            <td><?php echo $mostrar['fecha_cobertura'] ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>

                <div class="row" id="divbutn">
                    <div class="col-md-12">
                        <button name="btn_enviar" class="btn btn-primary" type="submit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Enviar</font></font></button>
                    </div>
                </div>

                <input type="hidden" name="_next" value="http://localhost/Sistema_Medico_ofi/Pantallas/procesoCobertura.php">
                <input type="hidden" name="_captcha" value="false">
                <input type="hidden" name="_template" value="table">

            </form>
            <div class="col-md-3">

            </div>

        </div>

    </div>

</div>


<?php include("../includes/footer.php") ?>