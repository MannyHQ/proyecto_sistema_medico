<!DOCTYPE html>

<html lang="es">
    <head>

        <meta charset="UTF-8"><!-- ETIQUETA PARA VALIDAR CARACTERES -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Proyecto</title>

        <link href="css/bootstrap.min.css" rel="stylesheet"><!-- Direccion de archivo css -->
        <link href="css/estilo.css" rel="stylesheet"><!-- Direccion de archivo css -->  

    </head>

    <body>
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <button type="button" class="navbar-toggle collapsed "  data-toggle="collapse"  data-target="#navbar"  aria-expanded="false" aria-control="navbar">
                        <span class="sr-only"> Este boton despliega la barra de navegacion</span> 
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    
                    <h2 class="navbar-brand">Consultorio Medico Dr. Pedro Angel Guzman</h2>
                    
                </div>

                <div class="navbar-collapse collapse" id="navbar" >

                    <div class="btn-group"  >
                        <button type="button" class="btn btn-default dropdown-toggle"  data-toggle="dropdown" id="butlis"> Procesos <span class="caret"></span></button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Acción #1</a></li>
                            <li><a href="#">Acción #2</a></li>
                            <li><a href="#">Acción #3</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Acción #4</a></li>
                        </ul>
                    </div>

                    <div class="btn-group"  >
                        <button type="button" class="btn btn-default dropdown-toggle"  data-toggle="dropdown" id="butlis"> Mantenimiento <span class="caret"></span></button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">repe #1</a></li>
                            <li><a href="#">Acción #2</a></li>
                            <li><a href="#">Acción #3</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Acción #4</a></li>
                        </ul>
                    </div>

                    <div class="btn-group"  >
                        <button type="button" class="btn btn-default dropdown-toggle"  data-toggle="dropdown" id="butlis"> Reportes <span class="caret"></span></button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Acción #1</a></li>
                            <li><a href="#">Acción #2</a></li>
                            <li><a href="#">Acción #3</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Acción #4</a></li>
                        </ul>
                    </div>

                    <div class="btn-group"  >
                        <button type="button" class="btn btn-default dropdown-toggle"  data-toggle="dropdown" id="butlis"> Consultas <span class="caret"></span></button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Acción #1</a></li>
                            <li><a href="#">Acción #2</a></li>
                            <li><a href="#">Acción #3</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Acción #4</a></li>
                        </ul>
                    </div>

                </div>

            </div>

        </nav>

        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h3>Registro Paciente</h3>
                </div>

                <div class="col-md-6">

                    <form method="post">
                        <div class="row">
                            <div class="col-sm-12">                         
                                <div class="panel-heading">  
                                </div>
                                <div class="panel-body" >
                                    <input  name="nombre" type="text" class="form-control" placeholder="Nombre">
                                </div>                                                        
                            </div>                                                  
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel-heading">  
                                </div>
                                <div class="panel-body">
                                    <input name="apellido" type="text" class="form-control" placeholder="Apellido">
                                </div>                           
                            </div>                                                  
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel-heading">  
                                </div>
                                <div class="panel-body">
                                    <input name="cedula" type="text" class="form-control" placeholder="Cedula">
                                </div>                            
                            </div>                                                  
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel-heading">  
                                </div>
                                <div class="panel-body">
                                    <input name="email" type="email" class="form-control" placeholder="Email">
                                </div>                            
                            </div>                                                  
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel-heading">  
                                </div>
                                <div class="panel-body">
                                    <input name="telefono" type="tel" class="form-control" placeholder="Numero Telefono">
                                </div>                            
                            </div>                                                  
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel-heading">  
                                </div>
                                <div class="panel-body">
                                    <input name="celular" type="tel" class="form-control" placeholder="Numero Celular">
                                </div>                            
                            </div>                                                  
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="panel-heading">  
                                </div>
                                <div class="panel-body">
                                    <input name="ars" type="text" class="form-control" placeholder="Aseguradora">
                                </div>                            
                            </div> 
                            <div class="col-md-6">
                                <div class="panel-heading">  
                                </div>
                                <div class="panel-body">
                                    <input name="numars" type="text" class="form-control" placeholder="Numero Afiliado">
                                </div>                            
                            </div>  
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel-heading">  
                                </div>
                                <div class="panel-body">
                                    <input name="direccion" type="text" class="form-control" placeholder="Direccion">
                                </div>                            
                            </div>                                                  
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="panel-heading">  
                                </div>
                                <div class="panel-body">
                                    <input name="sexo" type="text" class="form-control" placeholder="Sexo">
                                </div>                            
                            </div> 
                            <div class="col-md-6">
                                <div class="panel-heading">  
                                </div>
                                <div class="panel-body">
                                    <input name="fecha" type="text" class="form-control" placeholder="Fecha Nacimiento">
                                </div>                            
                            </div>     
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button name="btn_registrar" class="btn btn-primary" type="submit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Registrar</font></font></button>
                                <button name="btn_modificar" class="btn btn-primary" type="submit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Modificar</font></font></button>
                                <button name="btn_cancelar" class="btn btn-primary" type="submit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Cancelar</font></font></button>
                            </div>
                        </div>
                    </form>
                    <div class="col-md-3">

                    </div>

                </div>
            </div>
        </div>
        <script src="js/jquery.min.js"></script>   
        <script src="js/bootstrap.min.js"></script> 

      <!--      <php
            include ("registro.php");
            ?> -->


    </body>


</html>