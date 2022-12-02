<?php
///Para traer tipo usuario
include("../DATABASE/db.php");
?>

<?php include("../includes/header.php") ?>

<div class="container-fluid p-5">
    <div class="row">
        <?php if (isset($_SESSION['message'])) { ?>
            <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
            session_unset();
        }
        ?>

        <div class="col-md-6 shadow-lg p-2 mb-5 bg-light  rounded">
            <h1 class="p-3 text-left ">Mantenimiento Procedimientos</h1>
            <div class="p-4">
                <form name="formulario" action="../Procesos/procesosProcedimientos.php" method="POST" class="row g-3 needs-validation was-validated" >

                    <!--NOMBRE-->

                    <div class="col-md-4 position-relative">
                        <label for="nombre_proc" class="form-label">
                            <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Nombre Procedimiento</font>
                            </font>
                        </label>
                        <input name="nombre" type="text" class="form-control" id="nombre" minlength="3" maxlength="40" required>
                        <div class="valid-tooltip">
                            <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                            </font>
                            </font>
                        </div>
                    </div>

                    <!--DESCRIPCION DEL PROCEDIMIENTO-->

                    <div class="col-md-8 position-relative">
                        <label for="" class="form-label">
                            <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Descripcion del procedimiento</font>
                            </font>
                        </label>
                        <input name="descripcion" type="text" class="form-control" id="descripcion" minlength="6" maxlength="50" required>
                        <div class="valid-tooltip">
                            <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                            </font>
                            </font>
                        </div>
                    </div>

                    <!--PRECO-->

                    <div class="col-md-2 position-relative">
                        <label for="" class="form-label">
                            <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Precio</font>
                            </font>
                        </label>
                        <input name="precio" type="number" class="form-control" id="precio"  minlength="3" maxlength="40" required>
                        <div class="valid-tooltip">
                            <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                            </font>
                            </font>
                        </div>
                    </div>

                    <!--onchange="monedaChange ();"-->
                    <!--STATUS-->

                    <div class="position-relative">
                        <label for="" class="form-label">
                            <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Status</font>
                            </font>
                        </label>
                        <input class="form-group-input" checked name='ESTADO' type="checkbox" id="ESTADO">
                        <div class="invalid-tooltip">
                            <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">
                            </font>
                            </font>
                        </div>
                    </div>

                    <br>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-block" name="agregarProcedimiento" value="Registrar">

                        <input type="reset" class="btn btn-primary btn-block" name="cancelarUsuario" value="Cancelar">
                    </div>
                </form>
            </div>

        </div>

        <div class="col-md-6 ">
            <form class="d-flex">
                <input class="form-control me-2 light-table-filter" data-table="table_id" type="text" placeholder="Buscar">
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
            <div class="table-responsive">
                <br>
                <table class="table table-bordered table_id">
                    <thead>
                        <tr>
                            <th>NOMBRE</th>
                            <th>DESCRIPCION</th>
                            <th>PRECIO</th>
                            <th>ESTADO</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "select * from procedimientos $where";
                        $result_tasks = mysqli_query($conn, $query);

                        while ($row = mysqli_fetch_array($result_tasks)) {
                            ?>

                            <tr>
                                <td><?php echo $row['nombre_proc'] ?></td>
                                <td><?php echo $row['descripcion'] ?></td>
                                <td><?php echo $row['precio_proc'] ?></td>
                                <td><?php
                                    if ($row['status'] == '1') {
                                        echo "ACTIVO";
                                    } else {
                                        echo "INACTIVO";
                                    }
                                    ?></td>
                                <td>
                                    <a href="../Procesos/editarProcedimientos.php?id_proc=<?php echo $row['id_proc'] ?>" class="btn btn-secondary">
                                        <i class="fas fa-marker"></i>
                                    </a>

                                </td>
                            </tr>

                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>

    function monedaChange(cif = 3, dec = 2) {
        // tomamos el valor que tiene el input
        let inputNum = document.getElementById('precio').value
        // Lo convertimos en texto
        inputNum = inputNum.toString()
        // separamos en un array los valores antes y después del punto
        inputNum = inputNum.split('.')
        // evaluamos si existen decimales
        if (!inputNum[1]) {
            inputNum[1] = '00'
        }

        let separados
        // se calcula la longitud de la cadena
        if (inputNum[0].length > cif) {
            let uno = inputNum[0].length % cif
            if (uno === 0) {
                separados = []
            } else {
                separados = [inputNum[0].substring(0, uno)]
            }
            let posiciones = parseInt(inputNum[0].length / cif)
            for (let i = 0; i < posiciones; i++) {
                let pos = ((i * cif) + uno)
                console.log(uno, pos)
                separados.push(inputNum[0].substring(pos, (pos + 3)))
            }
        } else {
            separados = [inputNum[0]]
        }

        document.getElementById('precio').value = '$' + separados.join(',') + '.' + inputNum[1]
    }
    ;

</script>

<?php include("../includes/footer.php") ?>