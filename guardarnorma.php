<?php
    include("conexion.php");

    $encuesta = $_POST['encuesta'];
    $norma = $_POST['norma'];
    $respuesta = "";
    
    if (isset($encuesta) and isset($norma)) {

        $con=conectar();

        $consulta=consultar($con,"INSERT INTO encuesta_has_norma VALUES ($encuesta, $norma)");
        $respuesta = mysqli_insert_id($con);

    }

    echo $respuesta;
?>