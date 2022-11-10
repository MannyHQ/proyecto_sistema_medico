<?php
///Para traer tipo usuario
include("../DATABASE/db.php");



?>

<?php include("../includes/header.php") ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Mantenimiento Procedimientos</h2>
            <div class="card card-body ">
                <div class="col-md-8 align-self-center">
                    <form action="../Procesos/procesosProcedimientos.php" method="POST">
                        <div class="form-group">
                            <label for="nombre_proc">ID Procedimiento</label>
                            <input type="text" class="form-control" name="id_proc" id="id_proc" placeholder="Busca un procedimiento" onblur="cargandoDatos();" required>
                        </div>
                        <div class="form-group">
                            <label for="nombre_proc">Nombre procedimiento</label>
                            <input type="text" class="form-control" name="nombre" id="nombre">
                        </div>
                        <div class="form-group">
                            <label for="">Descripcion del procedimiento</label>
                            <textarea class="form-control" name="descripcion"  rows="2"></textarea>
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
                        <button type="submit" name="agregarProcedimiento" class="btn btn-primary">Registrar</button>
                        <button type="submit" name="actualizarProcedimiento" class="btn btn-primary">Modificar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include("../includes/footer.php") ?>

<script type="text/javascript">
    function cargandoDatos() {
        
        
        id = $("#id_proc").val();
        console.log("id a buscar: "+id);

        var parametros = {
            "buscar": "1",
            "id_proc": id

        };
        $.ajax({
            data: parametros,
            dataType: 'json',
            url: '../Procesos/procesosProcedimientos.php',
            type: 'POST',
            beforeSend: function() {
                alert("Enviando");
            },
            error: function() {
                alert("Error");
            },
            complete: function(valores) {
                alert("¡Listo!"+valores +" "+valores);
            },
            sucess: function(valores) {
                alert("¡Listo!"+valores +" "+valores);
            }
        })
    }
</script>