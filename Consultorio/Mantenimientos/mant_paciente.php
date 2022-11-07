<?php include("../base/header.php") ?>

<div class="container">
<!--
    <div class="cargando row">       
        <div class="d-flex justify-content-center">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Cargando...</span>
            </div>
        </div>
    </div>-->

    <div class="row">
        <div class="col-md-3"> 
            <h3>Registro Paciente</h3>
        </div>

        <div class="col-md-6" class="row mt-3 g-3 needs-">

            <form action="registro.php" method="post" class="needs-validation">

                <div class="col-4">      
                    <div class="panel-body">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input  name="nombre" type="text" class="form-control" id="nombre" placeholder="Nombre Completo" required>
                    </div>
                </div>                                                  

                <div class="col-4">
                    <div class="panel-body">
                        <label for="apellido" class="form-label">Apellidos</label>
                        <input name="apellido" type="text" class="form-control" id="apellidp"  placeholder="Apellidos" required>
                    </div>                           
                </div>

                <div class="col-4">
                    <div class="panel-body">
                        <label for="cedula" class="form-label">Identificacion</label>
                        <input minlength="11" onblur="buscar_datos();"  name="cedula" type="text" class="form-control" id="cedula" placeholder="Numero De Identificacion" required>
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
                        <input name="ars" type="text" class="form-control" id="ars" placeholder="Aseguradora">
                    </div>                            
                </div> 

                <div class="col-4">
                    <div class="panel-body">
                        <label for="numars" class="form-label">Numero De Afiliado</label>
                        <input name="numars" type="text" class="form-control" id="numars" placeholder="Numero Afiliado">
                    </div>                            
                </div>  

                <div class="col-12">
                    <div class="panel-body">
                        <label for="direccion" class="form-label">Direccion</label>
                        <input name="direccion" type="text" class="form-control" id="direccion" placeholder="Direccion Completa" required>
                    </div>                            
                </div>                                                  

                <div class="row">

                    <div class="col-md-4">
                        <div class="panel-body">
                            <label for="sexo" class="form-label">Sexo</label>
                            <select name="sexo"  id="sexo" class="form-control"  required>
                                <option>Elegir</option>
                                <option>Masculino</option>
                                <option>Femenino</option>
                                <option>Otro</option>
                            </select>
                        </div>                            
                    </div>  


                    <div class="col-md-4">
                        <div class="panel-body">
                            <label for="tiposangre" class="form-label">Tipo De Sangre</label>
                            <input name="tiposangre" type="text" id="tiposangre" class="form-control"  required>
                        </div>                            
                    </div>  

                    <div class="col-md-4">
                        <div class="panel-body">
                            <label for="fechana" class="form-label">Fecha Nacimiento</label>
                            <input name="fechana" type="date" id="fechana" class="form-control" min="1900-31-12" max="3000-31-12" required>
                        </div>                            
                    </div>    

                    <div class="col-md-4">
                        <div class="panel-body">
                           <label><input type="checkbox" id="status" value="first_checkbox"> Status</label><br>
                        </div>                            
                    </div>    

                </div>

                <div class="row" id="divbutn">
                    <div class="col-md-12">
                        <button name="btn_registrar" class="btn btn-primary" type="submit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Registrar</font></font></button>
                        <button name="btn_eliminar" class="btn btn-primary" type="submit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Eliminar</font></font></button>
                        <button name="btn_modificar" class="btn btn-primary" type="submit" ><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><a id="btmod" href="Pro_modificar.php" target="_blank">Modificar</a></font></font></button>
                    </div>
                </div>
            </form>
            <div class="col-md-3">

            </div>


        </div>
       
    </div>

</div>

<?php include("../base/footer.php") ?>



<!--<script type="text/javascript">

    $(document).ready(function () {
        $('.cargando').hide(); //ocultar
    });

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
                    url: 'codigos_php.php',
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
                    }
                })
    }

</script>-->