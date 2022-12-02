<?php
///Para traer tipo usuario
include("../DATABASE/db.php");

$query = "SELECT * FROM aseguradora";
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
                <form name="formulario" action="../Procesos/procesosPacientes.php" method="POST">
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
                    <label for="fecha_nacimiento">Fecha nacimiento</label>
                        <input name="fecha_nacimiento" class="form-control" type="date" />
                    <div class="form-group">
                        <label for="">Cedula</label>
                        <input type="text" name="cedula" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for='seguro' class="form-check-label" for="flexCheckDefault"> Seguro </label>
                        <select class="form-select" name="seguro" aria-label="Default select example">
                            <?php foreach ($result as $opciones) : ?>

                                <option value="<?php echo $opciones['nombre'] ?>"><?php echo $opciones['nombre'] ?></option>

                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Direccion</label>
                        <textarea class="form-control" name="direccion" rows="2"></textarea>
                    </div>
                    <div class="form-group">
                        <label for='tipo_sangre' class="form-check-label" for="flexCheckDefault"> Tipo sangre </label>
                        <select class="form-select" name="tipo_sangre" aria-label="Default select example">
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        </select>
                    </div>

                    <div class="form-group">

                        <label for='ESTADO' class="form-check-label" for="flexCheckDefault"> Estado </label>
                        <input class="form-check-input" name='ESTADO' type="checkbox" id="flexCheckDefault">
                    </div>


                    <br>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-block" name="agregarPaciente" value="Registrar">
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
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>SEXO</th>
                                <th>NACIMIENTO</th>
                                <th>CEDULA</th>
                                <th>SEGURO</th>
                                <th>DIRECCION</th>
                                <th>SANGRE</th>
                                <th>ESTADO</th>
                                <th>ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "select * from paciente $where";
                            $result_tasks = mysqli_query($conn, $query);

                            while ($row = mysqli_fetch_array($result_tasks)) { ?>

                                <tr>
                                    <td><?php echo $row['nombre'] ?></td>
                                    <td><?php echo $row['sexo'] ?></td>
                                    <td><?php echo $row['fecha_naci'] ?></td>
                                    <td><?php echo $row['cedula'] ?></td>
                                    <td><?php echo $row['seguro'] ?></td>
                                    <td><?php echo $row['direccion'] ?></td>
                                    <td><?php echo $row['tipo_sangre'] ?></td>
                                    <td><?php if ($row['status'] == '1') {
                                            echo "ACTIVO";
                                        } else {
                                            echo "INACTIVO";
                                        }

                                        ?></td>
                                    <td>
                                        <a href="../Procesos/editarPacientes.php?ID_PACIENTE=<?php echo $row['id_paciente'] ?>" class="btn btn-secondary">
                                            <i class="fas fa-marker"></i>
                                        </a>
                                        <a href="../Procesos/procesosUsuario.php?ID_USUARIO=<?php echo $row['id_paciente'] ?>" class="btn btn-danger">
                                            <i class="fas fa-trash-alt"></i>
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