<?php
include("../DATABASE/db.php");

$query = "SELECT * FROM procedimientos";
$result = mysqli_query($conn, $query);
?>



<?php include("../includes/header.php") ?>


<div class="container-fluid p-5">
    <div class="col-md-6 shadow-lg p-5 mb-5 bg-light  rounded">
        <h1 class="p-3 text-left ">Cobertura</h1>

        <form action="../Procesos/registrarCobertura.php" method="post" class="needs-validation">

            <div  class="col-md-4">
                <div class="panel-body">
                    <label for="cedula" class="form-label">Identificacion</label>
                    <input minlength="11"  onblur="buscar_datos();"  name="cedula" type="text" class="form-control" id="cedula"  required>
                </div>                            
            </div>                    

            <div class="col-md-4">      
                <div class="panel-body">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input  name="nombre" type="text" class="form-control" id="nombre" placeholder="" required>
                </div>
            </div>                                                  

            <div class="col-md-4">
                <div class="panel-body">
                    <label for="apellido" class="form-label">Apellidos</label>
                    <input name="apellido" type="text" class="form-control" id="apellido"  placeholder="" required>
                </div>                           
            </div>                              

            <div class="col-md-4">
                <div class="panel-body">
                    <label for="email" class="form-label">Email</label>
                    <input name="email" type="email" class="form-control" id="email" placeholder="" required>
                </div>                            
            </div>                                                  

            <div class="row">
                <div class="col-md-6">
                    <div class="panel-body">
                        <label for="num_telefono" class="form-label">Telefono</label>
                        <input name="num_telefono" type="tel" class="form-control" id="num_telefono" placeholder="" required>
                    </div>                            
                </div>             


                <div class="col-md-4">

                    <label for="ars" class="form-label">ARS</label>
                    <input name="ars" type="text" class="form-control" id="ars" placeholder="">

                </div> 

                <div class="col-md-4">

                    <label for="numars" class="form-label">Numero De Afiliado</label>
                    <input name="numars" type="text" class="form-control" id="numars" placeholder="">

                </div>  

                <div class="col-md-4">

                    <label for="direccion" class="form-label">Direccion</label>
                    <input name="direccion" type="text" class="form-control" id="direccion" placeholder="" required>

                </div>   

                <div class="col-md-4 position-relative">
                    <label for="procedimiento" class="form-label">
                        <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Procedimiento</font>
                        </font>
                    </label>
                    <select name="procedimiento" class="form-select" id="procedimiento" onChange="buscar_precio();" required>
                        <option selected="" disabled="" value="">
                        <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Elegir</font>
                        </font>
                        </option>
                        <?php foreach ($result as $opciones) : ?>
                            <option value="<?php echo $opciones['id_proc'] ?>"><?php echo $opciones['nombre_proc'] ?></option>
                        <?php endforeach ?>
                    </select>
                    <div class="valid-tooltip">
                        <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">
                        </font>
                        </font>
                    </div>
                </div> 

                <div class="col-4">

                    <label for="precio" class="form-label">Precio</label>
                    <input name="precio" type="text" class="form-control" id="precio" placeholder="" required>

                </div>   

                <div class="col-4">

                    <label for="cob_solicitado" class="form-label">Cobertura Solicitada</label>
                    <input name="cob_solicitado" type="text" class="form-control" id="cob_solicitado" placeholder="" required>

                </div>   

                <div class="col-md-4">

                    <label><input type="checkbox" checked id="status" value="first_checkbox"> Status</label><br>

                </div>    

                <div class="row p-4" id="divbutn">
                    <div class="col-md-12">
                        <button name="btn_enviar" class="btn btn-primary" type="submit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Registrar</font></font></button>
                    </div>
                </div>

                <input type="hidden" name="_next" value="http://localhost/consultorio/Mantenimientos/cobertura.php">
                <input type="hidden" name="_captcha" value="false">
                <input type="hidden" name="_template" value="table">

                </form >

                <div class="col-md-3">

                </div>
            </div>

    </div>
</div>

</div>

<script type="text/javascript">

    function buscar_datos() {
        cedula = $("#cedula").val();

        var parametros =
                {
                    "buscar": "1",
                    "cedula": cedula
                };

        $.ajax(
                {
                    data: parametros,
                    dataType: 'json',
                    url: '../Procesos/procesosCobertura.php',
                    type: 'post',
                    beforeSend: function ()
                    {
                        //   alert("Enviando");
                    },
                    error: function ()
                    {
                        //      alert("Error");
                    },
                    complete: function ()
                    {
                        //alert("¡Listo!" + valores.nombre);
                    },
                    success: function (valores)
                    {
                        $("#nombre").val(valores.nombre);
                        $("#apellido").val(valores.apellido);
                        $("#direccion").val(valores.direccion);
                        $("#num_telefono").val(valores.num_telefono);
                        $("#email").val(valores.correo);
                        $("#ars").val(valores.seguro);
                        $("#numars").val(valores.nombre_aseguradora);

                    }
                })
    }

</script>


<script type="text/javascript">

    function buscar_precio() {
        procedimiento = $("#procedimiento").val();

        var parametros =
                {
                    "busca": "1",
                    "procedimiento": procedimiento
                };

        $.ajax(
                {
                    data: parametros,
                    dataType: 'json',
                    url: '../Procesos/procesosCobertura.php',
                    type: 'post',
                    beforeSend: function ()
                    {
                        //  alert("Enviando");
                    },
                    error: function ()
                    {
                        //  alert("Error");
                    },
                    complete: function ()
                    {
                        //    alert("¡Listo!" + valores.nombre);
                    },
                    success: function (valores)
                    {
                        $("#precio").val(valores.precio);
                    }
                })
    }

</script>



<?php include("../includes/footer.php") ?>