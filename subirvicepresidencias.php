<?php
    include("conexion.php");

    $vicepresidencia = $_POST['vicepresidencia'];
    $norma = $_POST['norma'];
    $respuesta = "";

    $con=conectar();
    
    if (isset($vicepresidencia) and isset($norma)) {

        $consulta=consultar($con,"INSERT INTO vicepresidencia_has_norma VALUES ($vicepresidencia, $norma)");
        $respuesta = 1;

    } else {
        $respuesta = mysqli_errno($con) . ":" . mysqli_error($con);
    }

    echo $respuesta;
?>