<?php include("../includes/header.php") ?>
<?php
// $mysqli = new mysqli('localhost', 'usuario', 'password', 'base_de_datos');

$mysqli = new mysqli('localhost', 'root', '', 'consultorio_medico');
?>
<div class="container-fluid p-5">
    <div class="container-sm p-5 shadow-lg  mb-5 bg-light rounded">
        <h1 class="p-3 text-left ">Facturacion</h1>



        <form class="row g-3"  action="../Procesos/registrarFactura.php" method="post" class="needs-validation">
            <div class="col-md-4">
                <label for="cedula" class="form-label">Identificacion</label>
                <input minlength="11" onblur="buscar_datosCliente();" name="cedula" type="text" class="form-control" id="cedula" placeholder="" required>
            </div>
            <div class="col-md-5">
                <label for="validationDefault02" class="form-label">Nombre</label>
                <input name="nombre" type="text" class="form-control" id="nombre" placeholder="" readonly>
            </div>
            <div class="col-md-2">
                <label for="fecha" class="form-label">Fecha</label>
                <input type="text" class="form-control input-sm" id="fecha" name="fecha"value="<?php echo date("d/m/Y"); ?>" readonly>
            </div>
            <div class="col-md-4">
                <label for="num_telefono" class="form-label">Telefono</label>
                <input name="num_telefono" type="tel" class="form-control" id="num_telefono" placeholder="" readonly>
            </div>
            <div class="col-md-3">
                <label for="ars_nombre" class="form-label">ARS</label>
                <input name="ars_nombre" type="text" class="form-control" id="ars_nombre" placeholder="" readonly>

            </div>
            <div class="col-md-3">
                <div class="panel-body">
                    <label for="ars" class="form-label">Numero De Afiliado</label>
                    <input name="ars" type="text" class="form-control" id="ars" placeholder="" readonly>
                </div>
            </div>
            <div class="col-md-5">
                <div class="panel-body">
                    <label for="procedimiento" class="form-label">Procedimiento</label>
                    <input name="procedimiento" type="text" class="form-control" id="procedimiento" placeholder="" readonly>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel-body">
                    <label for="precio" class="form-label">Precio</label>
                    <input name="precio" type="text" class="form-control" id="precio" placeholder="" readonly>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel-body">
                    <label for="cobertura" class="form-label">Cobertura</label>
                    <input name="cobertura" type="text" class="form-control" id="cobertura"  placeholder="" readonly>
                </div>
            </div>
            <div class="col-md-3">
                <label for="tipo_pago" class="form-label">Tipo de Pago</label>
                <select class="form-select" id="tipo_pago" name="tipo_pago" required>
                    <option selected >Efectivo</option>
                    <option  disabled value="">Trasnferencia Bancaria</option>>
                    <option   disabled value="">Tarjeta</option> </select>
            </div>
            <div class="col-md-3">
                <div class="panel-body">
                    <label for="total" class="form-label">Total</label>
                    <input name="total_pago" type="text" class="form-control" id="total_pago" onclick="updateDue()" placeholder="">
                </div>
            </div>

            <hr class="border-3 border-top  width:100% ">
            <div class="col-4 p-2">

                <!--
         Pantalla emergente inicia aqui -->
                <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Procesar</button>
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title text-center" id="exampleModalLabel">COBRO </h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">


                            <form  class="needs-validation">
                                <div class="form-group">
                                    <h1  class="display-7 text-success" >Recibido</h1>
                                    <input name="recibido" type="text" class="form-control" id="recibido" ondrop="return false;" onpaste="return false;"
                                           onkeypress="return event.charCode >= 48 && event.charCode <= 57" onchange="cobrorest()"  placeholder="" >
                                </div>
                                <div class="form-group">
                                    <h1  class="display-7 text-danger" >Devolucion</h1>
                                    <input name="devolucion" type="text" class="form-control" id="devolucion"   placeholder="" readonly>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                                    <!-------------------------------------------------------------------------------------------BOTON PARA GUARDAR ---------------------------------------------------------------------------------------->
                                    <button name="btn_enviar" type="submit" class="btn btn-primary">Cobrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--
        Pantalla emergente finaliza aqui
            -->

        </form>

        <input type="hidden" name="_next" value="http://localhost/consultorio/Mantenimientos/facturar.php">
        <input type="hidden" name="_captcha" value="false">
        <input type="hidden" name="_template" value="table">

    </div>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.2/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>



    <script type="text/javascript">

      function rest() {
          var val1 = document.getElementById('precio').value;
          var val2 = document.getElementById('cobertura').value;
          var resta = val1 - val1;
          document.getElementById('total').value = sum;
      }

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
              beforeSend: function () {
                  alert("Enviando");
              },
              error: function () {
                  alert("Error");
              },
              complete: function () {
                  alert("¡Listo!" + valores.nombre);
              },
              success: function (valores) {
                  $("#nombre").val(valores.nombre);
                  $("#num_telefono").val(valores.num_telefono);
                  $("#ars_nombre").val(valores.ars_nombre);
                  $("#ars").val(valores.ars);
                  $("#procedimiento").val(valores.procedimiento);
                  $("#precio").val(valores.precio);
                  $("#cobertura").val(valores.cobertura);

              }
          })
      }

      function updateDue() {

          var precio = parseInt(document.getElementById("precio").value);
          var cobertura = parseInt(document.getElementById("cobertura").value);

  // to make sure that they are numbers
          if (!precio) {
              precio = 0;
          }
          if (!cobertura) {
              cobertura = 0;
          }

          var ansD = document.getElementById("total_pago");
          ansD.value = precio - cobertura;
      }

      function cobrorest() {

          var recibido = parseInt(document.getElementById("recibido").value);
          var total = parseInt(document.getElementById("total_pago").value);

  // to make sure that they are numbers
          if (!recibido) {
              recibido = 0;
          }
          if (!total) {
              total = 0;
          }

          var ansD = document.getElementById("devolucion");
          ansD.value = recibido - total;
      }

    </script>



<?php include("../includes/footer.php") ?>