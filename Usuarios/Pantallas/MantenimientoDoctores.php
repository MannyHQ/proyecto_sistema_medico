<?php
///Para traer tipo usuario
include("../DATABASE/db.php");

$query = "SELECT * FROM tipo_usuario";
$result = mysqli_query($conn, $query);

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

            <div class="card card-body">
                <form name="formulario" action="../Procesos/procesosDoctores.php" method="POST">
                    <div class="form-group">
                        <label for="">Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" autofocus>
                    </div>
                    <div class="form-group">
                        <label for='sexo' class="form-check-label" for="flexCheckDefault"> Sexo </label>
                        <select class="form-select" name="sexo" aria-label="Default select example">
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Direccion</label>
                        <textarea class="form-control" name="direccion" rows="2"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Cedula</label>
                        <input type="text" name="cedula" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Especialidades</label>
                        <textarea class="form-control" name="direccion" rows="2"></textarea>
                    </div>
                    <div class="form-group">
                        
                        <label for='status' class="form-check-label" for="flexCheckDefault"> Activo </label>
                        <input class="form-check-input" name='status' type="checkbox" id="flexCheckDefault">
                    </div>

                    
                    <br>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-block" name="agregarUsuario" value="Registrar">
                        
                        <input type="reset" class="btn btn-primary btn-block" name="cancelarUsuario" value="Cancelar">
                    </div>
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

<?php include("../includes/footer.php"); ?>