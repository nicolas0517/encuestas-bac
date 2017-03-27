<?php
    include("conexion.php");

    $descripcion = utf8_decode($_POST['descripcion']);
    $elemento = utf8_decode($_POST['elemento']);
    $respuesta = "";

    $con=conectar();
    
    if (isset($descripcion) and isset($elemento)) {

        $consulta=consultar($con,"INSERT INTO criterio VALUES (NULL, '$descripcion', '$elemento')");
        $respuesta = 1;

    } else {
        $respuesta = mysqli_errno($con) . ":" . mysqli_error($con);
    }

    echo $respuesta;
?>