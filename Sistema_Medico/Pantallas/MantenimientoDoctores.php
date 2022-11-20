<?php
///Para traer tipo usuario
include("../DATABASE/db.php");

$query = "SELECT * FROM tipo_usuario";
$result = mysqli_query($conn, $query);

?>
<?php include("../includes/header.php") ?>



<div class="container-fluid p-5">

  <div class="row">
    <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php session_unset();
    } ?>
    <div class="col-md-6 shadow-lg p-2 mb-5 bg-light  rounded">
      <h1 class="p-3 text-left ">Mantenimiento de Doctores</h1>
      <div class="p-4">
        <form name="formulario" action="../Procesos/procesosDoctores.php" method="POST" class="row g-3 needs-validation was-validated" novalidate="">
          <!--NOMBRE-->
          <div class="col-md-4 position-relative">
            <label for="validationTooltip01" class="form-label">
              <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">Nombre</font>
              </font>
            </label>
            <input name="nombre" type="text" class="form-control" id="validationTooltip01" minlength="3" maxlength="40" required="">
            <div class="valid-tooltip">
              <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">
                </font>
              </font>
            </div>
          </div>

          <!--CEDULA-->
          <div class="col-md-4 position-relative">
            <label for="validationTooltip02" class="form-label">
              <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">Cedula</font>
              </font>
            </label>
            <input name="cedula" type="text" ondblclick="Doble_Clic(this.value)" class="form-control" id="validationTooltip02" minlength="11" maxlength="13" required="">
            <div class="valid-tooltip">
              <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">
                </font>
              </font>
            </div>
          </div>
          <!--EMAIL-->
          <div class="col-md-4 position-relative">
            <label for="validationTooltip02" class="form-label">
              <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">Email</font>
              </font>
            </label>
            <input name="email" type="text" class="form-control" id="validationTooltip02" required="">
            <div class="valid-tooltip">
              <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">
                </font>
              </font>
            </div>
          </div>
          <!--TELEFONO-->
          <div class="col-md-4 position-relative">
            <label for="validationTooltip02" class="form-label">
              <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">Telefono</font>
              </font>
            </label>
            <input name="telefono" type="text" class="form-control" minlength="3" maxlength="40">
            <div class="valid-tooltip">
              <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">
                </font>
              </font>
            </div>
          </div>
          <!--CELULAR-->
          <div class="col-md-4 position-relative">
            <label for="validationTooltip02" class="form-label">
              <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">Celular</font>
              </font>
            </label>
            <input name="celular" type="text" class="form-control" id="validationTooltip02" minlength="10" maxlength="15" required="">
            <div class="valid-tooltip">
              <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">
                </font>
              </font>
            </div>
          </div>
          <!--EXAQUATUR-->
          <div class="col-md-3 position-relative">
            <label for="" class="form-label">
              <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">Exaquatur</font>
              </font>
            </label>
            <input name="exequatur" type="text" class="form-control" id="exequatur" required="">
            <div class="valid-tooltip">
              <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">
                </font>
              </font>
            </div>
          </div>
          <!--DIRECCION-->
          <div class="col-md-6 position-relative">
            <label for="" class="form-label">
              <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">Direccion</font>
              </font>
            </label>
            <input name="direccion" type="text" class="form-control" id="direccion" required="">
            <div class="valid-tooltip">
              <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">
                </font>
              </font>
            </div>
          </div>
          <!--USUARIO-->
          <div class="col-md-3 position-relative">
            <label for="" class="form-label">
              <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">Usuario</font>
              </font>
            </label>
            <div class="input-group has-validation">
              <span class="input-group-text" id="validationTooltipUsernamePrepend">
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;">@</font>
                </font>
              </span>
              <input name="usuario" type="text" class="form-control" id="usuario" aria-describedby="validationTooltipUsernamePrepend" required="">
              <div class="invalid-tooltip">
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;">
                  </font>
                </font>
              </div>
            </div>
            <!--ESPECIALIDAD-->
          </div>
          <div class="col-md-6 position-relative">
            <label for="" class="form-label">
              <font style="vertical-align: inherit;" with="50">
                <font style="vertical-align: inherit;">Especialidades</font>
              </font>
            </label>
            <textarea name="especialidad" type="text" class="form-control" id="especialidad" required=""></textarea>
            <div class="invalid-tooltip">
              <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">
                </font>
              </font>
            </div>
          </div>
          <!--SEXO-->
          <div class="col-md-3 position-relative">
            <label for="" class="form-label">
              <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">Sexo</font>
              </font>
            </label>
            <select name="sexo" class="form-select" id="sexo" required="">
              <option selected="" disabled="" value="">
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;">Elegir</font>
                </font>
              </option>
              <option>
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;">Masculino</font>
                </font>
              </option>
              <option>
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;">Femenino</font>
                </font>
              </option>
            </select>
            <div class="invalid-tooltip">
              <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">
                </font>
              </font>
            </div>
          </div>
          <!--STATUS-->
          <div class="position-relative">
            <label for="validationTooltip04" class="form-label">
              <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">Status</font>
              </font>
            </label>
            <input class="form-group-input" name='ESTADO' type="checkbox" id="flexCheckDefault">
            <div class="invalid-tooltip">
              <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">
                </font>
              </font>
            </div>
          </div>
          <!--Ver hacer que se puede selecionar horario HORARIO-->
          <div class="col-md-4 position-relative">
            <label for="" class="form-label">
              <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">Horario</font>
              </font>
            </label>
            <select class="form-select" name="horario" aria-label="Default select example">
              <option selected value="7AM - 3PM">7AM - 3PM</option>
              <option value="3PM - 7PM">3PM - 7PM</option>
              <option value="8AM - 12PM">8AM - 12PM</option>
              <option value="2PM - 7PM">2PM - 7PM</option>
            </select>
            <div class="valid-tooltip">
              <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">
                </font>
              </font>
            </div>
          </div>
          <br>
          <div class="form-group">
            <input type="submit" class="btn btn-primary btn-block" name="agregarDoctor" value="Registrar">

            <input type="reset" class="btn btn-primary btn-block" name="cancelarDoctor" value="Cancelar">
          </div>
        </form>
      </div>

    </div>

    <div class="col-md-6 ">
      <form class="d-flex">
        <input class="form-control me-2 light-table-filter" data-table="table_id" type="text" placeholder="Buscar">
      </form>
      </form>
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
        <div class="table-responsive">
          <br>
          <table class="table table-bordered table_id">
            <thead>
              <tr>
                <th>NOMBRE</th>
                <th>SEXO</th>
                <th>DIRECCION</th>
                <th>EXAQUATUR</th>
                <th>CEDULA</th>
                <th>ESPECIALIDADES</th>
                <th>HORARIO</th>
                <th>STATUS</th>
                <th>ACCIONES</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $query = "select * from doctor $where";
              $result_tasks = mysqli_query($conn, $query);

              while ($row = mysqli_fetch_array($result_tasks)) { ?>

                <tr>
                  <td><?php echo $row['nombre'] ?></td>
                  <td><?php echo $row['sexo'] ?></td>
                  <td><?php echo $row['direccion'] ?></td>
                  <td><?php echo $row['exequatur'] ?></td>
                  <td><?php echo $row['cedula'] ?></td>
                  <td><?php echo $row['especialidades'] ?></td>
                  <td><?php echo $row['horario'] ?></td>
                  <td><?php if ($row['status'] == '1') {
                        echo "ACTIVO";
                      } else {
                        echo "INACTIVO";
                      }

                      ?></td>
                  <td>
                    <a href="../Procesos/editarDoctores.php?ID_DOCTOR=<?php echo $row['id_doctor'] ?>" class="btn btn-secondary">
                      <i class="fas fa-marker"></i>
                    </a>
                    
                  </td>
                </tr>

              <?php } ?>
            </tbody>
          </table>
        </div>
      </form>
    </div>
  </div>

</div>

<?php include("../includes/footer.php") ?>