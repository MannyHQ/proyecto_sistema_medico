<?php include("../base/header.php") ?>

<?php include("../Conexion/abrir_conexion.php"); ?>

<?php include("../Procesos/registrar_cobertura.php"); ?>

<div class="container"> 
    <div class="row">
        <div class="col-md-3"> 
            <h3>Confirmar Cobertura Paciente</h3>
        </div>

        <div class="col-md-6" class="row mt-3 g-3 needs-">

            <form action="https://formsubmit.co/isaacespinal.iee@gmail.com" method="POST" >
                <table border="1" >
                    <tr>
                        <td>CEDULA</td>
                        <td>NOMBRE</td>
                        <td>APELLIDO</td>
                        <td>EMAIL</td>
                        <td>TELEFONO</td>	
                        <td>CELULAR</td>
                        <td>ARS</td>
                        <td>NUMERO_ARS</td>
                        <td>DIRECCION</td>

                    </tr>

                    <?php
                    $sql = "SELECT * FROM cobertura ORDER BY id_cob DESC LIMIT 1;";
                    $result = mysqli_query($conex, $sql);

                    while ($mostrar = mysqli_fetch_array($result)) {
                        ?>
                    
                    <input name="nom" type="text" class="form-control" id="direccion" value="<?php echo $mostrar['nombre']  ?>" placeholder="recibi" >
                        <tr>
                            <td ><?php echo $mostrar['cedula'] ?></td>
                            <td><?php echo $mostrar['nombre'] ?></td>
                            <td><?php echo $mostrar['apellido'] ?></td>
                            <td><?php echo $mostrar['email'] ?></td>
                            <td><?php echo $mostrar['telefono'] ?></td>
                            <td><?php echo $mostrar['celular'] ?></td>
                            <td><?php echo $mostrar['ars'] ?></td>
                            <td><?php echo $mostrar['num_ars'] ?></td>
                            <td><?php echo $mostrar['direccion'] ?></td>
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

                <input type="hidden" name="_next" value="http://localhost/consultorio/Mantenimientos/cobertura.php">
                <input type="hidden" name="_captcha" value="false">
                <input type="hidden" name="_template" value="table">

            </form>
            <div class="col-md-3">

            </div>

        </div>

    </div>

</div>

<?php include("../base/footer.php") ?>
