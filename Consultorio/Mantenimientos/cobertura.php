<?php include("../base/header.php") ?>

<div class="container"> 
    <div class="row">
        <div class="col-md-3"> 
            <h3>Cobertura Paciente</h3>
        </div>

        <div class="col-md-6" class="row mt-3 g-3 needs-">
            <form action="https://formsubmit.co/isaacespinal.iee@gmail.com" method="POST" >
                <form action="../Procesos/registrar_cobertura.php" method="post" class="needs-validation">

                    <div  class="col-4">
                        <div class="panel-body">
                            <label for="cedula" class="form-label">Identificacion</label>
                            <input minlength="11"  onblur="buscar_datos();" name="cedula" type="text" class="form-control" id="cedula" placeholder="Numero De Identificacion" required>
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
                                <label for="telefono" class="form-label">Telefono</label>
                                <input name="telefono" type="tel" class="form-control" id="telefono" placeholder="Numero De Telefono Sin Guiones" required>
                            </div>                            
                        </div>             

                        <div class="col-md-6">
                            <div class="panel-body">
                                <label for="celular" class="form-label">Celular</label>
                                <input name="celular" type="tel" class="form-control" id="celular" placeholder="Numero De Celular Sin Guiones">
                            </div>                            
                        </div>              
                    </div>

                    <div class="col-4">
                        <div class="panel-body">
                            <label for="ars" class="form-label">ARS</label>
                            <input name="ars" type="text" class="form-control" id="celular" placeholder="Nombre De Ars">
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
                            <button name="btn_enviar" class="btn btn-primary" type="submit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Enviar</font></font></button>
                            <button name="btn_consultar" class="btn btn-primary" type="submit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Consultar</font></font></button>
                            <button name="btn_cancelar" class="btn btn-primary" type="submit" ><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><a id="btmod" href="Pro_modificar.php" target="_blank">Cancelar</a></font></font></button>
                        </div>
                    </div>

                    <input type="hidden" name="_next" value="http://localhost/consultorio/Mantenimientos/cobertura.php">
                    <input type="hidden" name="_captcha" value="false">
                    <input type="hidden" name="_template" value="table">

                </form >
            </form>
            <div class="col-md-3">

            </div>


        </div>
    </div>

</div>

<?php include("../base/footer.php") ?>

<!--
<script type="text/javascript">

//    $(document).ready(function () {
//        $('.cargando').hide(); //ocultar
//    });

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
                    url: 'codigo_cobertura.php',
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
                        alert("¡Listo!");
                    },
                    success: function (valores)
                    {
                        $("#nombre").val(valores.nombre);
                        $("#apellido").val(valores.apellido);
                        $("#direccion").val(valores.direccion);

                    }
                })
    }

</script>-->