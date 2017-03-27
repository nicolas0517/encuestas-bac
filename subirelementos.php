<?php
    include("conexion.php");

    $elemento = utf8_decode($_POST['elemento']);
    $descripcion = utf8_decode($_POST['descripcion']);
    $norma = $_POST['norma'];
    $respuesta = "";

    $con=conectar();
    
    if (isset($elemento) and isset($descripcion) and isset($norma)) {

        $consulta=consultar($con,"INSERT INTO elemento VALUES ('$elemento', '$descripcion', $norma)");
        $respuesta = 1;

    } else {
        $respuesta = mysqli_errno($con) . ":" . mysqli_error($con);
    }

    echo $respuesta;
?>