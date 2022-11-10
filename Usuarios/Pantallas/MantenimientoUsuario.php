
<?php
    ///Para traer tipo usuario
 include("../DATABASE/db.php");  

    $query = "SELECT * FROM tipo_usuario";
    $result = mysqli_query($conn, $query);

?>

<?php include("../includes/header.php") ?>



<div class="container p-4">

    <div class="row">

        <div class="col-md-4">

        <?php if(isset($_SESSION['message'])){ ?>
                        <div class="alert alert-<?=$_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                        <?=$_SESSION['message'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php session_unset(); } ?>

            <div class="card card-body">
                <form action="../Procesos/agregarUsuario.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="Usuario" autofocus>
                    </div>
                    <div class="form-group">
                        <input type="text" name="password" class="form-control" placeholder="Contraseña">
                    </div>
                    <div class="form-group">
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre" autofocus>
                    </div>
                    <div class="form-group">
                        <input type="text" name="apellido" class="form-control" placeholder="Apellido" autofocus>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name='status' type="checkbox" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Estado
                        </label>
                    </div>

                    <select class="form-select" name="tipo_usuario" aria-label="Default select example">
                        <?php foreach ($result as $opciones): ?>

                            <option value="<?php echo $opciones['nombre_tipo']?>"><?php echo $opciones['nombre_tipo']?></option>
                            
                        <?php endforeach ?>    
                    </select>       
                   

                    <input type="submit" class="btn btn-success btn-block" name="agregarUsuario" value="GUARDAR USUARIO">
                </form>
            </div>

        </div>

        <div class="col-md-8">
            <form class="d-flex">
                <form action ="" method="GET">
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
                            <td><?php if($row['status'] == '1'){
                                echo "ACTIVO";
                            }else{
                                echo "INACTIVO";
                            }
                            
                             ?></td>
                            <td>
                                <a href="editarUsuario.php?ID_USUARIO=<?php echo $row['id_usuario'] ?>" class="btn btn-secondary">
                                    <i class="fas fa-marker"></i>
                                </a>
                                <a href="../Procesos/eliminarUsuario.php?ID_USUARIO=<?php echo $row['id_usuario'] ?>" class="btn btn-danger">
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



<?php 
    /* Para filtrar usuario*/
    if(isset($_GET['enviar'])){
        $busqueda = $_GET['busqueda'];

        if(isset($_GET['busqueda'])){

        }

    }

?>


<?php include("../includes/footer.php") ?>