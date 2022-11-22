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
        <?php session_unset();
        } ?>
        <div class="col-md-6 shadow-lg p-2 mb-5 bg-light  rounded">
            <h1 class="p-3 text-left ">Mantenimiento Aseguradora</h1>
            <div class="p-4">
                <form name="formulario" action="../Procesos/procesosAseguradora.php" method="POST" class="row g-3 needs-validation was-validated">
                    <!--NOMBRE-->
                    <div class="col-md-4 position-relative">
                        <label for="nombre_proc" class="form-label">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Nombre Aseguradora</font>
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
                    <!--Direccion-->
                    <div class="col-md-4 position-relative">
                        <label for="" class="form-label">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Direccion</font>
                            </font>
                        </label>
                        <input name="direccion" type="text" class="form-control" id="direccion" minlength="11" maxlength="13" required>
                        <div class="valid-tooltip">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                </font>
                            </font>
                        </div>
                    </div>
                    <!--Correo-->
                    <div class="col-md-4 position-relative">
                        <label for="" class="form-label">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Correo</font>
                            </font>
                        </label>
                        <input name="correo" type="email" class="form-control" id="correo" required>
                        <div class="valid-tooltip">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                </font>
                            </font>
                        </div>
                    </div>
                    <!--TELEFONO-->
                    <div class="col-md-4 position-relative">
                        <label for="" class="form-label">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Telefono</font>
                            </font>
                        </label>
                        <input name="telefono" id="telefono" type="tel" class="form-control" minlength="10" maxlength="40"  required>
                        <div class="valid-tooltip">
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

                    <br>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-block" name="agregarAseguradora" value="Registrar">

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
                            <th>DIRECCION</th>
                            <th>CORREO</th>
                            <th>TELEFONO</th>
                            <th>ESTADO</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "select * from aseguradora $where";
                        $result_tasks = mysqli_query($conn, $query);

                        while ($row = mysqli_fetch_array($result_tasks)) { ?>

                            <tr>
                                <td><?php echo $row['nombre_aseguradora'] ?></td>
                                <td><?php echo $row['direccion_aseguradora'] ?></td>
                                <td><?php echo $row['correo_aseguradora'] ?></td>
                                <td><?php echo $row['telefono'] ?></td>
                                <td><?php if ($row['status'] == '1') {
                                        echo "ACTIVO";
                                    } else {
                                        echo "INACTIVO";
                                    }

                                    ?></td>
                                <td>
                                    <a href="../Procesos/editarAseguradora.php?ID_ASEGURADORA=<?php echo $row['id_aseguradora'] ?>" class="btn btn-secondary">
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

<?php include("../includes/footer.php") ?>