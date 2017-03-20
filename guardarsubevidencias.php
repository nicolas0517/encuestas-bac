<?php
    include("conexion.php");

    $encuesta = $_POST['encuesta'];
    $subevidencia = $_POST['subevidencia'];
    $respuesta = "";
    
    if (isset($encuesta) and isset($subevidencia)) {

        $con=conectar();

        $consulta=consultar($con,"INSERT INTO encuesta_has_subevidencia VALUES ($encuesta, $subevidencia)");
        $respuesta = mysqli_insert_id($con);

    }

    echo $respuesta;
?>