<?php
    include("conexion.php");

    $filtro = $_POST['filtro'];
    $respuesta = "";
    
    if (isset($filtro)) {

        $con=conectar();

        $consulta=consultar($con,"SELECT * FROM criterio WHERE k_elemento= '$filtro' ORDER BY n_descripcion");
        $filas = mysqli_num_rows($consulta);
        if ($filas === 0) {
            $respuesta = "<p>No se encontraron criterios</p>";
        } else {
            while($resultados = mysqli_fetch_array($consulta)) {
                $id = $resultados['k_criterio'];
                $descripcion = utf8_encode($resultados['n_descripcion']);

                //Output
                $respuesta .= '
                    <div class="checkbox">
                        <label><input type="checkbox" value="' . $id . '" id="criterio' . $id . '" class="check_criterios">' . $descripcion . '</label>
                    </div>
                ';
            };
        }
        
    }

    echo $respuesta;
?>