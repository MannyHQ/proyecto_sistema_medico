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
            <h1 class="p-3 text-left ">Mantenimiento Usuarios</h1>
            <div class="p-4">
                <form name="formulario" action="../Procesos/procesosUsuario.php" method="POST" class="row g-3 needs-validation was-validated">
                    <!--NOMBRE-->
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
                            <input name="username" type="text" class="form-control" id="username" aria-describedby="validationTooltipUsernamePrepend" required>
                            <div class="invalid-tooltip">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">
                                    </font>
                                </font>
                            </div>
                        </div>
                    </div>
                    <!--Contraseña-->
                    <div class="col-md-4 position-relative">
                        <label for="" class="form-label">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Contraseña</font>
                            </font>
                        </label>
                        <input name="password" type="password" class="form-control" id="password" minlength="8" maxlength="15" required>
                        <div class="valid-tooltip">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                </font>
                            </font>
                        </div>
                    </div>
                    <!--Nombre-->
                    <div class="col-md-4 position-relative">
                        <label for="" class="form-label">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Nombre</font>
                            </font>
                        </label>
                        <input name="nombre" type="text" class="form-control" id="nombre" required>
                        <div class="valid-tooltip">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                </font>
                            </font>
                        </div>
                    </div>
                    <!--Apellido-->
                    <div class="col-md-4 position-relative">
                        <label for="" class="form-label">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Apellido</font>
                            </font>
                        </label>
                        <input name="apellido" id="apellido" type="text" class="form-control" minlength="3" maxlength="40" required>
                        <div class="valid-tooltip">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                </font>
                            </font>
                        </div>
                    </div>
                    <!--Tipo-->
                    <div class="col-md-3 position-relative">
                        <label for="tipo_usuario" class="form-label">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Tipo Usuario</font>
                            </font>
                        </label>
                        <select name="tipo_usuario" class="form-select" id="tipo_usuario" required>
                            <?php foreach ($result as $opciones) : ?>

                                <option value="<?php echo $opciones['id_tipo'] ?>"><?php echo $opciones['nombre_tipo'] ?></option>

                            <?php endforeach ?>
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
                        <input class="form-group-input" checked name='ESTADO' type="checkbox" id="flexCheckDefault">
                        <div class="invalid-tooltip">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">
                                </font>
                            </font>
                        </div>
                    </div>

                    <br>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-block" name="agregarUsuario" value="Registrar">

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
            <form action="../Procesos/procesosUsuario.php" method="POST">
                <div class="table-responsive">
                    <br>
                    <table class="table table-bordered table_id">
                        <thead>
                            <tr>
                                <th>USERNAME</th>
                                <th>CONTRASEÑA</th>
                                <th>TIPO USUARIO</th>
                                <th>NOMBRE</th>
                                <th>APELLIDO</th>
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
                                    <td><?php
                                    $tipo_user = $row['tipo_user'];
                                     if($tipo_user == '1'){
                                        echo "Administrador";
                                    } else if($tipo_user == '2'){
                                        echo "Doctor";
                                    }else if($tipo_user == '3'){
                                        echo "Empleado";
                                    }
                                      ?>
                                    </td>
                                    <td><?php echo $row['nombre'] ?></td>
                                    <td><?php echo $row['apellido'] ?></td>
                            
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



<?php
/* Para filtrar usuario*/


if (isset($_GET['enviar'])) {
    $busqueda = $_GET['busqueda'];

    if (isset($_GET['busqueda'])) {
    }
}

?>


<?php include("../includes/footer.php") ?>