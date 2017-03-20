<?php
    include("conexion.php");

    $encuesta = $_POST['encuesta'];
    $criterio = $_POST['criterio'];
    $respuesta = "";
    
    if (isset($encuesta) and isset($criterio)) {

        $con=conectar();

        $consulta=consultar($con,"INSERT INTO encuesta_has_criterio VALUES ($encuesta, $criterio)");
        $respuesta = mysqli_insert_id($con);

    }

    echo $respuesta;
?>