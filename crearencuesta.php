<?php
    include("conexion.php");

    $nombre = utf8_decode($_POST['nombre']);
    $idem = $_POST['idem'];
    $idper = $_POST['idper'];
    $idvic = $_POST['idvic'];
    $respuesta = "";
    
    if (isset($nombre) and isset($idem) and isset($idper) and isset($idvic)) {
        
        $con=conectar();

        $consulta=consultar($con,"INSERT INTO encuesta VALUES (NULL, '$nombre', $idem, $idper, $idvic)");
        $respuesta = mysqli_insert_id($con);

    } else {
        $respuesta = "petición incorrecta";
    }
    
    echo $respuesta;
?>