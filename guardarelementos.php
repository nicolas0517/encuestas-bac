<?php
    include("conexion.php");

    $encuesta = $_POST['encuesta'];
    $elemento = $_POST['elemento'];
    $respuesta = "";
    
    if (isset($encuesta) and isset($elemento)) {

        $con=conectar();

        $consulta=consultar($con,"INSERT INTO encuesta_has_elemento VALUES ($encuesta, '$elemento')");
        $respuesta = mysqli_insert_id($con);

    }

    echo $respuesta;
?>