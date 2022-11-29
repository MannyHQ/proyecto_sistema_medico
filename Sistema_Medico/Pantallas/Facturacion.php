<?php include("../includes/header.php") ?>
<?php

// $mysqli = new mysqli('localhost', 'usuario', 'password', 'base_de_datos');

$mysqli = new mysqli('localhost', 'root', '', 'consultorio_medico');

?>
<div class="container-fluid p-5">
  <div class="container-sm p-5 shadow-lg  mb-5 bg-light rounded">
    <h1 class="p-3 text-left ">Facturacion</h1>


    <form class="row g-3" action="../Procesos/facturar.php" method="post" class="needs-validation">
      <div class="col-md-4">
        <label for="cedula" class="form-label">Identificacion</label>
        <input minlength="11" onblur="buscar_datosCliente(); buscar_cobertura();" name="cedula" type="text" class="form-control" id="cedula" placeholder="" required>
      </div>
      <div class="col-md-5">
        <label for="validationDefault02" class="form-label">Nombre</label>
        <input name="nombre" type="text" class="form-control" id="nombre" placeholder="" readonly>
      </div>
      <div class="col-md-2">
        <label for="validationDefaultUsername" class="form-label">Fecha</label>
        <input type="text" class="form-control input-sm" id="fecha" value="<?php echo date("d/m/Y"); ?>" readonly>
      </div>
      <div class="col-md-5">
        <label for="num_telefono" class="form-label">Telefono</label>
        <input name="num_telefono" type="tel" class="form-control" id="num_telefono" placeholder="" readonly>
      </div>
      <div class="col-md-3">
        <label for="numars" class="form-label">ARS</label>
        <input name="numars" type="text" class="form-control" id="numars" placeholder="" readonly>

      </div>
      <div class="col-md-3">
        <div class="panel-body">
          <label for="ars" class="form-label">Numero De Afiliado</label>
          <input name="ars" type="text" class="form-control" id="ars" placeholder="" readonly>
        </div>
      </div>
      <hr class="border-3 border-top  width:100% ">
      <div class="col-4 p-2">

        <!--AGREGAR PROCEDIMIENTOS -->
        <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Agregar Procedimiento</button>
      </div>
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-center" id="exampleModalLabel">PROCEDIMIENTO</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label md-4">Selecionar:</label>
                  <select class="form-control">

                    <option value="0"></option>

                    <?php

                    $query = $mysqli->query("SELECT * FROM procedimientos");

                    while ($valores = mysqli_fetch_array($query)) {

                      echo '<option value="' . $valores['id_proc'] . '">' . $valores['nombre_proc'] . '</option>';
                    }
                    ?>

                  </select>

                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary">Listo</button>
              <button type="button" class="btn btn-primary" id="addRow">Add new row</button>
            </div>
          </div>
        </div>
      </div>
      <!--AGREGAR PROCEDIMIENTOS AQUI FINALIZA -->

      <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
            </tr>
        </thead>
      </table>

      <div class="col-12 p-2">
        <button name="btn_enviar" class="btn btn-primary" type="submit">
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">Registrar</font>
          </font>
        </button>
      </div>
      <input type="hidden" name="_next" value="http://localhost/consultorio/Mantenimientos/factura.php">
      <input type="hidden" name="_captcha" value="false">
      <input type="hidden" name="_template" value="table">

    </form>

  </div>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.2/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>

  

  <script type="text/javascript">
    function buscar_datosCliente() {
      cedula = $("#cedula").val();

      var parametros = {
        "buscar": "1",
        "cedula": cedula
      };

      $.ajax({
        data: parametros,
        dataType: 'json',
        url: '../Procesos/procesosFactura.php',
        type: 'post',
        beforeSend: function() {
          alert("Enviando");
        },
        error: function() {
          alert("Error");
        },
        complete: function() {
          alert("¡Listo!" + valores.nombre);
        },
        success: function(valores) {
          $("#nombre").val(valores.nombre);
          $("#direccion").val(valores.direccion);
          $("#num_telefono").val(valores.num_telefono);
          $("#ars").val(valores.seguro);
          $("#numars").val(valores.nombre_aseguradora);

        }
      })
    }

    

    function buscar_cobertura() {
      cedula = $("#cedula").val();

      var parametros = {
        "buscar": "1",
        "cedula": cedula
      };

      $.ajax({
        data: parametros,
        dataType: 'json',
        url: '../Procesos/procesosFactura.php',
        type: 'post',
        beforeSend: function() {
          alert("Enviando");
        },
        error: function() {
          alert("Error");
        },
        complete: function() {
          alert("¡Listo!" + valores.nombre);
        },
        success: function(valores) {
          $("#nombre").val(valores.nombre);
          $("#direccion").val(valores.direccion);
          $("#num_telefono").val(valores.num_telefono);
          $("#ars").val(valores.seguro);
          $("#numars").val(valores.nombre_aseguradora);

        }
      })
    }
  </script>



  <?php include("../includes/footer.php") ?>