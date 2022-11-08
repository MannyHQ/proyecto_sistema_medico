<?php
///Para traer tipo usuario
include("../DATABASE/db.php");



?>

<?php include("../includes/header.php") ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Mantenimiento Aseguradora</h2>
            <div class="card card-body ">
                <div class="col-md-8 align-self-center">
                    <form action="../Procesos/procesosAseguradora.php" method="POST">
                        <div class="form-group">
                            <label for="nombre_proc">ID aseguradora</label>
                            <input type="text" class="form-control" name="id_asg" id="id_asg" placeholder="Busca una aseguradora"  required>
                        </div>
                        <div class="form-group">
                            <label for="nombre_proc">Nombre aseguradora</label>
                            <input type="text" class="form-control" name="nombre" id="nombre">
                        </div>
                        <div class="form-group">
                            <label for="">direccion</label>
                            <textarea class="form-control" name="direccion"  rows="2"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">correo</label>
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
                        <button type="submit" name="actualizarAseguradora" class="btn btn-primary">Modificar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>