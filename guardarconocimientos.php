<?php
    include("conexion.php");

    $encuesta = $_POST['encuesta'];
    $conocimiento = $_POST['conocimiento'];
    $respuesta = "";
    
    if (isset($encuesta) and isset($conocimiento)) {

        $con=conectar();

        $consulta=consultar($con,"INSERT INTO encuesta_has_conocimiento VALUES ($encuesta, $conocimiento)");
        $respuesta = mysqli_insert_id($con);

    }

    echo $respuesta;
?>