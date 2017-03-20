<?php
    include("conexion.php");

    $encuesta = $_POST['encuesta'];
    $subrango = $_POST['subrango'];
    $respuesta = "";
    
    if (isset($encuesta) and isset($subrango)) {

        $con=conectar();

        $consulta=consultar($con,"INSERT INTO encuesta_has_subrango VALUES ($encuesta, $subrango)");
        $respuesta = mysqli_insert_id($con);

    }

    echo $respuesta;
?>