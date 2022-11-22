<?php include("../includes/header.php") ?>

<div class="container"> 
    <div class="row">
        <div class="col-md-3"> 
            <h3>Cobertura Paciente</h3>
        </div>

        <div class="col-md-6" class="row mt-3 g-3 needs-">

            <form action="../Procesos/registrarCobertura.php" method="post" class="needs-validation">

                <div  class="col-4">
                    <div class="panel-body">
                        <label for="cedula" class="form-label">Identificacion</label>
                        <input minlength="11"  onblur="buscar_datos();"  name="cedula" type="text" class="form-control" id="cedula" placeholder="Numero De Identificacion" required>
                    </div>                            
                </div>                    

                <div class="col-4">      
                    <div class="panel-body">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input  name="nombre" type="text" class="form-control" id="nombre" placeholder="Nombre Completo" required>
                    </div>
                </div>                                                  

                <div class="col-4">
                    <div class="panel-body">
                        <label for="apellido" class="form-label">Apellidos</label>
                        <input name="apellido" type="text" class="form-control" id="apellido"  placeholder="Apellidos" required>
                    </div>                           
                </div>                              

                <div class="col-4">
                    <div class="panel-body">
                        <label for="email" class="form-label">Email</label>
                        <input name="email" type="email" class="form-control" id="email" placeholder="Email" required>
                    </div>                            
                </div>                                                  

                <div class="row">
                    <div class="col-md-6">
                        <div class="panel-body">
                            <label for="num_telefono" class="form-label">Telefono</label>
                            <input name="num_telefono" type="tel" class="form-control" id="num_telefono" placeholder="Numero De Telefono Sin Guiones" required>
                        </div>                            
                    </div>             

                   

                <div class="col-4">
                    <div class="panel-body">
                        <label for="ars" class="form-label">ARS</label>
                        <input name="ars" type="text" class="form-control" id="ars" placeholder="Nombre De ARS">
                    </div>                            
                </div> 

                <div class="col-4">
                    <div class="panel-body">
                        <label for="numars" class="form-label">Numero De Afiliado</label>
                        <input name="numars" type="text" class="form-control" id="numars" placeholder="Numero Afiliado">
                    </div>                            
                </div>  

                <div class="col-4">
                    <div class="panel-body">
                        <label for="direccion" class="form-label">Direccion</label>
                        <input name="direccion" type="text" class="form-control" id="direccion" placeholder="Direccion Completa" required>
                    </div>                            
                </div>   


                <div class="col-md-4">
                    <div class="panel-body">
                        <label><input type="checkbox" id="status" value="first_checkbox"> Status</label><br>
                    </div>                            
                </div>    

                <div class="row" id="divbutn">
                    <div class="col-md-12">
                        <button name="btn_enviar" class="btn btn-primary" type="submit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Registrar</font></font></button>
                        <!--                        <button name="btn_consultar" class="btn btn-primary" type="submit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Consultar</font></font></button>
                                               <button name="btn_cancelar" class="btn btn-primary" type="submit" ><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><a id="btmod" href="Pro_modificar.php" target="_blank">Cancelar</a></font></font></button>-->
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
                        alert("Enviando");
                    },
                    error: function ()
                    {
                        alert("Error");
                    },
                    complete: function ()
                    {
                        alert("¡Listo!"+valores.nombre);
                    },
                    success: function (valores)
                    {
                        $("#nombre").val(valores.nombre);
                        $("#apellido").val(valores.apellido);
                       // $("#sexo").val(valores.sexo);
                        $("#direccion").val(valores.direccion);
                      //  $("#celular").val(valores.celular);
                        $("#num_telefono").val(valores.num_telefono);
                        $("#email").val(valores.correo);
                        $("#ars").val(valores.seguro);
                        $("#numars").val(valores.nombre_aseguradora);

                    }
                })
    }

</script>



<?php include("../includes/footer.php") ?>