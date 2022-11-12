

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Mantenimientos  Doctores</title>
  </head>
  <body class="p-0 m-2 border-0 bd-example">

    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img src=".\img\Logo.png" alt="Logo" width="30" height="24">
          Consultorio Medico Dr. Pedro Angel Guzman
         </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Procesos
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Registro de consulta</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Mantenimientos
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Mantenimiento Pacientes</a></li>
                  <li><a class="dropdown-item" href="#">Mantenimiento Doctores</a></li>
                  <li><a class="dropdown-item" href="#">Mantenimiento Usuario</a></li>
                  <li><a class="dropdown-item" href="#">Mantenimiento Pago</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Reportes
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Consultas
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>
            </ul>
            <form class="d-flex" role="search">
              
              
            </form>
          </div>
          <button class="btn btn-outline-success" type="submit">Usuario</button>
        </div>
      </nav>



    <!-- ******************FORMULARIO****************** -->
    <h1 class="container-fluid p-5 text-center " >Registro de Doctores</h1>
    <div class="container-sm shadow-lg p-5 mb-5 bg-light  rounded">
    <form action="insertar.php" method="POST" class="row g-3 needs-validation was-validated" novalidate="">

    <!--NOMBRE-->
      <div class="col-md-4 position-relative">
        <label for="validationTooltip01" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nombre</font></font></label>
        <input  name="nombre" type="text" class="form-control" id="validationTooltip01"  minlength="3" maxlength="40" required="">
        <div class="valid-tooltip"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
        </font></font></div>
      </div>
    <!--APELLIDO-->
      <div class="col-md-4 position-relative">
        <label for="validationTooltip02" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Apellido</font></font></label>
        <input  name="apellido" type="text" class="form-control" id="validationTooltip02"minlength="3" maxlength="40" required="">
        <div class="valid-tooltip"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
        </font></font></div>
      </div>
    <!--CEDULA-->
      <div class="col-md-4 position-relative">
        <label for="validationTooltip02" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Cedula</font></font></label>
        <input  name="cedula" type="text" ondblclick="Doble_Clic(this.value)" class="form-control" id="validationTooltip02" minlength="11" maxlength="13" required="">
        <div class="valid-tooltip"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
        </font></font></div>
      </div>
    <!--EMAIL-->
      <div class="col-md-4 position-relative">
        <label for="validationTooltip02" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Email</font></font></label>
        <input name="email" type="text" class="form-control" id="validationTooltip02"  required="">
        <div class="valid-tooltip"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
        </font></font></div></div>
    <!--TELEFONO-->
        <div class="col-md-4 position-relative">
          <label for="validationTooltip02" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Telefono</font></font></label>
          <input name="telefono" type="text" class="form-control" minlength="3" maxlength="40" >
          <div class="valid-tooltip"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
          </font></font></div>
        </div>
    <!--CELULAR-->
        <div class="col-md-4 position-relative">
          <label for="validationTooltip02" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Celular</font></font></label>
          <input name="celular" type="text" class="form-control" id="validationTooltip02" minlength="10" maxlength="15" required="">
          <div class="valid-tooltip"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
          </font></font></div>
        </div>
    <!--EXAQUATUR-->
        <div class="col-md-3 position-relative">
          <label for="validationTooltip02" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Exaquatur</font></font></label>
          <input name="exaquatur" type="text" class="form-control" id="validationTooltip02"  required="">
          <div class="valid-tooltip"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> 
          </font></font></div>
        </div>
    <!--DIRECCION-->
        <div class="col-md-6 position-relative">
          <label for="validationTooltip02" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Direccion</font></font></label>
          <input name="direccion" type="text" class="form-control" id="validationTooltip02"  required="">
          <div class="valid-tooltip"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
          </font></font></div>
        </div>
    <!--USUARIO-->
      <div class="col-md-3 position-relative">
        <label for="validationTooltipUsername" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Usuario</font></font></label>
        <div class="input-group has-validation">
          <span class="input-group-text" id="validationTooltipUsernamePrepend"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">@</font></font></span>
          <input name="usuario" type="text" class="form-control" id="validationTooltipUsername" aria-describedby="validationTooltipUsernamePrepend" required="">
          <div class="invalid-tooltip"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
          </font></font></div>
        </div>
    <!--ESPECIALIDAD-->
      </div>
      <div class="col-md-6 position-relative">
        <label for="validationTooltip03" class="form-label"><font style="vertical-align: inherit;" with="50"><font style="vertical-align: inherit;">Especialidades</font></font></label>
        <textarea name="especialidad" type="text" class="form-control" id="validationTooltip03" required=""></textarea>
        <div class="invalid-tooltip"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">   
        </font></font></div>
      </div>
    <!--SEXO-->
      <div class="col-md-3 position-relative">
        <label for="validationTooltip04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Sexo</font></font></label>
        <select name="sexo" class="form-select" id="validationTooltip04" required="">
          <option selected="" disabled="" value=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir</font></font></option>
          <option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Masculino</font></font></option>
          <option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Femenino</font></font></option>
        </select>
        <div class="invalid-tooltip"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
        </font></font></div>
      </div>
    <!--STATUS-->
      <div class="col-md-3 position-relative">
        <label for="validationTooltip04" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Status</font></font></label>
        <select name="status" class="form-select" id="validationTooltip04" required="">
          <option selected="" disabled="" value=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Elegir</font></font></option>
          <option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Activo</font></font></option>
          <option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Inactivo</font></font></option>
        </select>
        <div class="invalid-tooltip"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
        </font></font></div>
      </div>
    <!--HORARIO-->
      <div class="col-md-2 position-relative">
        <label for="validationTooltip02" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Horario</font></font></label>
        <input name="horario" type="text" class="form-control" id="validationTooltip02"  required="">
        <div class="valid-tooltip"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
        </font></font></div>
      </div>

      <!--****************BOTONES***************-->
      <div class="col-12">
        <button name="btn_registrar" class="btn btn-primary" type="submit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Registrar</font></font></button>
        <button name="btn_eliminar" class="btn btn-primary" type="submit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Eliminar</font></font></button>
        <button class="btn btn-primary" type="submit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Cancelar</font></font></button>
      </div>
    </form>
    </div>

  <!--  
  <script>

    function Doble_Clic(str) {
      if (str.length == 0) {
        document.getElementById("nombre").value = "";
        document.getElementById("apellido").value = "";
         document.getElementById("email").value = "";
          document.getElementById("telefono").value = "";
           document.getElementById("celular").value = "";
            document.getElementById("apellido").value = "";
        return;
      }
      else {

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function ()
                {

          if (this.readyState == 4 && this.status == 200)
                    {
          var myObj = JSON.parse(this.responseText);
          document.getElementById
          ("dni").value = myObj[0];
                document.getElementById(
          "direccion").value = myObj[1];
          }
        };
        xmlhttp.open("GET", "busca_dni_dir.php?search_cliente=" + str, true);
        xmlhttp.send();
      }
    }
  </script>      
-->
  </body>
</html>