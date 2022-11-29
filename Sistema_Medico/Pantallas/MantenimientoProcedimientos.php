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
            <h1 class="p-3 text-left ">Mantenimiento Procedimientos</h1>
            <div class="p-4">
                <form name="formulario" action="../Procesos/procesosProcedimientos.php" method="POST" class="row g-3 needs-validation was-validated" novalidate="">
                    <!--NOMBRE-->
                    <div class="col-md-4 position-relative">
                        <label for="nombre_proc" class="form-label">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Nombre Procedimiento</font>
                            </font>
                        </label>
                        <input name="nombre" type="text" class="form-control" id="nombre" minlength="3" maxlength="40" required="">
                        <div class="valid-tooltip">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                </font>
                            </font>
                        </div>
                    </div>

                    <!--Descripcion del procedimiento-->
                    <div class="col-md-8 position-relative">
                        <label for="" class="form-label">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Descripcion del procedimiento</font>
                            </font>
                        </label>
                        <input name="descripcion" type="text" class="form-control" id="descripcion" minlength="11" maxlength="13" required="">
                        <div class="valid-tooltip">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                </font>
                            </font>
                        </div>
                    </div>
                    <!--Precio-->
                    <div class="col-md-2 position-relative">
                        <label for="" class="form-label">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Precio</font>
                            </font>
                        </label>
                        <input name="precio" type="text" class="form-control" id="precio" minlength="3" maxlength="40" required="">
                        <div class="valid-tooltip">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                </font>
                            </font>
                        </div>
                    </div>

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

                        while ($row = mysqli_fetch_array($result_tasks)) { ?>

                            <tr>
                                <td><?php echo $row['nombre_proc'] ?></td>
                                <td><?php echo $row['descripcion'] ?></td>
                                <td><?php echo $row['precio_proc'] ?></td>
                                <td><?php if ($row['status'] == '1') {
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


<?php include("../includes/footer.php") ?>