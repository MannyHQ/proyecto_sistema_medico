<?php include("../DATABASE/db.php");  

    $query = "SELECT * FROM tipos_usuario";
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
                        <input type="text" name="NOMBRE_USUARIO" class="form-control" placeholder="Usuario" autofocus>
                    </div>
                    <div class="form-group">
                        <input type="text" name="PASSWORD" class="form-control" placeholder="Contraseña">
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name='ESTADO' type="checkbox" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Estado
                        </label>
                    </div>

                    <select class="form-select" name="TIPO_USUARIO" aria-label="Default select example">
                        <?php foreach ($result as $opciones): ?>

                            <option value="<?php echo $opciones['TIPO_USUARIO']?>"><?php echo $opciones['TIPO_USUARIO']?></option>
                            
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
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>USUARIO</th>
                        <th>CONTRASEÑA</th>
                        <th>TIPO USUARIO</th>
                        <th>ESTADO</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "select * from usuarios";
                    $result_tasks = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_array($result_tasks)) { ?>

                        <tr>
                            <td><?php echo $row['NOMBRE_USUARIO'] ?></td>
                            <td><?php echo $row['PASSWORD'] ?></td>
                            <td><?php echo $row['TIPO_USUARIO'] ?></td>
                            <td><?php if($row['STATUS'] == '1'){
                                echo "ACTIVO";
                            }else{
                                echo "INACTIVO";
                            }
                            
                             ?></td>
                            <td>
                                <a href="./editarUsuario.php?ID_USUARIO=<?php echo $row['ID_USUARIO'] ?>" class="btn btn-secondary">
                                    <i class="fas fa-marker"></i>
                                </a>
                                <a href="../Procesos/eliminarUsuario.php?ID_USUARIO=<?php echo $row['ID_USUARIO'] ?>" class="btn btn-danger">
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