<?php 

    include("../DATABASE/db.php");
    //Codigo para agregar
    if(isset($_POST['agregarProcedimiento'])){
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        if (isset($_POST['ESTADO']) == '1'){
            $ESTADO = TRUE;

        }else{
            $ESTADO = FALSE;
        }
   
            
       
        $query = "INSERT INTO procedimientos(nombre_proc, descripcion, precio_proc, status ) VALUES ('$nombre', '$descripcion','$precio','$ESTADO')";
        $result = mysqli_query($conn, $query);
        if(!$result){
             die("Querry Failed");
        }
        
        $_SESSION['message'] = 'Usuario guardado exitosamente';
        $_SESSION['message_type'] = 'success';

        header("Location: ../Pantallas/MantenimientoProcedimientos.php");

    }

    //Codigo para editar en la base de datos
    if(isset($_POST['editarProcedimiento'])){
        
    }


    
?>