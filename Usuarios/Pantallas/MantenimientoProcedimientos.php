<?php
///Para traer tipo usuario
include("../DATABASE/db.php");



?>

<?php include("../includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        <?php if (isset($_SESSION['message'])) { ?>
            <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php session_unset();
        } ?>
        <div class="col-md-4">
            <div class="card card-body ">

                <form action="../Procesos/procesosProcedimientos.php" method="POST">
                    <div class="form-group">
                        <label for="nombre_proc">Nombre procedimiento</label>
                        <input type="text" class="form-control" name="nombre" id="nombre">
                    </div>
                    <div class="form-group">
                        <label for="">Descripcion del procedimiento</label>
                        <textarea class="form-control" name="descripcion" rows="2"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Precio</label>
                        <input type="text" class="form-control" name="precio">
                    </div>
                    <div class="form-group">
                        <input class="form-group-input" name='ESTADO' type="checkbox" id="flexCheckDefault">
                        <label class="form-group-label" for="flexCheckDefault">
                            Estado
                        </label>
                    </div>
                    <br>
                    <button type="submit" name="agregarProcedimiento" class="btn btn-primary">Registrar</button>
                    <input type="reset" class="btn btn-primary btn-block" name="cancelarUsuario" value="Cancelar">
                </form>

            </div>
        </div>
        <div class="col-md-8">
            <form class="d-flex">
                <form action="" method="GET">
                    <input class="form-control me-2" type="search" placeholder="Buscar" name="busqueda">
                    <button class="btn btn-outline-info" type="submit" name="enviar">Buscar</button>
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
            <table class="table table-bordered">
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
                                <a href="../Procesos/eliminarUsuario.php?id_proc=<?php echo $row['id_proc'] ?>" class="btn btn-danger">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php include("../includes/footer.php") ?>