

<?php include("../includes/header.php") ?>




 <h1 class="container-fluid p-5 text-left " >Registro de Doctores</h1>
<div class="container-sm shadow-lg p-5 mb-5 bg-light  rounded">
<div class="row">
        <?php if (isset($_SESSION['message'])) { ?>
            <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php session_unset();
        } ?>
<form name="formulario" action="../Procesos/procesosDoctores.php" method="POST" class="row g-3 needs-validation was-validated" novalidate="">
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
  <div class="col-md-8">
            <form class="d-flex">
                <form action="" method="GET">
                    <input class="form-control me-2" type="search" placeholder="Buscar" name="busqueda">
                    <button class="btn btn-outline-info" type="submit" name="enviar">Buscar</button>
                </form>
            </form>
</div>

     
            <?php

            $where = "";

            if (isset($_GET['enviar'])) {
                $busqueda = $_GET['busqueda'];


                if (isset($_GET['busqueda'])) {
                    $where = "WHERE usuarios.NOMBRE_USUARIO LIKE'%" . $busqueda . "%' OR TIPO_USUARIO  LIKE'%" . $busqueda . "%'
                OR STATUS LIKE'%" . $busqueda . "%'";
                }
            }

            ?>
            <form action="../Procesos/procesosUsuario.php" method="POST">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>USERNAME</th>
                            <th>CONTRASEÑA</th>
                            <th>TIPO USUARIO</th>
                            <th>NOMBRE</th>
                            <th>APELLIDO</th>
                            <th>HORA ENTRADA</th>
                            <th>ESTADO</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "select * from usuario $where";
                        $result_tasks = mysqli_query($conn, $query);

                        while ($row = mysqli_fetch_array($result_tasks)) { ?>

                            <tr>
                                <td><?php echo $row['username'] ?></td>
                                <td><?php echo $row['password'] ?></td>
                                <td><?php echo $row['tipo_user'] ?></td>
                                <td><?php echo $row['nombre'] ?></td>
                                <td><?php echo $row['apellido'] ?></td>
                                <td><?php echo $row['hora_entrada'] ?></td>
                                <td><?php if ($row['status'] == '1') {
                                        echo "ACTIVO";
                                    } else {
                                        echo "INACTIVO";
                                    }

                                    ?></td>
                                <td>
                                    <a href="editarUsuario.php?ID_USUARIO=<?php echo $row['id_usuario'] ?>" class="btn btn-secondary">
                                        <i class="fas fa-marker"></i>
                                    </a>
                                    <a href="../Procesos/procesosUsuario.php?ID_USUARIO=<?php echo $row['id_usuario'] ?>" class="btn btn-danger">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>

                        <?php } ?>
                    </tbody>
                </table>
            </form>
        </div>
    </div>

</div>