<?php
///Para traer tipo usuario
include("../DATABASE/db.php");



?>

<?php include("../includes/header.php") ?>

<div class="container p-4">
    <h3>Mantenimiento Aseguradora</h3>
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
                
                    <form action="../Procesos/procesosAseguradora.php" method="POST">
                        <div class="form-group">
                            <label for="nombre_proc">Nombre aseguradora</label>
                            <input type="text" class="form-control" name="nombre" id="nombre">
                        </div>
                        <div class="form-group">
                            <label for="">Direccion</label>
                            <textarea class="form-control" name="direccion" rows="2"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Correo</label>
                            <input type="text" class="form-control" name="correo">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Telefono</label>
                            <input type="text" class="form-control" name="telefono">
                        </div>
                        <div class="form-group">
                            <input class="form-group-input" name='ESTADO' type="checkbox" id="flexCheckDefault">
                            <label class="form-group-label" for="flexCheckDefault">
                                Estado
                            </label>
                        </div>
                        <button type="submit" name="agregarAseguradora" class="btn btn-primary">Registrar</button>
                        <button type="reset" name="actualizarAseguradora" class="btn btn-primary">Cancelar</button>
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
                        <th>DIRECCION</th>
                        <th>CORREO</th>
                        <th>TELEFONO</th>
                        <th>ESTADO</th>
                        <th>ESTADO</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "select * from aseguradora $where";
                    $result_tasks = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_array($result_tasks)) { ?>

                        <tr>
                            <td><?php echo $row['nombre'] ?></td>
                            <td><?php echo $row['direccion'] ?></td>
                            <td><?php echo $row['correo'] ?></td>
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
                                <a href="../Procesos/eliminarUsuario.php?ID_ASEGURADORA=<?php echo $row['id_aseguradora'] ?>" class="btn btn-danger">
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