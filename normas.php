<?php
    include("conexion.php");

    $filtro = $_POST['filtro'];
    $respuesta = "";

    if (isset($filtro)) {

        $con=conectar();
        if($filtro == 0) {

            $consulta=consultar($con,"SELECT * FROM norma");
            $filas = mysqli_num_rows($consulta);
            if ($filas === 0) {
                $respuesta = "<option>No se encontraron normas</option>";
            } else {
                while($resultados = mysqli_fetch_array($consulta)) {
                    $id = $resultados['k_numero'];
                    $descripcion = utf8_encode($resultados['n_descripcion']);

                    //Output
                    $respuesta .= '
                    <option value= "' . $id . '">' . $id . " - " . $descripcion . '</option>
                    ';
                };
            }

        } else {

            $consulta=consultar($con,"SELECT n.k_numero, n.n_descripcion FROM norma n, vicepresidencia_has_norma vn WHERE vn.k_vicepresidencia = $filtro AND vn.k_norma = n.k_numero");
            $filas = mysqli_num_rows($consulta);
            if ($filas === 0) {
                $respuesta = "<option>No se encontraron normas</option>";
            } else {
                while($resultados = mysqli_fetch_array($consulta)) {
                    $id = $resultados['k_numero'];
                    $descripcion = utf8_encode($resultados['n_descripcion']);

                    //Output
                    $respuesta .= '
                    <option value= "' . $id . '">' . $id . " " . $descripcion . '</option>
                    ';
                };
            }

        }
        
    }

    echo $respuesta;
?>