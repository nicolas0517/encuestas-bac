<?php
    include("conexion.php");

    $nombre = utf8_decode($_POST['nombre']);
    $idem = $_POST['idem'];
    $respuesta = "";
    
    if (isset($nombre) and isset($idem)) {
        
        $con=conectar();

        $consulta=consultar($con,"INSERT INTO encuesta VALUES (NULL, '$nombre', $idem)");
        $respuesta = mysqli_insert_id($con);

    } else {
        $respuesta = "petición incorrecta";
    }
    
    echo $respuesta;
?>