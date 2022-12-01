<?php
include("../DATABASE/db.php");
include("../includes/header.php");
?>
<link rel="stylesheet" type="text/css" media="screen" href="../css/estilo.css"/>

<div class="container"> 
    <div class="row">
        <div class="col-md-3"> 
            <h3>Confirmar Cobertura Paciente</h3>
        </div>

        <div class="col-md-6" class="row mt-3 g-3 needs-">

            <form action="https://formsubmit.co/isaacespinal.iee@gmail.com" method="POST" >
                <table border="2" align="center" id="tbl">
                    <tr>
                        <th id="thc">CEDULA</th>
                        <th id="thc">NOMBRE</th>
                        <th id="thc">APELLIDO</th>
                        <th id="thc">EMAIL</th>
                        <th id="thc">TELEFONO</th>	
                        <th id="thc">NUMERO_ARS</th>
                        <th id="thc">ARS</th>
                        <th id="thc">DIRECCION</th>
                        <th id="thc">PROCEDIMIENTO</th>
                        <th id="thc">PRECIO</th>
                        <th id="thc">COB_SOLICITADA</th>
                        <th id="thc">#_AUTORIZACION</th>

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
                        <input name="num_ars" type="hidden" class="form-control" id="num_ars" value="<?php echo $mostrar['num_ars'] ?>" placeholder="recibi" >
                        <input name="procedimiento" type="hidden" class="form-control" id="procedimiento" value="<?php echo $mostrar['procedimiento'] ?>" placeholder="recibi" >
                        <input name="precio" type="hidden" class="form-control" id="precio" value="<?php echo $mostrar['precio'] ?>" placeholder="recibi" >
                        <input name="cob_solicitado" type="hidden" class="form-control" id="cob_solicitado" value="<?php echo $mostrar['cob_solicitado'] ?>" placeholder="recibi" >
                        <input name="num_autorizacion" type="hidden" class="form-control" id="num_autorizacion" value="<?php echo $mostrar['num_autorizacion'] ?>" placeholder="recibi" >

                        <tr>
                            <td id="tdc"><?php echo $mostrar['cedula'] ?></td>
                            <td id="tdc"><?php echo $mostrar['nombre'] ?></td>
                            <td id="tdc"><?php echo $mostrar['apellido'] ?></td>
                            <td id="tdc"><?php echo $mostrar['email'] ?></td>
                            <td id="tdc"><?php echo $mostrar['telefono'] ?></td>
                            <td id="tdc"><?php echo $mostrar['ars'] ?></td>
                            <td id="tdc"><?php echo $mostrar['num_ars'] ?></td>
                            <td id="tdc"><?php echo $mostrar['direccion'] ?></td>
                            <td id="tdc"><?php echo $mostrar['procedimiento'] ?></td>
                            <td id="tdc"><?php echo $mostrar['precio'] ?></td>
                            <td id="tdc"><?php echo $mostrar['cob_solicitado'] ?></td>
                            <td id="tdc"><?php echo $mostrar['num_autorizacion'] ?></td>
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

                <input type="hidden" name="_next" value="http://localhost/Sistema_Medico/Pantallas/procesoCobertura.php">
                <input type="hidden" name="_captcha" value="false">
                <input type="hidden" name="_template" value="table">

            </form>

            <div class="col-md-3">

            </div>

        </div>

    </div>

</div>


<?php include("../includes/footer.php") ?>