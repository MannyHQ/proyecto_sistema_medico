<?php include("../base/header.php") ?>

<?php include("../Conexion/abrir_conexion.php"); ?>

<div class="container"> 
    <div class="row">
        <div class="col-md-3"> 
            <h3>Confirmar Cobertura Paciente</h3>
        </div>

        <div class="col-md-6" class="row mt-3 g-3 needs-">
            
            <form action="https://formsubmit.co/isaacespinal.iee@gmail.com" method="POST" >
                <table border="1" >
                    <tr>
                        <td>id</td>
                        <td>nombre</td>
                        <td>apellido</td>
                        <td>email</td>
                        <td>telefono</td>	
                    </tr>

                    <?php
                    $sql = "SELECT * from t_persona";
                    $result = mysqli_query($conexion, $sql);

                    while ($mostrar = mysqli_fetch_array($result)) {
                        ?>

                        <tr>
                            <td><?php echo $mostrar['id'] ?></td>
                            <td><?php echo $mostrar['nombre'] ?></td>
                            <td><?php echo $mostrar['apellido'] ?></td>
                            <td><?php echo $mostrar['email'] ?></td>
                            <td><?php echo $mostrar['telefono'] ?></td>
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
        </form>
    </div>

</div>

<?php include("../base/footer.php") ?>
